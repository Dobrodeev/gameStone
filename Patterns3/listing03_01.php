<?php


class ShopProduct
{
   // Тело класса
   public $title             = "Стандартный товар";
   public $producerMainName  = "Фамилия автора";
   public $producerFirstName = "Имя автора";
   public $price             = 0;

}

$product1 = new ShopProduct();
$product2 = new ShopProduct();

//var_dump($product1);
//var_dump($product2);
print $product1->title;


?>
