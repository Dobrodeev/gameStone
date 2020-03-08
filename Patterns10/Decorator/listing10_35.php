<?php

require_once('listing10_33.php');
require_once('listing10_34.php');
require_once('listing10_32.php');
require_once('listing10_30.php');
require_once('listing10_28.php');

// Листинг 10.35

$process = new AuthenticateRequest(new StructureRequest(
               new LogRequest(new MainProcess()
           )
));
$process->process(new RequestHelper());

?>