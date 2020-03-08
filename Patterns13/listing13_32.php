<?php

require_once('listing13_31.php');

// Листинг 13.32

class VenueObjectFactory extends DomainObjectFactory
{
  public function createObject(array $row): DomainObject
  {
    $obj = new Venue((int)$row['id'], $row['name']);
    return $obj;
  }
}

?>