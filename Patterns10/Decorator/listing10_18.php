<?php

require_once('listing10_17.php');

// Листинг 10.18

class Plains extends Tile
{
  private $wealthfactor = 2;

  public function getWealthFactor(): int
  {
    return $this->wealthfactor;
  }
}

?>
