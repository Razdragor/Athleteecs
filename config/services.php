<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    
    'facebook' => [
        'client_id'     => '1005451526197926',
        'client_secret' => 'b75af1574e95a4bf4688107a13f16801',
        'redirect'      => env('APP_URL', 'https://localhost').'/login/callback/facebook',
    ],

    'twitter' => [
        'client_id' => 'jvVgZoMJFDGF0nuSRFzrE4jO3',
        'client_secret' => 'onPJd84dU1ZrHgsGmWCFBI4iv5octmWDLQooJ1TZix1T34ttjf',
        'redirect' => env('APP_URL', 'https://localhost').'login/callback/twitter',
    ],

    'google' => [
        'client_id' => '416431167187-8k619vus9um4o7puj8umi7cle3kpsjg8.apps.googleusercontent.com',
        'client_secret' => 'f-eRNgK9ZtYiZgVjGVZJxpF5',
        'redirect' => env('APP_URL', 'https://localhost').'login/callback/google',
    ]

];
