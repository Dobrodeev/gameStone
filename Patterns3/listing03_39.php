<?php


// Листинг 03.39

class ShopProduct
{
  public $title;
  public $producerMainName;
  public $producerFirstName;
  public $price;
  public $discount = 0;

function __construct(
      $title,
      $firstName,
      $mainName,
      $price
  ) {
      $this->title = $title;
      $this->producerFirstName = $firstName;
      $this->producerMainName = $mainName;
      $this->price = $price;
  }

  function getProducer()
  {
    return $this->producerFirstName . " "
         . $this->producerMainName;
  }

  function getSummaryLine()
  {
    $base = "{$this->title} ( {$this->producerMainName}, ";
    $base .= "{$this->producerFirstName} )";
    return $base;
  }

  public function setDiscount(int $num)
  {
    $this->discount = $num;
  }

  public function getPrice()
  {
     return ($this->price - $this->discount);
  }


}

?>
