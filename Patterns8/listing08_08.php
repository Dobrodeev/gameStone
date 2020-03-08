<?php

// Листинг 08.08

abstract class CostStrategy
{
  abstract public function cost(Lesson $lesson): int;
  abstract public function chargeType(): string;
}


?>
