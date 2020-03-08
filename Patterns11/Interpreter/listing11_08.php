<?php

require_once('listing11_07.php');

// Листинг 11.08

class EqualsExpression extends OperatorExpression
{
  protected function doInterpret(
    InterpreterContext $context,
    $result_l,
    $result_r
  ) {
    $context->replace($this, $result_l == $result_r);
  }
}

?>
