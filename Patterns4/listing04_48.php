<?php

// Листинг 04.48

abstract class DomainObject
{
  public static function create(): DomainObject
  {
    return new static();
  }
}

?>
