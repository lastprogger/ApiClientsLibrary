### ApiClientsLibrary

1. `php artisan vendor:publish` and choice InternalApiServiceProvider
2. Add service provider `InternalApi\InternalApiServiceProvider::class` to config/app.php

3. Add to .env 

INTERNAL_API_TOKEN=  
HEADER_INTERNAL_API_TOKEN=  

SERVICE_PHONE_NUMBER_HOST=  
SERVICE_PHONE_NUMBER_API_VERSION=v1  

SERVICE_PBX_SCHEME_HOST=  
SERVICE_PBX_SCHEME_API_VERSION=
