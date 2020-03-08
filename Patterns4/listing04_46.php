<?php

require_once "listing04_45.php";

// Листинг 04.46

class User extends DomainObject
{
  public static function create(): User
  {
    return new User();
  }
}

?>
