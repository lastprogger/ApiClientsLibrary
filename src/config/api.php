<?php

return [
    'internal_api_token'        => env('INTERNAL_API_TOKEN'),
    'header_internal_api_token' => env('HEADER_INTERNAL_API_TOKEN'),
    'service_phone_number'      => [
        'host'     => env('SERVICE_PHONE_NUMBER_HOST'),
        'endpoint' => [
            'did' => [
                'get'           => env('SERVICE_PHONE_NUMBER_HOST') . '/did/{id}',
                'create'        => env('SERVICE_PHONE_NUMBER_HOST') . '/did',
                'list'          => env('SERVICE_PHONE_NUMBER_HOST') . '/did',
                'change_status' => env('SERVICE_PHONE_NUMBER_HOST') . '/did/{id}/change-status',
            ],
        ],
    ],

];
