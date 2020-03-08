<?php

require_once('listing04_89.php');

// Листинг 04.92

class Mailer
{
  public function doMail(Product $product)
  {
    print " Отправляется ({$product->name})\r\n<br />";
  }
}

// Листинг 04.93

$processor = new ProcessSale();
$processor->registerCallback([new Mailer(), "doMail"]);

$processor->sale(new Product("Туфли", 6));
print "\r\n<br />";
$processor->sale(new Product("Кофе", 6));

?>