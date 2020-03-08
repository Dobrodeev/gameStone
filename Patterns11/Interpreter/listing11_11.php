<?php

require_once('listing11_03.php');
require_once('listing11_05.php');
require_once('listing11_09.php');
require_once('listing11_08.php');
require_once('listing11_02.php');

// Листинг 11.11

$context = new InterpreterContext();
$input = new VariableExpression('input');
$statement = new BooleanOrExpression(
                 new EqualsExpression($input,
                      new LiteralExpression('четыре')),
                      new EqualsExpression($input,
                          new LiteralExpression('4'))
                 );


?>
