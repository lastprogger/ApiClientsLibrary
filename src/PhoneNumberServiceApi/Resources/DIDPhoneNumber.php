<?php

namespace InternalApi\PhoneNumberServiceApi\Resources;


use GuzzleHttp\ClientInterface as HttpClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use InternalApi\PhoneNumberServiceApi\Models\DIDPhoneNumber as DIDPhoneNumberModel;

class DIDPhoneNumber
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

    private function endpoint()
    {
        return new class
        {
            public function get(string $id): string
            {
                $endpoint = config('api.service_phone_number.endpoint.did.get');

                return str_replace('{id}', $id, $endpoint);
            }
        };
    }

    /**
     * @param string $id
     *
     * @return null|DIDPhoneNumberModel
     */
    public function get(string $id): ?DIDPhoneNumberModel
    {
        $tokenHeaderName = config('api.header_internal_api_token');
        $apiToken        = config('api.internal_api_token');
        try {
            $response = $this->httpClient->request(
                'GET',
                $this->endpoint()->get($id),
                [
                    RequestOptions::HEADERS => [
                        $tokenHeaderName => $apiToken,
                        'Accept'         => 'Application/json',
                    ],
                ]
            );

            $content = $response->getBody()->getContents();

            if (empty($content)) {
                return null;
            }

            return new DIDPhoneNumberModel(json_decode($content));

        } catch (\Exception|GuzzleException $e) {
            \Log::error($e);

            return null;
        }
    }
}