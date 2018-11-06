<?php

namespace InternalApi\PbxSchemeServiceApi\Facade;

use Illuminate\Support\Facades\Facade;

class PbxSchemeServiceApiFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'pbx_scheme_service_api';
    }
}
