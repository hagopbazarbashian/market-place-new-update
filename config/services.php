<?php

return [

    /*
    |----------------------------------------------------------------  ----------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'client_id' => '1886124345059579',
        'client_secret' => 'ac2869fd470963d3f3872b080c3a4f3f',
        'redirect' => 'https://jack-pops.com/auth/facebook/callback',
    ],
    
    'google' => [
        'client_id' => '34230568088-teuhkivurpuolhrr9heo1s3tdhjkh607.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://jack-pops.com/login/google/callback',
    ],

];
