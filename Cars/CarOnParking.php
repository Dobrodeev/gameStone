<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 13.05.2019
 * Time: 11:40
 */

class CarOnParking
{
    public $car_name;
    public $car_on_parking;
    public $car_arrive;
    public $car_depart;
    public $car_time;

    /**
     * CarOnParking constructor.
     * @param $car_name
     * @param $car_on_parking
     */
    public function __construct($car_name, $car_on_parking)
    {
        $this->car_name = $car_name;
        $this->car_on_parking = $car_on_parking;
    }


}