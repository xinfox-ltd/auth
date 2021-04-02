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
    private VisitorInterface $visitor;

    private $jti;
    private $iat;
    private $nbf;
    private $exp;
    private $uid;

    private Plain $planToken;

    public function __construct(VisitorInterface $visitor, Plain $token)
    {
        $this->visitor = $visitor;
        $this->planToken = $token;
    }

    /**
     * @return VisitorInterface
     */
    public function getVisitor(): VisitorInterface
    {
        return $this->visitor;
    }

    /**
     * @return mixed|null
     */
    public function getJti()
    {
        return $this->planToken->claims()->get('jti');
    }

    /**
     * @return mixed|null
     */
    public function getIat()
    {
        return $this->planToken->claims()->get('iat');
    }

    /**
     * @return mixed|null
     */
    public function getNbf()
    {
        return $this->planToken->claims()->get('nbf');
    }

    /**
     * @return mixed|null
     */
    public function getExp()
    {
        return $this->planToken->claims()->get('exp');
    }

    /**
     * @return mixed|null
     */
    public function getUid()
    {
        return $this->planToken->claims()->get('uid');
    }

    public function __toString(): string
    {
        return $this->planToken->toString();
    }
}