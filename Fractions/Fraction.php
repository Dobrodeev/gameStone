<?php

class Fraction
{
//    protected $numerator;
//    protected $denominator;
    public $numerator;
    public $denominator;
    public $someone;

    public function addFraction (Fraction $fraction)
    {
        $this->numerator = $this->numerator * $fraction->denominator + $this->denominator * $fraction->numerator;
        $this->denominator = $this->denominator * $fraction->denominator;
    }

    public function __construct($num = 1, $denom = 1)
    {
        $this->numerator = $num;
        if ($denom == 0)
        {
            echo "Incorrect data";
            $this->denominator = 1;
        }
        else
        {
            $this->denominator = $denom;
        }
    }

    public function simplify()
    {
        $i = 10;
        while ($i > 1)
        {
            if (($this->numerator % $i == 0) && ($this->denominator % $i == 0))
            {
                $this->numerator /= $i;
                $this->denominator /= $i;
                $i = 11;
            }
            $i--;
        }
    }

    public function toString()
    {
        return $this->numerator . "/" . $this->denominator;
    }


}