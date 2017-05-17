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
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'facebook' => [
        'client_id' => '418325768507501',
        'client_secret' => 'baed30ac259ef4c3dc4481781e7789ee',
        'redirect' => 'https://modarisy.com/auth/facebook/callback',
    ],

    'linkedin' => [
        'client_id' => '86dt84oxe028lx',
        'client_secret' => 'FHDwZzDcb0tKqDIG',
        'redirect' => 'https://modarisy.com/auth/linkedin/callback/',
    ],


];
