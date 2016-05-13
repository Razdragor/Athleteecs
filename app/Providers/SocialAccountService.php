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

        $providerUser = $provider->user();
        $providerName = class_basename($provider);
        $account = SocialAccount::whereProvider($providerName)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        var_dump($account);exit;
        if ($account) {
            return $account->user;
        } else {
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $providerName
            ]);
            $user = User::whereEmail($providerUser->getEmail())->first();
            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                ]);
            }
            $account->user()->associate($user);
            $account->save();

            return $user;
        }

    }
}