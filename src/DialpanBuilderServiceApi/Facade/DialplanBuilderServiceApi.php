<?php

namespace InternalApi\DialplanBuilderService\Facade;

use Illuminate\Support\Facades\Facade;

class DialplanBuilderServiceApi extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'dialplan_builder_service_api';
    }
}
