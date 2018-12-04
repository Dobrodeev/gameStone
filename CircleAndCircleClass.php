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
    /**
    public function countIntersections()
    {
        $x1 = $this->x;
        $y1 = $this->y;
        $r1 = $this->r;
        echo 'Circle: ('.$x1.', '.$y1.'); r='.$r1.'<br>';
    }
    */
    public function countIntersections($another)
    {
        // abs(), min(), max() if $distance > abs(r1-r2)
        $distance = sqrt(pow($this->x - $another->x, 2) + pow($this->y1 - $another->y, 2));
        if ($distance > $this->r + $another->r || $another->r > $distance + $this->r || $this->r > $distance + $another->r)
        {
            return 0;
        }
        elseif ($distance == $this->r + $another->r || $another->r == $distance + $this->r || $this->r == $distance + $another->r)
        {
            return 1;
        }
        elseif ($distance < $this->r + $another->r || $another->r < $distance + $this->r || $this->r < $distance + $another->r)
        {
            return 2;
        }
        elseif ($this->x == $another->x && $this->y == $another->y && $this->r == $another->r)
        {
            return -1;
        }
    }
    // 1 класс для круга и 2 обьекта - круги
    /**
    public function getCircle1($x, $y, $r)
    {

        $this->x = $x;
        $this->y = $y;
        $this->r = $r;
    }

    public function getCircle2($x, $y, $r)
    {
        $another->x = $x;
        $another->y = $y;
        $another->r = $r;
    }

    public function countIntersections()
    {
        // abs(), min(), max() if $distance > abs(r1-r2)
        $distance = sqrt(pow($this->x - $another->x, 2) + pow($this->y - $another->y, 2));
        if ($distance > $this->r + $another->r || $another->r > $distance + $this->r || $this->r > $distance + $another->r)
        {
            $this->countPoints = 0;
        }
        elseif ($distance == $this->r + $another->r || $another->r == $distance + $this->r || $this->r == $distance + $another->r)
        {
            $this->countPoints = 1;
        }
        elseif ($distance < $this->r + $another->r || $another->r < $distance + $this->r || $this->r < $distance + $another->r)
        {
            $this->countPoints = 2;
        }
        elseif ($this->x == $another->x && $this->y == $another->y && $this->r == $another->r)
        {
            $this->countPoints = 'infinity';
        }
    }
    */    
}
