<?php
/**
 * JWT持久化接口
 * [XinFox System] Copyright (c) 2011 - 2021 XINFOX.CN
 */

declare(strict_types=1);

namespace XinFox\Auth;

interface TokenProviderInterface
{
    /**
     * 删除token
     * @param $tokenId
     * @return mixed
     */
    public function delete($tokenId): void;

    /**
     * 保存token
     * @param Token $token
     * @return mixed
     */
    public function save(Token $token);

    /**
     * @param string $tokenIdentify
     * @return bool
     */
    public function valid(string $tokenIdentify): bool;
}