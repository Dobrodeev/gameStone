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
    public $countPoints;
    
    public function getCircle($x, $y, $r)
    {
        $this->x = $x;
        $this->y = $y;
        $this->r = $r;
    }
    
    public function countIntersections()
    {
        $x1 = $this->x;
        $y1 = $this->y;
        $r1 = $this->r;
        echo 'Circle: ('.$x1.', '.$y1.'); r='.$r1.'<br>';
    }

    // 1 класс для круга и 2 обьекта - круги
    /**
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
    */    
}
