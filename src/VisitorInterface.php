<?php
/**
 * 访问者接口
 * [XinFox System] Copyright (c) 2011 - 2021 XINFOX.CN
 */

declare(strict_types=1);

namespace XinFox\Auth;

interface VisitorInterface
{
    public function getRole(): string;

    public function getId();
}