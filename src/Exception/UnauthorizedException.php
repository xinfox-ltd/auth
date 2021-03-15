<?php
/**
 * 异常
 * [XinFox System] Copyright (c) 2011 - 2021 XINFOX.CN
 */

declare(strict_types=1);

namespace XinFox\Auth\Exception;

use XinFox\Auth\GuardInterface;

class UnauthorizedException extends AuthException
{
    protected ?GuardInterface $guard;

    protected int $statusCode = 401;

    public function __construct(string $message, GuardInterface $guard = null, \Throwable $previous = null)
    {
        parent::__construct($message, 401, $previous);
        $this->guard = $guard;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $statusCode): UnauthorizedException
    {
        $this->statusCode = $statusCode;
        return $this;
    }
}