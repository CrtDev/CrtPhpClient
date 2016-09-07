<?php

/**
 * Copyright (c) 2016 CRT. All rights reserved.
 */

namespace CrtPhpClient;

class Catalog extends Resource
{
    /**
     * @param null|string $mark
     * @return $this|array
     */
    public function mark($mark = null)
    {
        if (isset($mark)) {
            $this->query['mark'] = $mark;
            return $this;
        }

        return $this->get('marks');
    }

    /**
     * @param null|string $market
     * @return $this|array
     */
    public function market($market = null)
    {
        if (isset($market)) {
            $this->query['market'] = $market;
            return $this;
        }

        return $this->get('markets');
    }

    /**
     * @param null|string $model
     * @return $this|array
     */
    public function model($model = null)
    {
        if (isset($model)) {
            $this->query['model'] = $model;
            return $this;
        }

        return $this->get('models');
    }

    /**
     * @param null|string $frame
     * @return $this|array
     */
    public function frame($frame = null)
    {
        if (isset($frame)) {
            $this->query['frame'] = $frame;
            return $this;
        }

        return $this->get('frames');
    }

    /**
     * @param null|int $year
     * @return $this|array
     */
    public function year($year = null)
    {
        if (isset($year)) {
            $this->query['year'] = $year;
            return $this;
        }

        return $this->get('years');
    }

    /**
     * @return array locations with parts
     * @throws Exception
     */
    public function group()
    {
        return $this->get('groups');
    }
}
