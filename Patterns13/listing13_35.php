<?php

// Листинг 13.35

class IdentityObject
{
  private $name = null;

  public function setName(string $name)
  {
    $this->name = $name;
  }

  public function getName(): string
  {
    return $this->name;
  }
}

?>
