<?php


require_once "listing04_12.php";
require_once "listing04_21.php";
require_once "listing04_20.php";

// Листинг 04.22

class ShopProduct implements IdentityObject
{
  use PriceUtilities, IdentityTrait;
}

?>
