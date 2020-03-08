<?php

// Листинг 04.88

class Person
{
  function getName(): string
  {
    return "Иван";
  }

  function getAge(): int
  {
    return 44;
  }

  function __toString(): string
  {
      $desc  = $this->getName();
      $desc .= " (возраст " . $this->getAge() . " лет)";
    return $desc;
  }
}

$person = new Person();
print $person;


?>
