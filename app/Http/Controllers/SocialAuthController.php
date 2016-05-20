<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
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

    public function callback(SocialAccountService $service, $provider)
    {
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
            $user = $service->createOrGetUser(Socialite::driver($provider));
        }
        auth()->login($user);

        return redirect()->to('/');
    }
}
