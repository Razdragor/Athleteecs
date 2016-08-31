<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Providers\SocialAccountService;

class SocialAuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback(SocialAccountService $service, $provider,Request $request)
    {
        $data = $request->all();

        if($provider == 'facebook') {
            $user = $service->createOrGetUser(Socialite::driver($provider)->fields([
                'name',
                'first_name',
                'last_name',
                'email',
                'gender',
                'verified'
            ])->scopes(['email', 'public_profile']));
        }elseif($provider == 'google'){
            if(!empty($data['error'])) {
                return redirect()->to('/');
            }
            else
            {
                $user = $service->createOrGetUser(Socialite::driver($provider));
            }
        }elseif($provider == 'twitter') {

            if(!empty($data['denied'])) {
                return redirect()->to('/');
            } else {
                $user = $service->createOrGetUser(Socialite::driver($provider));
            }
        }

        if(isset($user)) {
            $roleUser = Role::find(2);
            if(!$user->hasRole($roleUser->name)){
                $user->attachRole($roleUser);
            }
            auth()->login($user);
        }

        return redirect()->to('/');
    }
}
