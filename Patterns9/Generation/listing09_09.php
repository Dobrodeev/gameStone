<?php

require_once('listing09_08.php');

// Листинг 09.09

// новый класс типа Employee...
class WellConnected extends Employee
{
  public function fire()
  {
    print "{$this->name}: я позвоню папе\n";
  }
}

?>
