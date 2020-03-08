<?php

require_once "listing03_36.php";


// Листинг 03.38

$product2 = new CdProduct ( 
                            "Классическая музыка. Лучшее",
                            "Антонио",
                            "Вивальди",
                            10.99,
                            0,
                            60.33
                           );

print "Исполнитель: {$product2->getProducer()}\n";

?>

