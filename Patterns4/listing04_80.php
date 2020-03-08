<?php

require_once('listing04_79.php');

// Листинг 04.80

$person = new Person("Иван", 44);
$person->setId(343);
unset($person);
// выводится сообщение: "Сохранение персональных данных"

?>
