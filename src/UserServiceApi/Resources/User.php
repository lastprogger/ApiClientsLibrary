<?php

namespace InternalApi\UserServiceApi\Resources;

use GuzzleHttp\ClientInterface as HttpClientInterface;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Cache;
use InternalApi\UserServiceApi\Models\User as UserModel;

class User
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
            public function getAuthUser(): string
            {
                return config('api.user_service.endpoint.user.get_auth_user');
            }
        };
    }

    /**
     * @param string $authToken
     *
     * @return UserModel
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAuthUser(string $authToken): UserModel
    {
        $data = Cache::remember($authToken, 60 * 60, function () use ($authToken){

            $response = $this->httpClient->request(
                'GET',
                $this->endpoint()->getAuthUser(),
                [
                    RequestOptions::HEADERS => [
                        'Accept'         => 'Application/json',
                        'Authorization'  => $authToken
                    ]
                ]
            );

            $content = $response->getBody()->getContents();

            return json_decode($content, true);

        });

        return (new UserModel())->setData($data);
    }
}