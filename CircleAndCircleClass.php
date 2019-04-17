<?php
/**
 * Created by PhpStorm.
 * User: dobrodeev
 * Date: 14.08.2018
 * Time: 13:49
 */

class CircleAndCircleClass
{
    private $x;
    private $y;
    private $r;

    public function __construct($x, $y, $r)
    {
        $this->x = $x;
        $this->y = $y;
        $this->r = $r;
    }

    public function setCircle($x, $y, $r)
    {
        $this->x = $x;
        $this->y = $y;
        $this->r = $r;
    }

    public function countIntersections($another)
    {
        // abs(), min(), max() if $distance > abs(r1-r2)
        $distance = sqrt(pow($this->x - $another->x, 2) + pow($this->y - $another->y, 2));
        if ($distance > $this->r + $another->r || $distance < abs($this->r - $another->r))
        {
            return 0;
        }
        elseif ($distance == $this->r + $another->r || ($distance == abs($this->r - $another->r) && $distance != 0))
        {
            return 1;
        }
        elseif ($distance < $this->r + $another->r && $distance > abs($this->r - $another->r))
        {
            return 2;
        }
        elseif ($this->x == $another->x && $this->y == $another->y && $this->r == $another->r)
        {
            return -1;
        }
    }
}
