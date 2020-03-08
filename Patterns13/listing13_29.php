<?php

// Листинг 13.29

class DeferredEventCollection extends EventCollection
{
  private $stmt;
  private $valueArray;
  private $run = false;

  public function __construct(
      Mapper $mapper,
      \PDOStatement $stmt_handle,
      array $valueArray
  ) {
      parent::__construct([], $mapper);
      $this->stmt = $stmt_handle;
      $this->valueArray = $valueArray;
  }

  public function notifyAccess()
  {
    if (! $this->run) {
      $this->stmt->execute($this->valueArray);
      $this->raw = $this->stmt->fetchAll();
      $this->total = count($this->raw);
    }
    $this->run = true;
  }
}

?>