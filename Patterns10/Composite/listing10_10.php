<?php

// Листинг 10.10

abstract class Unit
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

  abstract public function bombardStrength(): int;
}

?>
