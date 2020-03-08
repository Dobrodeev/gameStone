<?php

// Листинг 11.57

  // Класс TileForces
  public function firepower(): int
  {
    $power = 0;

    foreach ($this->units as $unit) {
      if (! is_null($unit)) {
        $power += $unit->bombardStrength();
      }
    }
    return $power;
  }

?>
