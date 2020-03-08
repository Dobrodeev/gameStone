<?php

// Листинг 13.33

abstract class Collection implements \Iterator
{
  protected $dofact = null;
  protected $total = 0;
  protected $raw = [];

  private $result;
  private $pointer = 0;
  private $objects = [];

  // Класс Collection
  public function __construct(array $raw = [],
         DomainObjectFactory $dofact = null)
  {
    if (count($raw) && ! is_null($dofact)) {
      $this->raw = $raw;
      $this->total = count($raw);
    }

    $this->dofact = $dofact;
  }
  // ...

}

?>
