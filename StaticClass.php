<?php
/**
 * Created by PhpStorm.
 * User: dobrodeev
 * Date: 02.08.2018
 * Time: 12:10
 */

class StaticClass
{
    static public $num = 1;
    static public function hello()
    {
        echo '<br>Hi!<br>';
        self::$num++;
        echo 'Number: '.self::$num.'<br>';
    }
}

echo StaticClass::$num;
echo StaticClass::hello();

class StaticClass2
{
    static public $number = 1;

    static public function staticMath1()
    {
        echo self::$number++.'<br>';
    }

    static public function staticMath2()
    {
        echo self::$number--.'<br>';
    }

    static public function staticMath3()
    {
        echo (self::$number*19).'<br>';
    }
}

StaticClass2::staticMath1();
StaticClass2::staticMath2();
StaticClass2::staticMath3();