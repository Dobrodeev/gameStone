<?php

require_once('listing10_22.php');

// Листинг 10.23

class DiamondDecorator extends TileDecorator
{
  public function getWealthFactor(): int
  {
    return $this->tile->getWealthFactor() + 2;
  }
}


?>
