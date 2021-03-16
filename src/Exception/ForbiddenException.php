<?php
/**
 * ForbiddenException
 * [XinFox System] Copyright (c) 2011 - 2021 XINFOX.CN
 */

declare(strict_types=1);

namespace XinFox\Auth\Exception;

use Throwable;

class ForbiddenException extends AuthException
{
    public function __construct($message = "没有权限", $code = 403, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}