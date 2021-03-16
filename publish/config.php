<?php
/**
 * Auth配置文件
 * [XinFox System] Copyright (c) 2011 - 2021 XINFOX.CN
 */

declare(strict_types=1);

return [
    'default' => [
        'guard' => 'jwt'
    ],
    'guards' => [
        'jwt' => [
            'provider' => \XinFox\Auth\Guard\JWTGuard::class,
            'base64_encoded' => '6a8sCpcvcykfrSM3vA0RZyKGtLe6vin8NZOGuwxYppc=',
            'issued' => '',
            'permitted' => '',
            'can_only_be_used_after' => '+1 second',
            'expires_at' => '+24 hour'
        ]
    ],
    'providers' => [
        'user' => '',
        'token' => '',
    ]
];