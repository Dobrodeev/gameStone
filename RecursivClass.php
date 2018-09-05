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
}
