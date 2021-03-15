<?php
/**
 * 访客
 * [XinFox System] Copyright (c) 2011 - 2021 XINFOX.CN
 */

declare(strict_types=1);

namespace XinFox\Auth;

class Guest implements VisitorInterface
{
    const IDENTITY = 'guest';

    public function getRole(): string
    {
        return self::IDENTITY;
    }

    public function getId(): int
    {
        return 0;
    }
}