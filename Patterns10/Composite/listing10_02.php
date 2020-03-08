<?php

// Листинг 10.02

class Army
{
  private $units  = [];
  private $armies = [];

  public function addUnit(Unit $unit)
  {
    array_push($this->units, $unit);
  }

  public function addArmy(Army $army)
  {
     array_push($this->armies, $army);
  }

/*
  public function bombardStrength(): int
  {
    $ret = 0;
    foreach ($this->units as $unit) {
      $ret += $unit->bombardStrength();
    }
    return $ret;
  }
*/

   public function bombardStrength(): int
   {
      $ret = 0;
      foreach ($this->units as $unit) {
         $ret += $unit->bombardStrength();
      }

      foreach ($this->armies as $army) {
         $ret += $army->bombardStrength();
      }
      return $ret;
    }

}

?>
