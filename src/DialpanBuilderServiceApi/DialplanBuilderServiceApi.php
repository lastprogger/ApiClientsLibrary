<?php

namespace InternalApi\DialplanBuilderService;

use GuzzleHttp\ClientInterface as HttpClientInterface;

class DialplanBuilderServiceApi
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
     * @return Resources\Dialplan
     */
    public function dialplan(): Resources\Dialplan
    {
        return new Resources\Dialplan($this->httpClient);
    }

    /**
     * @return Resources\PbxScheme
     */
    public function pbxScheme(): Resources\PbxScheme
    {
        return new Resources\PbxScheme($this->httpClient);
    }

    /**
     * @return Resources\SipUser
     */
    public function sipUser(): Resources\SipUser
    {
        return new Resources\SipUser($this->httpClient);
    }
}