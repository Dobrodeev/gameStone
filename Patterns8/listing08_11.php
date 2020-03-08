<?php

require_once('listing08_06.php');
require_once('listing08_07.php');
require_once('listing08_09.php');
require_once('listing08_10.php');

// Листинг 08.11

$lessons[] = new Seminar(4, new TimedCostStrategy());
$lessons[] = new Lecture(4, new FixedCostStrategy());

foreach ($lessons as $lesson) {
  print "Оплата за занятие {$lesson->cost()}. ";
  print " Тип оплаты: {$lesson->chargeType()}<br />\n";
}


?>
