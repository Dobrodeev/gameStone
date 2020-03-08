<?php

require_once('listing0B_15.php');
require_once('listing0B_03.php');
require_once('listing0B_01.php');
require_once('listing0B_05.php');
require_once('listing0B_10.php');
require_once('listing0B_12.php');
require_once('listing0B_08.php');
require_once('listing0B_13.php');
require_once('listing0B_18.php');
require_once('listing0B_14.php');
require_once('listing0B_17.php');
require_once('listing0B_11.php');
require_once('listing0B_19.php');
require_once('listing0B_20.php');
require_once('listing0B_21.php');
require_once('listing0B_02.php');
require_once('listing11_05.php');
require_once('listing11_02.php');
require_once('listing11_08.php');
require_once('listing11_03.php');

// Листинг Б.22

$input = 'five';
$statement = "( \$input equals 'five')";

$engine = new MarkParse($statement);
$result = $engine->evaluate($input);
print "Введено: $input интерпретируется: $statement<br />\n";

if ($result) {
  print "Истинно!<br />\n";
} else {
  print "Ложно!<br />\n";
}

?>
