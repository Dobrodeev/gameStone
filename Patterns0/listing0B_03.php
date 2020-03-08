<?php

// Листинг Б.03

class Context
{
  public $resultstack = [];

  public function pushResult($mixed)
  {
    array_push($this->resultstack, $mixed);
  }

  public function popResult()
  {
    return array_pop($this->resultstack);
  }

  public function resultCount(): int
  {
    return count($this->resultstack);
  }

  public function peekResult()
  {
    if (empty($this->resultstack)) {
      throw new Exception("Результирующий стек пуст!");
    }
    return $this->resultstack[count($this->resultstack) -1];
  }
}

?>
