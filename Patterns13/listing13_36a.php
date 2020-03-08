<?php

require_once('listing13_36.php');

// Листинг 13.36



$idobj = new EventIdentityObject();
$idobj->setMinimumStart(time());
$idobj->setName("A Fine Show");
$comps = [];
$name = $idobj->getName();

if (! is_null($name)) {
  $comps[] = "name = '{$name}'";
}

$minstart = $idobj->getMinimumStart();

if (! is_null($minstart)) {
  $comps[] = "start > {$minstart}";
}

$start = $idobj->getStart();

if (! is_null($start)) {
  $comps[] = "start = '{$start}'";
}

$clause = " WHERE " . implode(" and ", $comps);
print "{$clause}\n";

?>
