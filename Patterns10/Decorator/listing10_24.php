<?php

require_once('listing10_22.php');

// Листинг 10.24

class PollutionDecorator extends TileDecorator
{
  public function getWealthFactor(): int
  {
    return $this->tile->getWealthFactor() - 4;
  }
}

?>
