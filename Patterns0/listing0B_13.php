<?php

require_once('listing0B_07.php');

// В этом оконечном анализаторе проверяется совпадение
// со строковым литералом

// Листинг Б.13

class StringLiteralParse extends Parser
{
  public function trigger(Scanner $scanner): bool
  {
    return (
      $scanner->tokenType() == Scanner::APOS ||
      $scanner->tokenType() == Scanner::QUOTE
    );
  }

  protected function push(Scanner $scanner)
  {
    return;
  }

  protected function doScan(Scanner $scanner): bool
  {
    $quotechar = $scanner->tokenType();
    $ret = false;
    $string = "";

    while ($token = $scanner->nextToken()) {
      if ($token == $quotechar) {
        $ret = true;
        break;
      }

      $string .= $scanner->token();
    }

    if ($string && ! $this->discard) {
      $scanner->getContext()->pushResult($string);
    }

    return $ret;
  }
}

?>
