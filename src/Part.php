<?php

/**
 * Copyright (c) 2016 CRT. All rights reserved.
 */

namespace CrtPhpClient;

class Part extends Resource
{
    public function get($id)
    {
        return $this->getResource("parts/$id");
    }
}
