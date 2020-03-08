<?php

require_once "listing04_14.php";
require_once "listing04_26.php";
require_once "listing04_25.php";

// Листинг 04.27

class UtilityService extends Service
{
  use PriceUtilities, TaxTools;
}

?>
