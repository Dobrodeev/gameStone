<?php
/**
 * Created by PhpStorm.
 * User: dobrodeev
 * Date: 01.08.2018
 * Time: 16:28
 */

class Calculator
{
    private $first;
    private $second;
    private $action;

    public function __construct($first, $second, $action)
    {
        $this->first = $first;
        $this->second = $second;
        $this->action = $action;
    }

    public function resultAction()
    {
        $variant = $this->action;
        echo '<h5>Result:<h5>';
        switch ($variant)
        {
            case '+':
                echo $this->first+$this->second;
                break;
            case '-':
                echo $this->first-$this->second;
                break;
            case '*':
                echo $this->first*$this->second;
                break;
            case '/':
                if ($this->second == 0)
                {
                    echo 'Division by zero. <br>';
                    break;
                }
                echo $this->first/$this->second;
                break;
            case '%':
                echo $this->first % $this->second;
                break;
            case 'x^2+y^2':
                echo $this->first * $this->first + $this->second * $this->second;
                break;
            case 'x^3+y^3':
                echo $this->first * $this->first * $this->first + $this->second * $this->second *$this->second;
                break;
        }
    }
}