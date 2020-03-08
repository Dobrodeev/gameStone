<?php

require_once('listing11_11.php');

// Листинг 11.12

foreach (["четыре", "4", "52"] as $val) {
  $input->setValue($val);
  print "$val: <br />\n";
  $statement->interpret($context);
  if ($context->lookup($statement)) {
    print "Правильный ответ!<br /><br />\n\n";
  } else {
    print "Вы ошиблись!<br /><br />\n\n";
  }
}

?>
