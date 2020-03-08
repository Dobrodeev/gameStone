<?php

require_once "listing03_35.php";

// Листинг 03.37

class BookProduct extends ShopProduct
{
  public function getNumberOfPages()
  {
    return $this->numPages;
  }

  public function getSummaryLine()
  {
    $base  = "{$this->title} ( {$this->producerMainName}, ";
    $base .= "{$this->producerFirstName} )";
    $base .= ": {$this->numPages} стр.";
    return $base;
  }
}

?>
