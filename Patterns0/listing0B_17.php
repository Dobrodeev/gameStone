<?php

require_once('listing0B_16.php');

// Листинг Б.17

class VariableHandler implements Handler
{
  public function handleMatch(Parser $parser, Scanner $scanner)
  {
    $varname = $scanner->getContext()->popResult();
    $scanner->getContext()->pushResult(
              new VariableExpression($varname));
  }
}

?>
