<?php

// Листинг 03.33

class BookProduct
{
  public $numPages;
  public $title;
  public $producerMainName;
  public $producerFirstName;
  public $price;

  public function __construct(
      string $title,
      string $firstName,
      string $mainName,
      float $price,
      int $numPages
  ) {
      $this->title = $title;
      $this->producerFirstName = $firstName;
      $this->producerMainName = $mainName;
      $this->price = $price;
      $this->numPages = $numPages;
  }

  public function getNumberOfPages()
  {
    return $this->numPages;
  }

  public function getSummaryLine()
  {
    $base = "{$this->title} ( {$this->producerMainName}, ";
    $base .= "{$this->producerFirstName} )";
    $base .= ": {$this->numPages} стр.";
    return $base;
  }

  public function getProducer()
  {
    return $this->producerFirstName . " "
         . $this->producerMainName;
  }
}

?>
