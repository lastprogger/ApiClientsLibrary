<?php

namespace InternalApi\DialplanBuilderService\Resources;


use GuzzleHttp\ClientInterface as HttpClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use InternalApi\DialplanBuilderService\Models\PbxScheme as PbxSchemeModel;
use InternalApi\PhoneNumberServiceApi\Models\DIDPhoneNumber as DIDPhoneNumberModel;

class PbxScheme
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
            public function getByPbxId($pbxId): string
            {
                $endpoint = config('api.service_asterisk_dialplan_builder.endpoint.pbx_scheme.get_by_pbx_id');

                return str_replace('{pbx_id}',$pbxId, $endpoint);
            }
        };
    }

    /**
     * @param string $pbxId
     *
     * @return PbxSchemeModel|null
     */
    public function getByPbxId(string $pbxId): ?PbxSchemeModel
    {
        try {
            $response = $this->httpClient->request(
                'GET',
                $this->endpoint()->getByPbxId($pbxId),
                [
                    RequestOptions::HEADERS => [
                        'Accept'         => 'Application/json',
                    ],
                ]
            );

            $content = $response->getBody()->getContents();

            if (empty($content)) {
                return null;
            }
            $data = json_encode($content, true);
            return (new PbxSchemeModel())->setData($data['data']);

        } catch (\Exception|GuzzleException $e) {
            \Log::error($e);

            return null;
        }
    }
}