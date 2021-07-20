<?php

namespace App\Robots;

/**
 * Class FactoryRobot
 * @package App\Robots
 */
class FactoryRobot
{
    /**
     * Robots types array (class mapping)
     * @var array
     */
    protected $robotTypes = [];

    /**
     * @var null
     */
    protected $mergedRobot = null;

    /**
     * Add robot type to array by class
     * @param $robot
     */
    public function addType($robot)
    {
        // If we want add a merged robot
        if ($robot instanceof MergeRobot) {
            $this->mergedRobot = $robot;
            return;
        }

        // Prevent duplicating robots types in array
        if (! in_array(get_class($robot), $this->robotTypes)) {
            $classArray = explode('\\', get_class($robot));
            $className = end($classArray);
            $this->robotTypes[$className] = get_class($robot);
        }
    }

    /**
     * This magic method creates a specified count of robots by method name.
     *
     * @param string $name
     * @param array $arguments
     * @return array
     */
    public function __call(string $name, array $arguments): array
    {
        $robotType = preg_replace('/^create/', '', $name);
        if (! array_key_exists($robotType, $this->robotTypes)) {
            die('Method name is invalid.');
        }

        $result = [];
        $count = isset($arguments[0]) ? intval($arguments[0]) : 1;
        for ($i = 0; $i < $count; $i++) {
            $result[] = new $this->robotTypes[$robotType]();
        }

        return $result;
    }

    /**
     * @param int $count
     * @return array
     */
    public function createMergeRobot(int $count = 1): array
    {
        if (! $this->mergedRobot) {
            die('Merged robot was not added.');
        }

        $result = [];
        for ($i = 0; $i < $count; $i++) {
            $result[] = clone $this->mergedRobot;
        }

        return $result;
    }
}
