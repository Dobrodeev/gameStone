<?php

require_once('listing03_36.php');
require_once('listing05_38.php');


// Листинг 05.43

$class = new ReflectionClass('CdProduct');
$method = $class->getMethod('getSummaryLine');
print ReflectionUtil::getMethodSource($method);

?>