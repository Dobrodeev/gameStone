<?php


// Листинг 04.33

trait PriceUtilities
{
  private static $taxrate = 17;

  public static function calculateTax(float $price): float
  {
    return ((self::$taxrate / 100) * $price);
  }

  // другие служебные методы
}

?>
