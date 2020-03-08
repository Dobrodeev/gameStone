<?php
// Листинг 05.44

require_once('listing03_36.php');
require_once('listing05_36.php');

$class = new ReflectionClass( 'CdProduct');

$method = $class->getMethod("__construct");
$params = $method->getParameters();
foreach ($params as $param) {
  print ClassInfo::argData($param) . "\n";
}

?>