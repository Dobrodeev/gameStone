<?php

require_once('listing10_23.php');
require_once('listing10_18.php');

// Листинг 10.26

$tile = new DiamondDecorator( new Plains() );
print $tile->getWealthFactor(); // выводится значение 4

?>
