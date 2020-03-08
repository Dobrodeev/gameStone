<?php

// Листинг 11.53

class TileForces
{
  private $units = [];
  private $x;
  private $y;

  function __construct(int $x, int $y, UnitAcquisition $acq)
  {
    $this->x = $x;
    $this->y = $x;
    $this->units = $acq->getUnits($this->x, $this->y);
  }
  // ...
  // класс TileForces
  public function firepower(): int
  {
    $power = 0;
    foreach($this->units as $unit) {
      if (! is_null($unit)) {
        $power += $unit->bombardStrength();
      }

     // $power += $unit->bombardStrength();
    }
    return $power;
  }


}

?>
