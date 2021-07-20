<?php

namespace App\Robots;

class FactoryRobot
{
    public $robotTypes = [];

    public function addType($robot)
    {
        if (! in_array(get_class($robot), $this->robotTypes)) {
            $classArray = explode('\\', get_class($robot));
            $className = end($classArray);
            $this->robotTypes[$className] = get_class($robot);
        }
    }

    public function __call(string $name, array $arguments)
    {
        $robotType = preg_replace('/^create/', '', $name);
        if (! array_key_exists($robotType, $this->robotTypes)) {
            die('Method name is invalid.');
        }
        $result = [];
        $count = isset($arguments[0]) ? intval($arguments[0]) : 1;
        for ($i = 0; $i < $count; $i++) {
            $result[] = new $this->robotTypes[$robotType];
        }

        return $result;
    }
    
    public function createMergeRobot(int $count = 1)
    {
        //
    }
}
