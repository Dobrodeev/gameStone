<?php

require_once('listing04_81.php');

// Листинг 04.82

$person = new Person("Иван", 44);
$person->setId(343);
$person2 = clone $person;
// $person2 :
//       name: Иван
//        age: 44
//         id: 0.

print_r($person2);

?>