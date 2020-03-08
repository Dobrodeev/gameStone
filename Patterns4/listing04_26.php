<?php


// Листинг 04.26

trait PriceUtilities
{
  private $taxrate = 17;

  public function calculateTax(float $price): float
  {
    return (($this->taxrate / 100) * $price);
  }

  // другие служебные методы
}

?>
