<?php

// Листинг 04.39

trait PriceUtilities
{
  function calculateTax(float $price): float
  {
    // Более удачное проектное решение, поскольку
    // известно, что метод getTaxRate() должен быть реализован
    return (($this->getTaxRate() / 100) * $price);
  }

  abstract function getTaxRate(): float;
  // другие служебные методы
}

?>
