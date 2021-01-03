<?php

/**
 * Class Wheel класс колес для автомобиля
 */
class Wheel
{
    /**
     * @var float
     */
    /**
     * @var float|int
     */
    /**
     * @var float|int|null
     */
    private $pressure,
        $d,
        $owner;

    /**
     * Wheel constructor.
     * @param  null  $owner
     * @param  float  $pressure
     * @param  int  $d
     */
    function __construct($owner = null, $pressure = 2.0, $d = 13)
    {
        $this->pressure = $pressure;
        $this->d = $d;
        $this->owner = $owner;
    }

    /**
     * @return float|int|null
     */
    function getPressure()
    {
        return $this->pressure;
    }

    /**
     * @param $pressure
     */
    function setPressure($pressure)
    {
        if ($pressure < 0) {
            $pressure = 0;
        }
        if ($pressure > 5) {
            echo "BABAH!!!<br>";
            $pressure = 0;
        }
        if ($this->owner != null) {
            if ($pressure == 0) {
                $this->owner->speed = 0;
            } else {
                if ($pressure < 0.5) {
                    $this->owner->speed /= 2;
                }
            }
        }
        $this->pressure = $pressure;
    }
}

/**
 * Class Car состоит из кузова и колес класса Wheel
 */
class Car
{
    /**
     * @var
     */
    /**
     * @var string
     */
    /**
     * @var int|string
     */
    /**
     * количество колесв автомобиле может быть 4, 6, ...
     * @var int|string
     */
    public $year;
    public $color;
    public $speed;
    public $wheels = array();

    /**
     * Car constructor.
     * @param  string  $color
     * @param  int  $speed
     */
    function __construct($color = 'Grey', $speed = 0)
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
    function aacelerate($speed)
    {
        $this->speed += $speed;
    }

    /**
     * @return string
     */
    function __toString()
    {
        return "This is {$this->color} car with speed = {$this->speed}!";
    }
}

$a = new Car();
$b = new Car('Green', 120);
// накачаем во второе колесо 7 бар
$b->wheels[2]->setPressure(7);
echo $a."<br>";
$a->color = 'Red';
echo $a."<br>";
echo $b."<br>";

for ($i = 0; $i < 4; ++$i) {
    echo $b->wheels[$i]->getPressure()."<br>";
}
// постфиксная и префиксная записи: сравнение
function post(&$x)
{
    $temp = $x;
    $x += 1;
    return $temp;
}

function pref(&$x)
{
    return $x += 1;;
}


$x = 10;
echo post($x)."<br>";
echo $x."<br>";

$x = 10;
echo $x++."<br>";
echo $x."<br>";


$x = 10;
echo pref($x)."<br>";
echo $x."<br>";

$x = 10;
echo ++$x."<br>";
echo $x."<br>";