<?php

require_once('listing10_14.php');

// Листинг 10.16

class TroopCarrier extends CompositeUnit
{
  public function addUnit(Unit $unit)
  {
    if ($unit instanceof Cavalry) {
      throw new UnitException(
            "Нельзя перемещать лошадь на бронетранспортере.");
    }
    parent::addUnit($unit);
  }

  public function bombardStrength(): int
  {
    return 0;
  }
}

?>
