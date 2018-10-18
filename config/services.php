<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
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
        'region' => env('SES_REGION', 'us-east-1'),
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
        'client_id' => env('FACEBOOK_APP_ID','1748389615197629'),
        'client_secret' => env('FACEBOOK_APP_SECRET','bee80b31f51f2f181f9e087c00e79456'),
//        'redirect' => env('FACEBOOK_APP_CALLBACK_URL','http://localhost:9000/callback/facebook'),
        'redirect' => env('FACEBOOK_APP_CALLBACK_URL','http://beats-city.amagumolabs.io/callback/facebook'),
        'default_graph_version' => 'v3.1',
    ],
    'instagram' => [
        'client_id' => env('INSTAGRAM_KEY','40730227fcb440b79e9232299f6752c0'),
        'client_secret' => env('INSTAGRAM_SECRET','56b06170b5284e699dd3daa5033d4ca2'),
//        'redirect' => env('INSTAGRAM_REDIRECT_URI','http://localhost:9000/callback/instagram')
        'redirect' => env('INSTAGRAM_REDIRECT_URI','http://beats-city.amagumolabs.io/callback/instagram')
    ],

];
