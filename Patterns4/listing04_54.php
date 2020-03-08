<?php

require_once "listing04_52.php";


// Листинг 04.54

class Document extends DomainObject
{
  public static function getGroup(): string
  {
    return "document";
  }
}

?>
