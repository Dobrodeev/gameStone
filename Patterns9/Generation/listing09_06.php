<?php

// Листинг 09.06

// Новый класс типа Employee...
class CluedUp extends Employee
{
  public function fire()
  {
    print "{$this->name}: я вызову адвоката<br />\n";
  }
}


?>