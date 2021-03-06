<?php

namespace InternalApi\DialplanBuilderService\Resources;


use GuzzleHttp\ClientInterface as HttpClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use InternalApi\PhoneNumberServiceApi\Models\DIDPhoneNumber as DIDPhoneNumberModel;

class Dialplan
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
            public function create(): string
            {
                return config('api.service_asterisk_dialplan_builder.endpoint.dialplan.create');
            }
        };
    }


    /**
     * @param array $pbxSchemeData
     *
     * @return array|null
     */
    public function create(array $pbxSchemeData): ?array
    {
        try {
            $response = $this->httpClient->request(
                'POST',
                $this->endpoint()->create(),
                [
                    RequestOptions::HEADERS => [
                        'Accept'         => 'Application/json',
                    ],
                    RequestOptions::JSON => $pbxSchemeData,
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