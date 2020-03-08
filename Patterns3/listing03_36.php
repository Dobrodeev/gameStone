<?php

require_once "listing03_35.php";


// Листинг 03.36

class CdProduct extends ShopProduct
{
  public function getPlayLength()
  {
    return $this->playLength;
  }

  public function getSummaryLine()
  {
    $base  = "{$this->title} ( {$this->producerMainName}, ";
    $base .= "{$this->producerFirstName} )";
    $base .= ": Время звучания - {$this->playLength}";
    return $base;
  }
}

?>
