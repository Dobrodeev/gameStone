<?php

require_once('listing04_84.php');
require_once('listing04_83.php');

// Листинг 04.85

$person = new Person("Иван", 44, new Account(200));
$person->setId(343);
$person2 = clone $person;

// Добавим $person немного денег
$person->account->balance += 10;

// Этот кредит отразится и на $person2
print $person2->account->balance;

?>