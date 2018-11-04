<?php

namespace InternalApi\PhoneNumberServiceApi\Facade;

use Illuminate\Support\Facades\Facade;

class PhoneNumberServiceApi extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'phone_number_service_api';
    }
}
