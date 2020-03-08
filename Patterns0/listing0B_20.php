<?php

require_once('listing0B_16.php');

// Листинг Б.20

class BooleanOrHandler implements Handler
{
  public function handleMatch(Parser $parser, Scanner $scanner)
  {
    $comp1 = $scanner->getContext()->popResult();
    $comp2 = $scanner->getContext()->popResult();
    $scanner->getContext()->pushResult(
              new BooleanOrExpression($comp1, $comp2));
    }
  }

?>
