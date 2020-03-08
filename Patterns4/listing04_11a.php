<?php


// Листинг 04.11a

abstract class Service
{
  // Базовый класс для службы
}

class UtilityService extends Service
{
  private $taxrate = 17;
  function calculateTax(float $price): float
  {
    return ( ( $this->taxrate/100 ) * $price );
  }
}

$u = new UtilityService();
print $u->calculateTax(100)."\n";


?>
