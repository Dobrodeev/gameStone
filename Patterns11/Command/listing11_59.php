<?php

// Листинг 11.59

public function getUnits(int $x, int $y): array
{
  $army = new Army();
  $army->addUnit(new Archer());

  $found = [
    new Cavalry(),
    new NullUnit(),
    new LaserCannonUnit(),
    $army
  ];
  return $found;
}

?>
