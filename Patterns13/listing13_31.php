<?php

// Листинг 13.31

abstract class DomainObjectFactory
{
  abstract public function createObject(array $row):
           DomainObject;
}

?>
