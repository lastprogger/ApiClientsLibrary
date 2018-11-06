<?php
/**
 * Created by PhpStorm.
 * User: faadmin
 * Date: 04.10.18
 * Time: 11:58
 */

namespace InternalApi;

use GuzzleHttp\Client as GuzzleHttpClient;
use Illuminate\Support\ServiceProvider;
use InternalApi\PbxSchemeServiceApi\PbxSchemeServiceApi;
use InternalApi\PhoneNumberServiceApi\PhoneNumberServiceApi;

class InternalApiServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishResources();
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */

    public function register(): void
    {
        $this->app->bind(
            'phone_number_service_api', function ($app) {

            $httpClient = new GuzzleHttpClient(
                [
                    'base_uri' => $app['config']['api.service_phone_number.host'],
                ]
            );

            return new PhoneNumberServiceApi($httpClient);
        }
        );

        $this->app->bind(
            'pbx_scheme_service_api', function ($app) {

            $httpClient = new GuzzleHttpClient(
                [
                    'base_uri' => $app['config']['api.service_pbx_scheme.host'],
                ]
            );

            return new PbxSchemeServiceApi($httpClient);
        }
        );
    }

    /**
     * Publish currency resources
     *
     * @return void
     */
    public function publishResources(): void
    {
        if ($this->isLumen() === false) {
            $this->publishes(
                [
                    __DIR__ . '/config/api.php' => config_path('api.php'),
                ], 'config'
            );
        }
    }

    /**
     * Check if package is running under Lumen app
     *
     * @return bool
     */
    protected function isLumen(): bool
    {
        return str_contains($this->app->version(), 'Lumen') === true;
    }
}
