<?php

require_once('listing08_02.php');
require_once('listing08_03.php');

// Листинг 08.04

$lecture = new Lecture(5, Lesson::FIXED);
print "{$lecture->cost()} ({$lecture->chargeType()})<br />\n";

$seminar = new Seminar(3, Lesson::TIMED);
print "{$seminar->cost()} ({$seminar->chargeType()})<br />\n";


?>