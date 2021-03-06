<?php

namespace App\Robots;

/**
 * Class Robot1
 * @package App\Robots
 */
class Robot1 extends RobotAbstract
{
    // Override abstract (default) attributes values

    /**
     * @var int
     */
    protected $weight = 10;

    /**
     * @var int
     */
    protected $speed = 20;

    /**
     * @var int
     */
    protected $height = 5;
}
