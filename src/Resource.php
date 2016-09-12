<?php

/**
 * Copyright (c) 2016 CRT. All rights reserved.
 */

namespace CrtPhpClient;

class Resource
{
    protected $apiAddress = 'http://crt.ru/api/v1/';
//    protected $apiAddress = 'http://dev.crt.ru/api/v1/';
    protected $query = [];
    protected $postFields = [];

    public function __construct($apiAddress = false)
    {
        if ($apiAddress) {
            $this->apiAddress = $apiAddress;
        }
    }

    protected function getResource($resource)
    {
        $response = json_decode(HttpClient::curlExec(
            $this->apiAddress.$resource.'.json',
            HttpMethod::GET,
            $this->query,
            $this->postFields
        ), true);

        if (array_key_exists($resource, $response)) {
            return $response[$resource];
        }

        return $response;
    }
}
