<?php

// Листинг 13.13

  // Класс Mapper

  public function findAll(): Collection
  {
    $this->selectAllStmt()->execute([]);

    return $this->getCollection(
      $this->selectAllStmt()->fetchAll()
    );
  }

abstract protected function selectAllStmt():
        \PDOStatement;
abstract protected function getCollection(array $raw):
         Collection;

?>
