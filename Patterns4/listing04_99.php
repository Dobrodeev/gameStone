<?php

// Листинг 04.99

class Person
{
  public function output(PersonWriter $writer)
  {
    $writer->write($this);
  }

  public function getName(): string
  {
    return "Иван";
  }

  public function getAge(): int
  {
    return 44;
  }
}

?>
