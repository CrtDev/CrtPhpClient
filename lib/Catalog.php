<?php

/**
 * Copyright (c) 2016 CRT. All rights reserved.
 */

class Catalog extends Resource
{
    private $mark,
            $market,
            $model,
            $frame,
            $year;

    /**
     * @param null|string $mark
     * @return $this|array
     */
    public function mark($mark = null)
    {
        if (isset($mark)) {
            $this->mark = $mark;
            return $this;
        }

        return $this->get([
            'resource' => 'marks'
        ]);
    }

    /**
     * @param null|string $market
     * @return $this|array
     */
    public function market($market = null)
    {
        if (isset($market)) {
            $this->market = $market;
            return $this;
        }

        return $this->get([
            'resource' => 'markets',
            'query' => [
                'mark' => $this->mark
            ]
        ]);
    }

    /**
     * @param null|string $model
     * @return $this|array
     */
    public function model($model = null)
    {
        if (isset($model)) {
            $this->model = $model;
            return $this;
        }

        return $this->get([
            'resource' => 'models',
            'query' => [
                'mark' => $this->mark,
                'market' => $this->market
            ]
        ]);
    }

    /**
     * @param null|string $frame
     * @return $this|array
     */
    public function frame($frame = null)
    {
        if (isset($frame)) {
            $this->frame = $frame;
            return $this;
        }

        return $this->get([
            'resource' => 'frames',
            'query' => [
                'mark' => $this->mark,
                'market' => $this->market,
                'model' => $this->model
            ]
        ]);
    }

    /**
     * @param null|int $year
     * @return $this|array
     */
    public function year($year = null)
    {
        if (isset($year)) {
            $this->year = $year;
            return $this;
        }

        return $this->get([
            'resource' => 'years',
            'query' => [
                'mark' => $this->mark,
                'market' => $this->market,
                'model' => $this->model
            ]
        ]);
    }

    /**
     * @return array locations with parts
     * @throws Exception
     */
    public function location()
    {
        $error = $this->checkParams();
        if ($error) {
            throw new \Exception($error);
        }

        $array = [
            50853 => [
                'location' => 'Передняя подвеска',
                'parts' => [
                    [
                        'id' => 38567,
                        'part' =>'1-01-895'
                    ],
                ]
            ],
            50854 => [
                'location' => 'Передняя подвеска',
                'parts' => [
                    [
                        'id' => 38567,
                        'part' =>'1-01-895'
                    ],
                ]
            ],
        ];

        return $array;
    }

    /**
     * @return bool|string
     */
    private function checkParams()
    {
        if (!isset($this->mark)) {
            return 'Param mark is undefined';
        }

        if (!isset($this->market)) {
            return "Param market is undefined";
        }

        if (!isset($this->model) || !$this->model) {
            return "Param model is undefined";
        }

        if (
            !(
                (isset($this->frame) && $this->frame)
                || (isset($this->year) && $this->year)
            )
        ) {
            return "Param frame or year is undefined";
        }

        return false;
    }
}
