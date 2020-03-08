<?php


// Листинг 04.21

trait IdentityTrait
{
  public function generateId(): string
  {
   return uniqid();
  }
}

?>
