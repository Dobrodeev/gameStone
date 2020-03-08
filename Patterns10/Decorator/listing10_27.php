<?php

require_once('listing10_24.php');
require_once('listing10_23.php');
require_once('listing10_18.php');

// Листинг 10.27

$tile = new PollutionDecorator(new DiamondDecorator( new Plains() ));
print $tile->getWealthFactor(); // выводится значение 0

?>
