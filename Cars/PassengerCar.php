<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 11.03.2019
 * Time: 20:30
 */
//

/**
 * Class PassengerCar
 */
class PassengerCar
{
    /**
     * @var
     */
    public $year;
    /**
     * @var string
     */
    public $color;
    /**
     * @var int
     */
    public $speed;
    /**
     * @var array
     */
    public $wheels = array();

    /**
     * PassengerCar constructor.
     * @param  string  $color
     * @param  int  $speed
     */
    public function __construct($color = 'Grey', $speed = 0)
    {
        $this->color = $color;
        $this->speed = $speed;
        for ($i = 0; $i < 4; ++$i) {
            $this->wheels[$i] = new Wheel($this);
        }
    }

    /**
     * @param $speed
     */
    public function accelerate($speed)
    {
        $this->speed += $speed;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "This is {$this->color} car with speed = {$this->speed}!";
    }
}