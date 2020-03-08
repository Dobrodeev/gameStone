<?php

// Листинг 09.01

abstract class Employee
{
  protected $name;

  public function __construct(string $name)
  {
    $this->name = $name;
  }

  abstract public function fire();
}

?>