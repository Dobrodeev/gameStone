<?php

// Листинг 04.79

class Person
{
  protected $name;
  private $age;
  private $id;

  public function __construct(string $name, int $age)
  {
    $this->name = $name;
    $this->age = $age;
  }

  public function setId(int $id)
  {
    $this->id = $id;
  }

  public function __destruct()
  {
    if (! empty($this->id)) {
      // сохранить данные из экземпляра класса Person
      print "Сохранение персональных данных \n";
    }
  }
}

?>
