<?php

require_once "listing04_14.php";
require_once "listing04_36.php";



// Листинг 04.37

class UtilityService extends Service
{
  public $taxrate = 17;

  use PriceUtilities;
}

?>
