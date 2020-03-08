<?php

require_once "listing04_14.php";
require_once "listing04_26.php";
require_once "listing04_25.php";


// Листинг 04.31

class UtilityService extends Service
{
  use PriceUtilities, TaxTools {
    TaxTools::calculateTax insteadof PriceUtilities;
    PriceUtilities::calculateTax as basicTax;
  }
}

?>
