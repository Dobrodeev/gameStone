<?php

// Листинг 11.55

// класс TileForces
public function firepower(): int
{
  $power = 0;
  foreach($this->units as $unit) {
      if (! is_null($unit)) {
        $power += $unit->bombardStrength();
      }

    //$power += $unit->bombardStrength();
  }
  return $power;
}

?>
