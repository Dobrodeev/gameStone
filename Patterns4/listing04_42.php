<?php


// Листинг 04.42

trait PriceUtilities
{
  public function calculateTax(float $price): float
  {
    return (($this->getTaxRate() / 100) * $price);
  }

  public abstract function getTaxRate(): float;
  // другие служебные методы
}

?>
