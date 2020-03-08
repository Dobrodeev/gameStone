<?php

// Листинг 03.22

class ShopProduct
{
  public $title;
  public $producerMainName;
  public $producerFirstName;
  public $price = 0;

  public function __construct(
      string $title,
      string $firstName,
      string $mainName,
      float $price
  ) {
      $this->title = $title;
      $this->producerFirstName = $firstName;
      $this->producerMainName = $mainName;
      $this->price = $price;
    }

    // ...
   public function getProducer()
   {
     return $this->producerFirstName . " "
          . $this->producerMainName;
   }

}


?>
