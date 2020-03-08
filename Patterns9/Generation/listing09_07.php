<?php

require_once('listing09_01.php');
require_once('listing09_05.php');
require_once('listing09_02.php');
require_once('listing09_06.php');


// Листинг 09.07

$boss = new NastyBoss();
$boss->addEmployee( new Minion(  "Игорь"    ) );
$boss->addEmployee( new CluedUp( "Владимир" ) );
$boss->addEmployee( new Minion(  "Мария"    ) );
$boss->projectFails();
$boss->projectFails();
$boss->projectFails();

?>