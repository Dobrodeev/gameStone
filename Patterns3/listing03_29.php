<?php




require_once "listing03_22.php";



// Листинг 03.29

$product1 = new ShopProduct( "Собачье сердце",
                             "Михаил", "Булгаков", 5.99 );

$product2 = new ShopProduct( "Классическая музыка. Лучшее",
                             "Антонио", "Вивальди", 10.99 );

print "Автор: "       .$product1->getProducer() . "<br />\n";
print "Исполнитель: " .$product2->getProducer() . "<br />\n";

?>
