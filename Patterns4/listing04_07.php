<?php

require_once "listing04_06.php";

// листинг 04.07

class TextProductWriter extends ShopProductWriter
{
  public function write()
  {
    $str = "ТОВАРЫ:\n";
    foreach ($this->products as $shopProduct) {
      $str .= $shopProduct->getSummaryLine()."\n";
    }
    print $str;
  }
}

?>
