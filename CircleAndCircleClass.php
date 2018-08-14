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

//    private $circle1;
//    private $circle2;
    private $distance;
    public $countPoints;

    public function getCircle1($x, $y, $r)
    {

        $this->x1 = $x;
        $this->y1 = $y;
        $this->r1 = $r;

//        $this->circle1[] = $x;
//        $this->circle1[] = $y;
//        $this->circle1[] = $r;
//        return $this->circle1;
//        $circle1[] = $x;
//        $circle1[] = $y;
//        $circle1[] = $r;
//        return $circle1;
}

    public function getCircle2($x, $y, $r)
    {
        $this->x2 = $x;
        $this->y2 = $y;
        $this->r2 = $r;

//        $this->circle2[] = $x;
//        $this->circle2[] = $y;
//        $this->circle2[] = $r;
//        return $this->circle2;
//        $circle2[] = $x;
//        $circle2[] = $y;
//        $circle2[] = $r;
//        return $circle2;
    }

    public function countIntersections()
    {

        $this->distance = sqrt(pow($this->x1 - $this->x2, 2) + pow($this->y1 - $this->y2, 2));
        if ($this->distance > $this->r1 + $this->r2)
        {
            $this->countPoints = 0;
        }
        elseif ($this->distance == $this->r1 + $this->r2)
        {
            $this->countPoints = 1;
        }
        elseif ($this->distance < $this->r1 + $this->r2)
        {
            $this->countPoints = 2;
        }
        elseif ($this->x1 == $this->x2 && $this->y1 == $this->y2 && $this->r1 == $this->r2)
        {
            $this->countPoints = 'infinity';
        }
        return $this->countPoints;

//        $c1 = [];
//        $c2 = [];
//        $c1 = $this->getCircle1();
//        $c2 = $this->getCircle2();
    }
}