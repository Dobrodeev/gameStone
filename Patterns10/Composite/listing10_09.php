<?php

//require_once('listing10_06.php');

// Листинг 10.09

class Archer extends Unit
{
  public function addUnit(Unit $unit)
  {
    throw new UnitException(get_class($this)
                            . " относится к листьям");
  }

  public function removeUnit(Unit $unit)
  {
    throw new UnitException(get_class($this)
                            . " относится к листьям");
  }

  public function bombardStrength(): int
  {
    return 4;
  }
}

?>
