<?php


// Листинг 04.10

class ShopProduct
{
  private $taxrate = 17;

  // ...

  public function calculateTax(float $price): float
  {
    return (($this->taxrate / 100) * $price);
  }
}

?>
