<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 11.03.2019
 * Time: 20:30
 */

class PassengerCar
{
    public
        $color = 'Grey',
        $speed = 0,
        $wheels;
    public $mark;
    public $model;
    public $year;
    public $v;
    public $transmission;

    public function __construct()
    {
        # code...
    }

    public function acelerate($speed)
    {

    }

    public function __toString()
    {
        return "This is {$this->color} car with speed = {$this->speed}!";
    }
}