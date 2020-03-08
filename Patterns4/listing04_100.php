<?php

require_once('listing04_99.php');
require_once('listing04_98.php');

// Листинг 04.100

$person = new Person();
  $person->output(
    new class implements PersonWriter {
      public function write(Person $person)
      {
        print $person->
              getName(). " " . $person->getAge() . "\n";
      }
    }
  );

?>
