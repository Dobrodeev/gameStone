<?php

require_once('listing03_36.php');
require_once('listing05_36.php');

// Листинг 05.40

$prodclass = new ReflectionClass('CdProduct');
$methods = $prodclass->getMethods();

foreach ($methods as $method) {
  print ClassInfo::methodData($method);
  print "<br />\n----<br />\n";
}

?>
