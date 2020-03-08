<?php

require_once('listing08_06.php');
require_once('listing08_07.php');
require_once('listing08_09.php');
require_once('listing08_10.php');
require_once('listing08_12.php');


// Листинг 08.16

$lessons1 = new Seminar(4, new TimedCostStrategy());
$lessons2 = new Lecture(4, new FixedCostStrategy());
$mgr = new RegistrationMgr();
$mgr->register($lessons1);
$mgr->register($lessons2);

?>