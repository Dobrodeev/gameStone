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
        }
    }
}