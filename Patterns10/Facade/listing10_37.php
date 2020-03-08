<?php

require_once('listing10_36.php');

// Листинг 10.37

$lines = getProductFileLines(__DIR__ . '/test2.txt');
$objects = [];
foreach ($lines as $line) {
  $id = getIDFromLine($line);
  $name = getNameFromLine($line);
  $objects[$id] = getProductObjectFromID($id, $name);
}

print_r($objects);

?>
