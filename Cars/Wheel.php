<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 11.03.2019
 * Time: 20:26
 */

//

/**
 * Class Wheel
 */
class Wheel
{
    /**
     * @var float
     */
    private $pressure;
    /**
     * @var int
     */
    public $d;
    /**
     * @var null
     */
    public $owner;

    /**
     * Wheel constructor.
     * @param  null  $owner
     * @param  float  $pressure
     * @param  int  $d
     */
    public function __construct($owner = null, $pressure = 2.0, $d = 13)
    {
        $this->pressure = $pressure;
        $this->d = $d;
        $this->owner = $owner;
    }

    /**
     * @return float
     */
    public function getPressure()
    {
        return $this->pressure;
    }

    /**
     * @param $pressure
     */
    public function setPressure($pressure)
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