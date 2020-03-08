<?php

// Листинг Б.16

interface Handler
{
  public function handleMatch(
    Parser $parser,
    Scanner $scanner
  );
}

?>
