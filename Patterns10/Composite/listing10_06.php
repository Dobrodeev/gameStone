<?php

// Листинг 10.06

abstract class Unit
{
abstract public function addUnit(Unit $unit);
abstract public function removeUnit(Unit $unit);
abstract public function bombardStrength(): int;
}

?>
