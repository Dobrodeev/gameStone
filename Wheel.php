<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 11.03.2019
 * Time: 20:26
 */

class Wheel
{
    public $diametr;
    public $pressure;

    public function __construct($diametr, $pressure)
    {
        $this->diametr = $diametr;
        $this->pressure = $pressure;
    }
}