<?php

require_once "listing04_45.php";


// Листинг 04.47

class Document extends DomainObject
{
  public static function create(): Document
  {
    return new Document();
  }
}

?>
