<?php

use Werify\Laravel\Http\Controllers\Api\V1\AccountController;
use Werify\Laravel\Http\Controllers\Api\V1\AuthController;

return [
    'comment' => [
        'version' => 'v1',
        'debug' => env('WERIFY_DEBUG', env('APP_DEBUG')),
        'routes' => [],
        'api' => [
            'base_path' => 'https://api.werify.net',
            'base_api_path' => 'https://api.werify.net/api',
        ],
    ],
    'account' => [
        'version' => 'v1',
        'app_key' => 'not_set',
        'debug' => env('WERIFY_DEBUG', env('APP_DEBUG')),
        'routes' => [
            'group' => 'api/werify',
            'request-otp' => '/request-otp',
            'verify-otp' => '/verify-otp',
            'qr' => 'qr',
            'qr-image' => 'qr-image',
            'qr-claim' => 'qr-claim',
            'profile' => '/account',
            'profile-mobile-numbers' => '/account/mobile-numbers',
            'profile-metas' => '/account/metas',
            'profile-education' => '/account/education',
            'profile-financial-information' => '/account/financial-information',
        ],
        'controllers' => [
            'AuthController' => [
                'class' => AuthController::class,
                'request-otp' => 'requestOTP',
                'verify-otp' => 'verifyOTP',
                'qr' => 'qr',
                'qr-image' => 'qrImage',
                'qr-claim' => 'qrClaim',
            ],
            'AccountController' => [
                'class' => AccountController::class,
                'profile' => 'profile',
                'profile-mobile-numbers' => 'profileMobileNumbers',
                'profile-metas' => 'profileMetas',
                'profile-education' => 'profileEducation',
                'profile-financial-information' => 'profileFinancialInformation',
            ],
        ],
        'api' => [
            'base_path' => 'https://id.werify.net',
            'base_api_path' => 'https://id.werify.net/api',
            'request-otp' => 'request-otp',
            'verify-otp' => 'verify-otp',
            'profile' => 'user/profile',
            'profile-mobile-numbers' => 'user/profile/mobile-numbers',
            'profile-metas' => 'user/profile/metas',
            'profile-education' => 'user/profile/education',
            'profile-financial-information' => 'user/profile/financial-information',
            'qr' => 'qr',
            'qr-image' => 'qr',
            'qr-claim' => 'user/qr/',
        ],
    ],
];
