<?php

require_once "listing04_58.php";

// Листинг 04.60

try {
  $conf = new Conf(__DIR__ . "/listing04_57a.xml");
  print "user: " . $conf->get('user') . "<br />\n";
  print "host: " . $conf->get('host') . "<br />\n";
  $conf->set("pass", "newpass1");
  $conf->write();
} catch (\Exception $e) {
  die($e->__toString());
}

?>
