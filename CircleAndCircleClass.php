<?php
/**
 * Created by PhpStorm.
 * User: dobrodeev
 * Date: 14.08.2018
 * Time: 13:49
 */

class CircleAndCircleClass
{

    private $x1;
    private $y1;
    private $r1;
    private $x2;
    private $y2;
    private $r2;
    public $countPoints;
    // 1 класс для круга и 2 обьекта - круги
    public function getCircle1($x, $y, $r)
    {

        $this->x1 = $x;
        $this->y1 = $y;
        $this->r1 = $r;
    }

    public function getCircle2($x, $y, $r)
    {
        $this->x2 = $x;
        $this->y2 = $y;
        $this->r2 = $r;
    }

    public function countIntersections()
    {
        // abs(), min(), max() if $distance > abs(r1-r2)
        $distance = sqrt(pow($this->x1 - $this->x2, 2) + pow($this->y1 - $this->y2, 2));
        if ($distance > $this->r1 + $this->r2 || $this->r2 > $distance + $this->r1 || $this->r1 > $distance + $this->r2)
        {
            $this->countPoints = 0;
        }
        elseif ($distance == $this->r1 + $this->r2 || $this->r2 == $distance + $this->r1 || $this->r1 == $distance + $this->r2)
        {
            $this->countPoints = 1;
        }
        elseif ($distance < $this->r1 + $this->r2 || $this->r2 < $distance + $this->r1 || $this->r1 < $distance + $this->r2)
        {
            $this->countPoints = 2;
        }
        elseif ($this->x1 == $this->x2 && $this->y1 == $this->y2 && $this->r1 == $this->r2)
        {
            $this->countPoints = 'infinity';
        }
    }
}