<?php

namespace Laravel\Passport\Bridge;

use League\OAuth2\Server\Entities\Traits\EntityTrait;
use League\OAuth2\Server\Entities\Traits\AuthCodeTrait;
use League\OAuth2\Server\Entities\AuthCodeEntityInterface;
use League\OAuth2\Server\Entities\Traits\TokenEntityTrait;
use App\Ship\Helpers\BinHelper;

class AuthCode implements AuthCodeEntityInterface
{
    use AuthCodeTrait, EntityTrait, TokenEntityTrait;
    
    public function setUserIdentifier($identifier)
    {
        parent::setUserIdentifier(BinHelper::encodeUuid($identifier));
    }
    public function getUserIdentifier()
    {
        return BinHelper::decodeUuid($this->userIdentifier);
    }
}
