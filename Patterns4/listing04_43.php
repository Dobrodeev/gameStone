<?php

require_once "listing04_14.php";
require_once "listing04_42.php";

// Листинг 04.43

class UtilityService extends Service
{
  use PriceUtilities {
    PriceUtilities::calculateTax as private;
  }

  private $price;

  public function __construct(float $price)
  {
    $this->price = $price;
  }

  public function getTaxRate(): float
  {
    return 17;
  }

  public function getFinalPrice(): float
  {
    return ($this->price + $this->calculateTax($this->price));
  }
}

?>
