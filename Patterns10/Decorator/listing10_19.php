<?php

require_once('listing10_18.php');

// Листинг 10.19

class DiamondPlains extends Plains
{
  public function getWealthFactor(): int
  {
    return parent::getWealthFactor() + 2;
  }
}

?>
