<?php
/**
 * Created by PhpStorm.
 * User: dobrodeev
 * Date: 06.08.2018
 * Time: 16:35
 */

class RecursivClass
{
    public function factorialRecursic($number)
    {
        if ($number == 1) return 1;
        else return ($number * $this->factorialRecursic($number - 1));
    }
    
    public function factorialFor($number)
    {    
        $factorial = 1;
        for ($i = 1; $i <= $number; $i++) 
        {
            $factorial *= $i;            
        }
        echo $number.'! = '.$factorial.'<br>';
    }
    /**
     * Degrees Celsius Degrees Fahrenheit
     * F = 9 / 5 x C + 32
     */
    public function degreesExchange()
    {
        $Fahrenheit = 0;
        $j = 0;
        echo '<b>Exchange Deegrees Celsius to Fahrengeit</b><br>';
        for ($i = 0; $i <= 30; $i ++)
        {
            $Fahrenheit = 9 / 5 * $j + 32;
            echo $j.' Celsius -> '.$Fahrenheit.' F<br>';
            $j += 10;
        }
    }
}
