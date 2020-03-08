<?php

require_once('listing09_39.php');
require_once('listing09_21.php');
require_once('listing09_38.php');

// Листинг 09.40

$assembler = new ObjectAssembler("objects.xml");
$apptmaker = $assembler->getComponent("AppointmentMaker2");
$out = $apptmaker->makeAppointment();
print $out;

?>
