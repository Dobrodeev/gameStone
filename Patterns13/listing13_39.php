<?php

require_once('listing13_38.php');
require_once('listing13_37.php');

// Листинг 13.39

$idobj = new IdentityObject();
$idobj->field("name")
      ->eq("The Good Show")
      ->field("start")
      ->gt(time())
      ->lt(time() + (24 * 60 * 60));

print_r($idobj);

?>
