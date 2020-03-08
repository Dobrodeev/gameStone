<?php

require_once('listing13_41.php');

// Листинг 13.42

class VenueUpdateFactory extends UpdateFactory
{
  public function newUpdate(DomainObject $obj): array
  {
    // Обратите внимание на то, что здесь была
    // исключена проверка типов
    $id = $obj->getId();
    $cond = null;
    $values['name'] = $obj->getName();

    if ($id > -1) {
      $cond['id'] = $id;
    }

    return $this->buildStatement("venue", $values, $cond);
  }
}

?>
