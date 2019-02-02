<?php

namespace InternalApi\PbxSchemeServiceApi\Facade;

use Illuminate\Support\Facades\Facade;

class UserServiceApiFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'user_service_api';
    }
}
