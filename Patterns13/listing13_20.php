<?php

// Листинг 13.20

  // Класс Mapper

  public function find(int $id): DomainObject
  {
    $old = $this->getFromMap($id);

    if (! is_null($old)) {
      return $old;
    }

    // обратиться к базе данных
    return $object;
  }

  abstract protected function targetClass(): string;

  private function getFromMap($id)
  {
    return ObjectWatcher::exists(
           $this->targetClass(),
           $id
    );
  }

  private function addToMap(DomainObject $obj)
  {
    ObjectWatcher::add($obj);
  }

  public function createObject($raw)
  {
    $old = $this->getFromMap($raw['id']);

    if (! is_null($old)) {
      return $old;
    }

    $obj = $this->doCreateObject($raw);
    $this->addToMap($obj);

    return $obj;
  }

  public function insert(DomainObject $obj)
  {
    $this->doInsert($obj);
    $this->addToMap($obj);
  }


?>
