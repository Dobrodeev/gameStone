<?php

require_once('listing11_01.php');

// Листинг 11.02

class LiteralExpression extends Expression
{
  private $value;

  public function __construct($value)
  {
    $this->value = $value;
  }

  public function interpret(InterpreterContext $context)
  {
    $context->replace($this, $this->value);
  }
}

?>
