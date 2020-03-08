<?php

require_once "listing03_39.php";

// Листинг 03.41

class CdProduct extends ShopProduct
{
  public $playLength;

  public function __construct(
    string $title,
    string $firstName,
    string $mainName,
    float $price,
    int $playLength
) {
    parent::__construct(
      $title,
      $firstName,
      $mainName,
      $price
    );
    $this->playLength = $playLength;
  }

  public function getPlayLength()
  {
    return $this->playLength;
  }

  public function getSummaryLine()
  {
    $base = "{$this->title} ( {$this->producerMainName}, ";
    $base .= "{$this->producerFirstName} )";
    $base .= ": Время звучания - {$this->playLength}";
    return $base;
  }
}

?>
