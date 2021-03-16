<?php
/**
 * Thinkphp中间件
 * [XinFox System] Copyright (c) 2011 - 2021 XINFOX.CN
 */

declare(strict_types=1);

namespace XinFox\Auth\Middleware\ThinkPHP;

use Closure;
use think\App;
use think\helper\Str;
use think\Request;
use XinFox\Auth\Auth;
use XinFox\Auth\Exception\ForbiddenException;
use XinFox\Auth\Exception\UnauthorizedException;
use XinFox\Auth\VisitorInterface;

class Middleware
{
    protected Auth $auth;

    protected App $app;

    public function __construct(App $app, Auth $auth)
    {
        $this->auth = $auth;
        $this->app = $app;
    }

    /**
     * @param Request $request
     * @param Closure $next
     * @param $roles
     * @return mixed
     * @throws UnauthorizedException|ForbiddenException
     */
    public function handle($request, Closure $next, $roles)
    {
        $authorization = $authorization = $request->header('Authorization');
        if ($authorization !== null) {
            $token = trim(preg_replace('/^(?:\s+)?Bearer\s/', '', $authorization));

            $visitor = $this->auth->user($token);
            $visitorRole = Str::lower((string)$visitor->getRole());
            if (in_array('*', $roles) || in_array($visitorRole, $roles)) {
                $this->app->bind(
                    VisitorInterface::class,
                    fn() => $visitor
                );
                return $next($request);
            }

            throw new ForbiddenException();
        }

        throw new UnauthorizedException();
    }
}