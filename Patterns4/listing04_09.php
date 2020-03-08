<?php

require_once "listing04_08.php";

// Листинг 04.09

class ShopProduct implements Chargeable
{
  // ...
  protected $price;
  // ...

  public function getPrice(): float
  {
    return $this->price;
  }
  // ...
}

?>
