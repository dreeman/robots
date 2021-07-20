<?php

namespace App\Robots;

/**
 * Class MergeRobot
 * @package App\Robots
 */
class MergeRobot
{
    protected $robots = [];

    public function addRobot($robot)
    {
        if (is_array($robot)) {
            foreach ($robot as $r) {
                $this->robots[] = $r;
            }
            return;
        }
        $this->robots[] = $robot;
    }

    /**
     * Get robot weight
     * @return int
     */
    public function getWeight()
    {
        $weight = 0;
        foreach ($this->robots as $robot) {
            $weight += $robot->getWeight();
        }

        return $weight;
    }

    /**
     * Get robot speed
     * @return int
     */
    public function getSpeed()
    {
        $speed = PHP_INT_MAX;
        foreach ($this->robots as $robot) {
            $speed = min($robot->getSpeed(), $speed);
        }

        return $speed;
    }

    /**
     * Get robot height
     * @return int
     */
    public function getHeight()
    {
        $height = 0;
        foreach ($this->robots as $robot) {
            $height += $robot->getHeight();
        }

        return $height;
    }
}
