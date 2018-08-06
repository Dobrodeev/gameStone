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

}