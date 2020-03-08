<?php

// Листинг 11.60

  // Класс TileForces
  public function firepower(): int {
    $power = 0;

    foreach($this->units as $unit) {
      $power += $unit->bombardStrength();
    }

    return $power;
  }

?>
