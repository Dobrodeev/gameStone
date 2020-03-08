<?php
require_once('listing03_36.php');
require_once('listing05_36.php');



// листинг 05.37

$prodclass = new ReflectionClass('CdProduct');
print ClassInfo::getData($prodclass);


?>