<?php

namespace App\Robots;

class Robot1
{
    protected $weight = 10;
    protected $speed = 20;
    protected $height = 5;

    public function getWeight()
    {
        return $this->weight;
    }

    public function getSpeed()
    {
        return $this->speed;
    }

    public function getHeight()
    {
        return $this->height;
    }
}
