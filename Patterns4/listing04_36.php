<?php


// Листинг 04.36

trait PriceUtilities
{
  function calculateTax(float $price): float
  {
    // Удачно ли такое проектное решение?
    return (($this->taxrate / 100) * $price);
  }

  // другие служебные методы
}

?>
