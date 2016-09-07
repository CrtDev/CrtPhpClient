<?php

/**
 * Copyright (c) 2016 CRT. All rights reserved.
 */

namespace CrtPhpClient;

class Crt
{
    private $apiAddress;
    /**
     * example: http://crt.ru/api/v1/
     *
     * @param string $apiAddress
     */
    public function setApiAddress($apiAddress)
    {
        $this->apiAddress = $apiAddress;
    }

    /**
     * Catalog navigation
     *
     * @return $this
     */
    public function catalog()
    {
        return new Catalog($this->apiAddress);
    }

    /**
     * Searching by PARTs and OEMs
     */
    public function search()
    {

    }

    /**
     * Cart
     */
    public function cart()
    {

    }
}
