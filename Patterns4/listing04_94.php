<?php
require_once('listing04_89.php');

// Листинг 04.94

class Totalizer
{
  public static function warnAmount()
  {
    return function (Product $product) {
      if ($product->price > 5) {
        print " покупается дорогой товар: {$product->price}\r\n<br />";
      }
    };
  }
}

// Листинг 04.95

$processor = new ProcessSale();
$processor->registerCallback(Totalizer::warnAmount());
// ...
$processor->sale(new Product("Туфли", 6));
print "\r\n<br />";
$processor->sale(new Product("Кофе", 6));

?>
