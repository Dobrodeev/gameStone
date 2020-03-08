<?php

// Листинг 13.08

abstract class GenCollection
{
  protected $mapper;
  protected $total = 0;
  protected $raw = [];

  private $result;
  private $pointer = 0;
  private $objects = [];

  public function __construct(array $raw = [],
                              Mapper $mapper = null)
  {
    $this->raw = $raw;
    $this->total = count($raw);

    if (count($raw) && is_null($mapper)) {
      throw new AppException(
                "Нужен объект типа Mapper для создания объектов");
    }

    $this->mapper = $mapper;
  }

  public function add(DomainObject $object)
  {
    $class = $this->targetClass();

    if (! ($object instanceof $class )) {
      throw new AppException(
                "Это коллекция {$class}");
    }

    $this->notifyAccess();
    $this->objects[$this->total] = $object;
    $this->total++;
  }

  public function getGenerator()
  {
    for ($x = 0; $x < $this->total; $x++) {
      yield $this->getRow($x);
    }
  }

  abstract public function targetClass(): string;

  protected function notifyAccess()
  {
    // намеренно оставлен пустым!
  }

  private function getRow($num)
  {
    $this->notifyAccess();

    if ($num >= $this->total || $num < 0) {
      return null;
    }

    if (isset($this->objects[$num])) {
      return $this->objects[$num];
    }

    if (isset($this->raw[$num])) {
      $this->objects[$num] = $this->mapper->createObject(
                             $this->raw[$num]);
      return $this->objects[$num];
    }
  }
}

?>
