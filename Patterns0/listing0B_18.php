<?php

require_once('listing0B_16.php');

// Листинг Б.18

class StringLiteralHandler implements Handler
{
  public function handleMatch(Parser $parser,
                              Scanner $scanner)
  {
    $value = $scanner->getContext()->popResult();
    $scanner->getContext()->pushResult(
              new LiteralExpression($value));
  }
}

?>
