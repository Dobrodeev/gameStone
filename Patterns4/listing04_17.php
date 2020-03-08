<?php

// Листинг 04.17

trait IdentityTrait
{
  public function generateId(): string
  {
    return uniqid();
  }
}

?>
