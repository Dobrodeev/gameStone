<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 11.03.2019
 * Time: 20:30
 */

class PassengerCar
{
    public $year,
        $color,
        $speed,
        $wheels = array();

    function __construct($color = 'Grey', $speed = 0)
    {
        $this->color = $color;
        $this->speed = $speed;
        for ($i = 0; $i < 4; ++$i) {
            $this->wheels[$i] = new Wheel($this);
        }
    }

    function aacelerate($speed)
    {
        $this->speed += $speed;
    }

    function __toString()
    {
        return "This is {$this->color} car with speed = {$this->speed}!";
    }
}