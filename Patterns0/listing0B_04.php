<?php

// Листинг Б.04

interface Reader

{
  public function getChar();
  public function getPos(): int;
  public function pushBackChar();
}

?>
