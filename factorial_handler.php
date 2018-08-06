<?php
/**
 * Created by PhpStorm.
 * User: dobrodeev
 * Date: 06.08.2018
 * Time: 16:43
 */
include 'RecursivClass.php';
$factorial = new RecursivClass();
echo 'n! = '.$factorial->factorialRecursic(3);