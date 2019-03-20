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
        $wheels,
        $coleso;
    public $mark;
    public $model;
    public $year;
    public $v;
    public $transmission;

    public function __construct()
    {
        # code...
        include 'Wheel.php';
        $coleso = new Wheel(13, 2.1);
    }

    public function acelerate($speed)
    {
        echo 'Едем на скорости '.$speed.' км/ч <br>';
    }

    public function __toString()
    {
        return "This is {$this->color} car with speed = {$this->speed}!";
    }
}