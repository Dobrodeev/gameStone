<?php

require_once('listing0B_07.php');

// В этом оконечном анализаторе проверяется
// совпадение со словом

// Листинг Б.14

class WordParse extends Parser
{
  public function __construct($word = null,
                              $name = null,
                              $options = [])
  {
    parent::__construct($name, $options);
    $this->word = $word;
  }

  public function trigger(Scanner $scanner): bool
  {
    if ($scanner->tokenType() != Scanner::WORD) {
      return false;
    }

    if (is_null($this->word)) {
      return true;
    }

    return ($this->word == $scanner->token());
  }

  protected function doScan(Scanner $scanner): bool
  {
    return ($this->trigger($scanner));
  }
}

?>
