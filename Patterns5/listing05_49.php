<?php

require_once('listing05_47.php');

// Листинг 05.49

class PersonModule implements Module
{
  public function setPerson(Person $person)
  {
    print "PersonModule::setPerson(): {$person->name}\n";
  }

  public function execute()
  {
    // сделать что-нибудь
  }
}

?>
