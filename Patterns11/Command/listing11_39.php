<?php

// Листинг 11.39

abstract class Unit
{
  public $depth = 0;
  // ...
  public function accept(ArmyVisitor $visitor)
  {
    $refthis = new \ReflectionClass(get_class($this));
    $method = "visit".$refthis->getShortName();
    $visitor->$method($this);
  }

  protected function setDepth($depth)
  {
    $this->depth=$depth;
  }

  public function getDepth()
  {
    return $this->depth;
  }
}

?>
