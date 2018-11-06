<?php
namespace InternalApi\PbxSchemeServiceApi;

use GuzzleHttp\ClientInterface as HttpClientInterface;

class PbxSchemeServiceApi
{
    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    /**
     * PhoneNumberServiceApi constructor.
     *
     * @param HttpClientInterface $httpClient
     */
    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @return Resources\pbx
     */
    public function pbx(): Resources\Pbx
    {
        return new Resources\Pbx($this->httpClient);
    }
}