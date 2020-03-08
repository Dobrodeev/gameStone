<?php

require_once('listing11_40.php');

// Листинг 11.35

class Army extends CompositeUnit
{
  public $units = [];

/*
  public function addUnit(Unit $unit)
  {
    if (in_array($unit, $this->units, true)) {
    return;
    }
    $this->units[] = $unit;
  }
*/
  public function removeUnit(Unit $unit)
  {
    $idx = array_search($unit, $this->units, true);
    if (is_int($idx)) {
      array_splice($this->units, $idx, 1, []);
    }
  }


  public function bombardStrength(): int
  {
    $strength = 0;
    foreach ($this->units as $unit) {
      $strength += $unit->bombardStrength();
    }
    return $strength;
  }
}


?>
