<?php

require_once "listing04_14.php";
require_once "listing04_39.php";

// Листинг 04.40

class UtilityService extends Service
{
  use PriceUtilities;

  public function getTaxRate(): float
  {
    return 17;
  }
}

?>
