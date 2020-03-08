<?php

// Листинг 10.01

abstract class Unit
{
  abstract public function bombardStrength(): int;
}

class Archer extends Unit
{
  public function bombardStrength(): int
  {
    return 4;
  }
}

class LaserCannonUnit extends Unit
{
  public function bombardStrength(): int
  {
    return 44;
  }
}

?>
