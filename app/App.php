<?php

namespace App;

use App\Robots\FactoryRobot;
use App\Robots\MergeRobot;
use App\Robots\Robot1;
use App\Robots\Robot2;

/*
 * Для створення "простих роботів" застосував магічний метод __call
 * Він розпізнає тип робота власне по імені методу (конвенціонально) і додає назву класу в мапу типів роботів
 * (щоб не зберігати дані, а лише класи/типи роботів, з якими працює фабрика. цього достатньо для їх створення).
 *
 * Об'єднаний робот може бути лише один (як я зрозумів по назві методу createMergeRobot з ТЗ).
 * То ж він зберігається об'єктом. Додавати можна або напряму один екземпляр робота, або ж масив,
 * який згенерувала фабрика.
 *
 * Зробив так якраз для того "щоб можна було просто додавати" (по ТЗ).
 * Достатньо додати лише новий клас робота з його атрибутами і все.
 *
 * P.S. Ще можна було б додати ексепшини, але таймінг..)
 * то ж залишив просто die();
 *
 */

/**
 * Class App
 * @package App
 */
class App
{
    public function run()
    {
        $factory = new FactoryRobot();

        $factory->addType(new Robot1());
        $factory->addType(new Robot2());

        // Here used conventional method name by 'create<RobotName>' pattern
        // var_dump($factory->createRobot1(10));
        // var_dump($factory->createRobot2(2));

        $mergeRobot = new MergeRobot();
        $mergeRobot->addRobot(new Robot1());
        $mergeRobot->addRobot($factory->createRobot2(2));
        $factory->addType($mergeRobot);

        $robots = $factory->createMergeRobot(1);

        $res = reset($robots);
        //var_dump($res);

        echo $res->getSpeed() . PHP_EOL;
        echo $res->getWeight() . PHP_EOL;
        echo $res->getHeight() . PHP_EOL;
    }
}
