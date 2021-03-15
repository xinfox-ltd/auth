<?php
/**
 * Auth服务注册
 * [XinFox System] Copyright (c) 2011 - 2021 XINFOX.CN
 */

declare(strict_types=1);

namespace XinFox\Auth\Middleware\ThinkPHP;

use XinFox\Auth\Auth;
use XinFox\Auth\Guest;
use XinFox\Auth\VisitorInterface;

class Service extends \think\Service
{
    public function register()
    {
        $config = $this->app->config->get('auth');
        $this->app->bind(
            Auth::class,
            fn() => new Auth($config)
        );
        $this->app->bind(
            VisitorInterface::class,
            fn() => new Guest()
        );
    }
}