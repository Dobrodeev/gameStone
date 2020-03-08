<?php

require_once('listing09_05.php');
require_once('listing09_08.php');
require_once('listing09_06.php');
require_once('listing09_02.php');
require_once('listing09_09.php');

// Листинг 09.10

$boss = new NastyBoss();
$boss->addEmployee( Employee::recruit( "Игорь"    ) );
$boss->addEmployee( Employee::recruit( "Владимир" ) );
$boss->addEmployee( Employee::recruit( "Мария"    ) );

$boss->projectFails();
$boss->projectFails();
$boss->projectFails();


?>