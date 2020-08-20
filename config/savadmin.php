<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'api' => [
        'url' => env('API_URL','http://localhost/api')
    ],
    'app' => [
        'prefix' => 'admin'
    ],
    'tenancy' => [
        'use_tenancy' => env("USE_TENANCY", false),
        'header_name' => env('TENANT_HEADER','X-Tenant'),
        'query_parameter_name' => env("TENANT_PARAM", "tenant")
    ]
];
