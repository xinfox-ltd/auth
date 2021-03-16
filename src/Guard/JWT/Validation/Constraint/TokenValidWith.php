<?php
/**
 * 从持久化中判断token是否有效
 * [XinFox System] Copyright (c) 2011 - 2021 XINFOX.CN
 */

declare(strict_types=1);

namespace XinFox\Auth\Guard\JWT\Validation\Constraint;

use Lcobucci\JWT\Token;
use Lcobucci\JWT\UnencryptedToken;
use Lcobucci\JWT\Validation\Constraint;
use Lcobucci\JWT\Validation\ConstraintViolation;
use XinFox\Auth\TokenProviderInterface;

class TokenValidWith implements Constraint
{
    private TokenProviderInterface $tokenProvider;

    public function __construct(TokenProviderInterface $tokenProvider)
    {
        $this->tokenProvider = $tokenProvider;
    }

    public function assert(Token $token): void
    {
        if (!$token instanceof UnencryptedToken) {
            throw new ConstraintViolation('You should pass a plain token');
        }

        if (!$this->tokenProvider->valid($token->claims()->get('jti'))) {
            throw new ConstraintViolation('Invalid token');
        }
    }
}