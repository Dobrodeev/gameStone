<?php

require_once('listing04_99.php');
require_once('listing04_98.php');


// Листинг 04.101

  $person = new Person();
  $person->output(
    new class("persondump.txt") implements PersonWriter {

      private $path;

      public function __construct(string $path)
      {
        $this->path = $path;
      }

      public function write(Person $person)
      {
        file_put_contents($this->path,
                          $person->getName(). " " .
                          $person->getAge() . "\n");
      }
    }
  );

?>