<?php

namespace InternalApi\PhoneNumberServiceApi;

use GuzzleHttp\ClientInterface as HttpClientInterface;
use InternalApi\PhoneNumberServiceApi\Models\DIDPhoneNumber;

class PhoneNumberServiceApi
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
     * @return Resources\DIDPhoneNumber
     */
    public function didPhoneNumber(): Resources\DIDPhoneNumber
    {
        return new Resources\DIDPhoneNumber($this->httpClient);
    }

}
