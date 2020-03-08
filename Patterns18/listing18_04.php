<?php

require_once('listing18_01.php');
require_once('listing18_03.php');

// Листинг 18.04

$store = new UserStore();
$store->addUser("bob williams", "bob@example.com", "12345");
$validator = new Validator($store);
if ($validator->validateUser("bob@example.com", "12345")) {
  print "Привет, друг!\n";
}

?>
