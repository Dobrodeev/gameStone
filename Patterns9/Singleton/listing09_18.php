<?php
require_once('listing09_17.php');
require_once('listing09_15.php');
require_once('listing09_14.php');

// Листинг 09.18

$man = new CommsManager(CommsManager::MEGA);
print (get_class($man->getApptEncoder())) . "<br />\n";

$man = new CommsManager(CommsManager::BLOGGS);
print (get_class($man->getApptEncoder())) . "<br />\n";

?>
