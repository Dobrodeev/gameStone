<?php

require_once('listing11_01.php');

// Листинг 11.05

class VariableExpression extends Expression
{
  private $name;
  private $val;

  public function __construct($name, $val = null)
  {
    $this->name = $name;
    $this->val = $val;
  }

  public function interpret(InterpreterContext $context)
  {
    if (! is_null($this->val)) {
      $context->replace($this, $this->val);
      $this->val = null;
    }
  }

  public function setValue($value)
  {
    $this->val = $value;
  }

  public function getKey()
  {
    return $this->name;
  }
}

?>