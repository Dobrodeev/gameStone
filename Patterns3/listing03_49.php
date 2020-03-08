<?php

//require_once "listing03_48.php";

// Листинг 03.49

class CdProduct extends ShopProduct
{
  private $playLength;

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
