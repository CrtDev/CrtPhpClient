<?php

/**
 * Copyright (c) 2016 CRT. All rights reserved.
 */

namespace CrtPhpClient;

class HttpClient
{
    public static function curlExec($url, $method, $getFields = [], $postFields = [])
    {
        if ($method == HttpMethod::GET) {
            $url = self::appendUrlEncodedParams($url, $getFields);
        }

        $curl = curl_init($url);
        switch ($method)
        {
            case HttpMethod::POST:
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postFields));
                curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                break;
            case HttpMethod::PUT;
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postFields));
                curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                break;
            case HttpMethod::DELETE:
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
                break;
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);

        return $result;
    }

    private static function appendUrlEncodedParams($url, $params)
    {
        if (!empty($params)) {
            $url .= strpos($url, '?') === false ? '?' : '&';
            $url .= http_build_query($params);
        }
        return $url;
    }
}
