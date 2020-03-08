<?php


// Листинг 03.34

class ShopProductWriter
{
  public function write($shopProduct)
  {
    if (
        ! ($shopProduct instanceof CdProduct  ) &&
        ! ($shopProduct instanceof BookProduct)
    ) {
        die("Передан неверный тип данных ");
    }
    $str = "{$shopProduct->title}: "
       . $shopProduct->getProducer()
       . " ({$shopProduct->price})<br />\n";
    print $str;
  }
}

?>
