<?php

require_once('listing04_89.php');

// Листинг 04.96

class Totalizer2
{
  public static function warnAmount($amt)
 {
    $count = 0;
    return function ($product) use ($amt, &$count) {
      $count += $product->price;
      print " сумма: $count\r\n<br />";
      if ($count > $amt) {
        print "\r\n<br /> Продано товаров на сумму: {$count}\r\n<br />";
      }
    };
  }
}

// Листинг 04.97

$processor = new ProcessSale();
$processor->registerCallback(Totalizer2::warnAmount(8));

$processor->sale(new Product("Туфли", 6));
print "\r\n<br />";
$processor->sale(new Product("Кофе", 6));

?>
