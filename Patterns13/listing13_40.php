<?php

require_once('listing13_38.php');
require_once('listing13_37.php');


// Листинг 13.40

class EventIdentityObject extends IdentityObject
{
  public function __construct(string $field = null)
  {
    parent::__construct(
        $field,
        ['name', 'id', 'start', 'duration', 'space']
    );
  }
}

?>
