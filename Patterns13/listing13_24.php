<?php

// Листинг 13.24

  // Класс Mapper

  public function createObject($raw): DomainObject
  {
    $old = $this->getFromMap($raw['id']);

    if (! is_null($old)) {
      return $old;
    }

    $obj = $this->doCreateObject($raw);
    $this->addToMap($obj);

    return $obj;
  }


?>
