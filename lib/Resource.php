<?php

/**
 * Copyright (c) 2016 CRT. All rights reserved.
 */

class Resource
{
    protected $apiAddress = 'http://crt.ru/api/v1/';

    public function __construct($apiAddress = false)
    {
        if ($apiAddress) {
            $this->apiAddress = $apiAddress;
        }
    }

    protected function get($data)
    {
        if (!array_key_exists('query', $data)) {
            $data['query'] = [];
        }

        if (!array_key_exists('postFields', $data)) {
            $data['postFields'] = [];
        }

        return json_decode(HttpClient::curlExec(
            $this->apiAddress.$data['resource'].'.json',
            HttpMethod::GET,
            $data['query'],
            $data['postFields']
        ), true)[$data['resource']];
    }


}
