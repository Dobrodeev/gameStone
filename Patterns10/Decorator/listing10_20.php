<?php

require_once('listing10_19.php');

// Листинг 10.20

class PollutedPlains extends Plains
{
  public function getWealthFactor(): int
  {
    return parent::getWealthFactor() - 4;
  }
}

?>
