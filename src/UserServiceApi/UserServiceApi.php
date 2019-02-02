<?php
namespace InternalApi\UserServiceApi;

use InternalApi\ServiceApi;

class UserServiceApi extends ServiceApi
{
    /**
     * @return Resources\Auth
     */
    public function auth(): Resources\Auth
    {
        return new Resources\Auth($this->getHttpClient());
    }
}