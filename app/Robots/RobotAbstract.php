<?php

namespace App\Robots;

/**
 * Class RobotAbstract
 * @package App\Robots
 */
abstract class RobotAbstract
{
    /**
     * @var int
     */
    protected $weight = 0;

    /**
     * @var int
     */
    protected $speed = 0;

    /**
     * @var int
     */
    protected $height = 0;

    /**
     * Get robot weight
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Get robot speed
     * @return int
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * Get robot height
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }
}
