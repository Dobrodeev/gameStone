<?php

require_once('listing0B_09.php');

// Листинг Б.10

class SequenceParse extends CollectionParse
{
  public function trigger(Scanner $scanner): bool
  {
    if (empty($this->parsers)) {
      return false;
    }

    return $this->parsers[0]->trigger($scanner);
  }

  protected function doScan(Scanner $scanner): bool
  {
    $start_state = $scanner->getState();

    foreach ($this->parsers as $parser) {
      if (! ($parser->trigger($scanner)
             && $parser->scan($scanner))) {
         $scanner->setState($start_state);
         return false;
      }
    }
    return true;
  }
}

?>
