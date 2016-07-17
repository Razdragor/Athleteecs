<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 02/05/2016
 * Time: 14:36
 */

namespace App\Providers;

use App\ActivationService;
use Illuminate\Support\Str;
use Laravel\Socialite\Contracts\User as ProviderUser;
use App\SocialAccount;
use App\User;
use Laravel\Socialite\Contracts\Provider;


class SocialAccountService
{
    protected $activationService;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(ActivationService $activationService)
    {
        $this->activationService = $activationService;
    }

    public function createOrGetUser(Provider $provider)
    {
        $providerUser = $provider->user();
        $providerName = class_basename($provider);
        $account = SocialAccount::whereProvider($providerName)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $providerName
            ]);
            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {
                if($providerName == 'FacebookProvider'){
                    $user = $this->createUserFacebook($providerUser);
                }
                if($providerName == 'GoogleProvider'){
                    $user = $this->createUserGoogle($providerUser);
                }
                if($providerName == 'TwitterProvider'){
                    $user = $this->createUserTwitter($providerUser);
                }
            }
            $account->user()->associate($user);
            $account->save();

            //$this->activationService->sendActivationMail($user);

            return $user;
        }
    }

    public function createUserFacebook(ProviderUser $user){
        $password = Str::random(10);
        $sexe = "Femme";
        if($user->user['gender'] == 'male'){
            $sexe = "Homme";
        }
        $user = User::create([
            'email' => $user->getEmail(),
            'firstname' => $user->user['first_name'],
            'lastname' => $user->user['last_name'],
            'password' => $password,
            'sexe' => $sexe,
            'status' => 'success',
            'newsletter' => 0,
            'picture' => $user->getAvatar(),
            'activated' => 1
        ]);

        return $user;
    }

    public function createUserTwitter(ProviderUser $user){
        $password = Str::random(10);
        dd($user);
        $sexe = "Femme";
        if($user->user['gender'] == 'male'){
            $sexe = "Homme";
        }
        $user = User::create([
            'email' => $user->getEmail(),
            'firstname' => $user->user['name']['givenName'],
            'lastname' => $user->user['name']['familyName'],
            'password' => $password,
            'sexe' => $sexe,
            'status' => 'success',
            'newsletter' => 0,
            'picture' => $user->getAvatar(),
            'activated' => 1
        ]);

        return $user;
    }

    public function createUserGoogle(ProviderUser $user){
        $password = Str::random(10);
        $sexe = "Femme";
        if($user->user['gender'] == 'male'){
            $sexe = "Homme";
        }
        $user = User::create([
            'email' => $user->getEmail(),
            'firstname' => $user->user['name']['givenName'],
            'lastname' => $user->user['name']['familyName'],
            'password' => $password,
            'sexe' => $sexe,
            'status' => 'success',
            'newsletter' => 0,
            'picture' => $user->getAvatar(),
            'activated' => 1
        ]);

        return $user;
    }
}