<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 02/05/2016
 * Time: 14:36
 */

namespace App\Providers;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\SocialAccount;
use App\User;
use Laravel\Socialite\Contracts\Provider;


class SocialAccountService
{
    public function createOrGetUser(Provider $provider)
    {
        var_dump($provider);
        $providerUser = $provider->user();
        var_dump("1");
        $providerName = class_basename($provider);
        var_dump("2");
        $account = SocialAccount::whereProvider($providerName)
            ->whereProviderUserId($providerUser->getId())
            ->first();
        var_dump("3");
        if ($account) {
            var_dump("4");
            return $account->user;
        } else {
            var_dump("5");
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $providerName
            ]);
            var_dump("6");
            $user = User::whereEmail($providerUser->getEmail())->first();
            var_dump("7");
            if (!$user) {
                var_dump("8");
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                ]);
                var_dump("9");
            }
            var_dump("10");
            $account->user()->associate($user);
            var_dump("11");
            $account->save();

            return $user;
        }

    }
}