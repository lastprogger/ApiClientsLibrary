<?php

namespace InternalApi\PbxSchemeServiceApi\Resources;


use GuzzleHttp\ClientInterface as HttpClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;

class Pbx
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
                $endpoint = config('api.service_pbx_scheme.endpoint.pbx.get');

                return str_replace('{id}', $id, $endpoint);
            }
        };
    }

    /**
     * @param string $id
     *
     * @return null|array
     */
    public function get(string $id): ?array
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

            return json_decode($content, true);

        } catch (\Exception|GuzzleException $e) {
            \Log::error($e);

            return null;
        }
    }
}