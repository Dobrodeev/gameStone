<?php

require_once('listing09_23.php');
require_once('listing09_21.php');

// Листинг 09.24

$mgr = new BloggsCommsManager();
print $mgr->getHeaderText();
print $mgr->getApptEncoder()->encode();
print $mgr->getFooterText();

?>
