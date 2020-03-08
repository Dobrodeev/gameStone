<?php

require_once "listing03_39.php";

// Листинг 03.40

class BookProduct extends ShopProduct
{
  public $numPages;

  public function __construct(
    string $title,
    string $firstName,
    string $mainName,
    float $price,
    int $numPages
) {
    parent::__construct(
      $title,
      $firstName,
      $mainName,
      $price
    );
    $this->numPages = $numPages;
  }

  public function getNumberOfPages()
  {
    return $this->numPages;
  }

  public function getSummaryLine()
  {
    // $base = "{$this->title} ( $this->producerMainName, ";
    // $base .= "$this->producerFirstName )";
    $base = parent::getSummaryLine();
    $base .= ": {$this->numPages} стр.";
    return $base;
  }

  public function getPrice()
  {
    return $this->price;
  }


}

?>
