<?php

require_once('listing08_08.php');

// Листинг 08.09

class TimedCostStrategy extends CostStrategy
{
  public function cost(Lesson $lesson): int
  {
    return ($lesson->getDuration() * 5);
  }

  public function chargeType(): string
  {
    return "Почасовая оплата";
  }
}

?>
