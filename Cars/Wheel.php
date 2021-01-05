<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 11.03.2019
 * Time: 20:26
 */

class Wheel
{
    private $pressure,
        $d,
        $owner;

    function __construct($owner = NULL, $pressure = 2.0, $d = 13)
    {
        $this->pressure = $pressure;
        $this->d = $d;
        $this->owner = $owner;
    }

    function getPressure() {return $this->pressure;}

    function setPressure($pressure)
    {
        if ($pressure < 0) $pressure = 0;
        if ($pressure > 5)
        {
            echo "BABAH!!!<br>";
            $pressure = 0;
        }
        if ($this->owner != NULL)
        {
            if ($pressure == 0)
                $this->owner->speed = 0;
            else if($pressure < 0.5)
                $this->owner->speed /= 2;
        }
        $this->pressure = $pressure;
    }
}