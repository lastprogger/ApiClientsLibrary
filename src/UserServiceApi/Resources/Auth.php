<?php

namespace InternalApi\UserServiceApi\Resources;

use GuzzleHttp\ClientInterface as HttpClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;

class Auth
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
            public function checkAuth(): string
            {
                return config('api.user_service.endpoint.check_auth');
            }
        };
    }

    public function checkAuth(string $authToken): ?array
    {
        $response = $this->httpClient->request(
            'GET',
            $this->endpoint()->checkAuth(),
            [
                RequestOptions::HEADERS => [
                    'Accept'         => 'Application/json',
                    'Authorization'  => $authToken
                ]
            ]
        );

        $content = $response->getBody()->getContents();

        if (empty($content)) {
            return null;
        }

        return json_decode($content, true);
    }
}