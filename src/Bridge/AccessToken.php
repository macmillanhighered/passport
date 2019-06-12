<?php

namespace Laravel\Passport\Bridge;

use League\OAuth2\Server\Entities\Traits\EntityTrait;
use League\OAuth2\Server\Entities\Traits\AccessTokenTrait;
use League\OAuth2\Server\Entities\Traits\TokenEntityTrait;
use League\OAuth2\Server\Entities\AccessTokenEntityInterface;
use App\Ship\Helpers\BinHelper;

class AccessToken implements AccessTokenEntityInterface
{
    use AccessTokenTrait, EntityTrait, TokenEntityTrait;

    /**
     * Create a new token instance.
     *
     * @param  string  $userIdentifier
     * @param  string|int  $userIdentifier
     * @param  array  $scopes
     * @return void
     */
    public function __construct($userIdentifier, array $scopes = [])
    {
        // $this->setUserIdentifier($userIdentifier);
        $this->setUserIdentifier(BinHelper::decodeUuid($userIdentifier));

        foreach ($scopes as $scope) {
            $this->addScope($scope);
        }
    }
}
