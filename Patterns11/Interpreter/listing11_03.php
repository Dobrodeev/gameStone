<?php

// Листинг 11.03

class InterpreterContext
{
  private $expressionstore = [];

  public function replace(Expression $exp, $value)
  {
    $this->expressionstore[$exp->getKey()] = $value;
  }

  public function lookup(Expression $exp)
  {
    return $this->expressionstore[$exp->getKey()];
  }
}


?>
