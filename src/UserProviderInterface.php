<?php
/**
 * 用户提供者接口
 * [XinFox System] Copyright (c) 2011 - 2021 XINFOX.CN
 */

declare(strict_types=1);

namespace XinFox\Auth;

interface UserProviderInterface
{
    public function loginById($uid): VisitorInterface;
}