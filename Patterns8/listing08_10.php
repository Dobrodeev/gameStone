<?php

require_once('listing08_08.php');

// Листинг 08.10

class FixedCostStrategy extends CostStrategy
{
  public function cost(Lesson $lesson): int
  {
    return 30;
  }

  public function chargeType(): string
  {
    return "Фиксированная ставка";
  }
}

?>
