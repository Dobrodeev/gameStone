<?php

require_once('listing09_11.php');

// Листинг 09.12

$pref = Preferences::getInstance();
$pref->setProperty("name", "Иван");
unset($pref); // удалить ссылку
$pref2 = Preferences::getInstance();
print $pref2->getProperty("name") ."<br />\n";
    // покажем, что значение не утрачено


?>
