<?php

namespace InternalApi\DialplanBuilderService\Resources;


use GuzzleHttp\ClientInterface as HttpClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use InternalApi\DialplanBuilderService\Models\PbxScheme as PbxSchemeModel;
use InternalApi\PhoneNumberServiceApi\Models\DIDPhoneNumber as DIDPhoneNumberModel;

class SipUser
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
                return config('api.service_asterisk_dialplan_builder.endpoint.sip_user.create');
            }

            public function get(string $phoneNumberId): string
            {
                $endpoint = config('api.service_asterisk_dialplan_builder.endpoint.sip_user.get');

                return str_replace('{id}', $phoneNumberId, $endpoint);
            }

            public function delete(string $phoneNumberId): string
            {
                $endpoint = config('api.service_asterisk_dialplan_builder.endpoint.sip_user.delete');

                return str_replace('{id}', $phoneNumberId, $endpoint);
            }
        };
    }

    /**
     * @param string $id
     *
     * @return array|null
     * @throws GuzzleException
     */
    public function get(string $id): ?array
    {

        $response = $this->httpClient->request(
            'GET',
            $this->endpoint()->get($id),
            [
                RequestOptions::HEADERS => [
                    'Accept' => 'Application/json',
                ],
            ]
        );

        $content = $response->getBody()->getContents();

        if (empty($content)) {
            return null;
        }

        return json_decode($content, true);
    }

    /**
     * @param string $id
     *
     * @return array|null
     * @throws GuzzleException
     */
    public function delete(string $id): ?array
    {

        $response = $this->httpClient->request(
            'DELETE',
            $this->endpoint()->delete($id),
            [
                RequestOptions::HEADERS => [
                    'Accept' => 'Application/json',
                ],
            ]
        );

        $content = $response->getBody()->getContents();

        if (empty($content)) {
            return null;
        }

        return json_decode($content, true);
    }

    /**
     * @param array $data
     *
     * @return array|null
     */
    public function create(array $data): ?array
    {
        $response = $this->httpClient->request(
            'POST',
            $this->endpoint()->create(),
            [
                RequestOptions::HEADERS => [
                    'Accept' => 'Application/json',
                ],
                RequestOptions::JSON    => $data,
            ]
        );

        $content = $response->getBody()->getContents();

        if (empty($content)) {
            return null;
        }

        return json_decode($content, true);
    }
}