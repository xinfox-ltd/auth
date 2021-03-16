<?php
/**
 * Auth管理类
 * [XinFox System] Copyright (c) 2011 - 2021 XINFOX.CN
 */

declare(strict_types=1);

namespace XinFox\Auth;

use Throwable;
use XinFox\Auth\Exception\AuthException;
use XinFox\Auth\Exception\InvalidArgumentException;
use XinFox\Auth\Exception\UnauthorizedException;
use XinFox\Auth\Guard\JWTGuard;

class Auth
{
    protected GuardInterface $guard;

    /**
     * Auth constructor.
     * @param array $config
     * @throws InvalidArgumentException
     */
    public function __construct(array $config)
    {
        $guard = $config['default']['guard'] ?? 'jwt';

        $guardProvider = $config['guards'][$guard]['provider'] ?? JWTGuard::class;
        if (!class_exists($guardProvider)) {
            throw new InvalidArgumentException("配置guards.$guard.provider 错误");
        }

        $userProvider = $this->getUserProvider($config);
        $tokenProvider = $this->getTokenProvider($config);
        $guard = new $guardProvider($config['guards'][$guard], $userProvider, $tokenProvider);

        if (!$guard instanceof GuardInterface) {
            throw new InvalidArgumentException("guard 必须继承 GuardInterface");
        }

        $this->guard = $guard;
    }

    /**
     * @param string|null $token
     * @return VisitorInterface
     * @throws AuthException|UnauthorizedException
     */
    public function user(string $token = null): VisitorInterface
    {
        return $this->guard->user($token);
    }

    public function login(VisitorInterface $visitor): Token
    {
        return $this->guard->login($visitor);
    }

    public function logout()
    {
        $this->guard->logout();
    }

    /**
     * @return bool
     * @throws AuthException|UnauthorizedException
     */
    public function isGuest(): bool
    {
        return $this->user() instanceof Guest;
    }

    protected function getUserProvider(array $config): UserProviderInterface
    {
        if (empty($config['providers']['user'])) {
            throw new InvalidArgumentException('缺少配置项：providers.user');
        }
        return new $config['providers']['user']();
    }

    protected function getTokenProvider(array $config)
    {
        if (empty($config['providers']['token'])) {
            throw new InvalidArgumentException('缺少配置项：providers.token');
        }
        return new $config['providers']['token']();
    }
}