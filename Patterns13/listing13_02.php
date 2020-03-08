<?php

require_once('listing13_01.php');

// Листинг 13.02

class VenueMapper extends Mapper
{
  private $selectStmt;
  private $updateStmt;
  private $insertStmt;

  public function __construct()
  {
    parent::__construct();
    $this->selectStmt = $this->pdo->prepare(
       "SELECT * FROM venue WHERE id=?"
    );
    $this->updateStmt = $this->pdo->prepare(
           "UPDATE venue SET name=?, id=? WHERE id=?"
    );

    $this->insertStmt = $this->pdo->prepare(
           "INSERT INTO venue ( name ) VALUES( ? )"
    );
  }

  protected function targetClass(): string
  {
    return Venue::class;
  }

  public function getCollection(array $raw): Collection
  {
    return new VenueCollection($raw, $this);
  }

  protected function doCreateObject(array $raw):
                                    DomainObject
  {
    $obj = new Venue(
        (int)$raw['id'],
        $raw['name']
    );
    return $obj;
  }

  protected function doInsert(DomainObject $object)
  {
    $values = [$object->getName()];
    $this->insertStmt->execute($values);
    $id = $this->pdo->lastInsertId();
    $object->setId((int)$id);
  }

  public function update(DomainObject $object)
  {
    $values = [
        $object->getName(),
        $object->getId(),
        $object->getId()
    ];

    $this->updateStmt->execute($values);
  }

  public function selectStmt(): \PDOStatement
  {
    return $this->selectStmt;
  }
}

?>
