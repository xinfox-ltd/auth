<?php
/**
 * 接口
 * [XinFox System] Copyright (c) 2011 - 2021 XINFOX.CN
 */

declare(strict_types=1);

namespace XinFox\Auth;

interface GuardInterface
{
    public function login(VisitorInterface $visitor): Token;

    public function logout(): void;

    public function user(): VisitorInterface;
}