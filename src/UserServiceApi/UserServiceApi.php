<?php
namespace InternalApi\UserServiceApi;

use InternalApi\ServiceApi;

class UserServiceApi extends ServiceApi
{
    /**
     * @return Resources\User
     */
    public function user(): Resources\User
    {
        return new Resources\User($this->getHttpClient());
    }
}