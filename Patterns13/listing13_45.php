<?php

require_once('listing13_44.php');

// Листинг 13.45

class VenueSelectionFactory extends SelectionFactory
{
  public function newSelection(IdentityObject $obj): array
  {
    $fields = implode(',', $obj->getObjectFields());
    $core = "SELECT $fields FROM venue";
    list($where, $values) = $this->buildWhere($obj);

    return [$core . " " . $where, $values];
  }
}


?>
