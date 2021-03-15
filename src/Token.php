<?php
/**
 * Token
 * [XinFox System] Copyright (c) 2011 - 2021 XINFOX.CN
 */

declare(strict_types=1);

namespace XinFox\Auth;

use Lcobucci\JWT\Token\Plain;

class Token
{
    private $jti;
    private $iat;
    private $nbf;
    private $exp;
    private $uid;

    public function __construct(Plain $token)
    {
        $this->jti = $token->claims()->get('jti');
        $this->iat = $token->claims()->get('iat');
        $this->nbf = $token->claims()->get('nbf');
        $this->exp = $token->claims()->get('exp');
        $this->uid = $token->claims()->get('uid');
    }

    /**
     * @return mixed|null
     */
    public function getJti()
    {
        return $this->jti;
    }

    /**
     * @return mixed|null
     */
    public function getIat()
    {
        return $this->iat;
    }

    /**
     * @return mixed|null
     */
    public function getNbf()
    {
        return $this->nbf;
    }

    /**
     * @return mixed|null
     */
    public function getExp()
    {
        return $this->exp;
    }

    /**
     * @return mixed|null
     */
    public function getUid()
    {
        return $this->uid;
    }
}