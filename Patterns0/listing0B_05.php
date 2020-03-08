<?php

require_once('listing0B_04.php');

// Листинг Б.05

class StringReader implements Reader
{
  private $in;
  private $pos;
  public function __construct($in)
  {
    $this->in = $in;
    $this->pos = 0;
  }

  public function getChar()
  {
    if ($this->pos >= strlen($this->in)) {
      return false;
    }
    $char = substr($this->in, $this->pos, 1);
    $this->pos++;
    return $char;
  }

  public function getPos(): int
  {
    return $this->pos;
  }

  public function pushBackChar()
  {
    $this->pos--;
  }

  public function string()
  {
    return $this->in;
  }
}

?>
