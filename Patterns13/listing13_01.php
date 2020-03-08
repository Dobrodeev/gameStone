<?php

// Листинг 13.01

abstract class Mapper
{
  protected $pdo;

  public function __construct()
  {
    $reg = Registry::instance();
    $this->pdo = $reg->getPdo();
  }

  public function find(int $id): DomainObject
  {
    $this->selectstmt()->execute([$id]);
    $row = $this->selectstmt()->fetch();
    $this->selectstmt()->closeCursor();

    if (! is_array($row)) {
      return null;
    }

    if (! isset($row['id'])) {
      return null;
    }

    $object = $this->createObject($row);
    return $object;
  }

  public function createObject(array $raw): DomainObject
  {
    $obj = $this->doCreateObject($raw);
    return $obj;
  }

  public function insert(DomainObject $obj)
  {
    $this->doInsert($obj);
  }

  abstract public function update(DomainObject $object);
  abstract protected function doCreateObject(array $raw):
           DomainObject;
  abstract protected function doInsert(
           DomainObject $object);
  abstract protected function selectStmt(): \PDOStatement;
  abstract protected function targetClass(): string;
}

?>
