<?php

require_once('listing11_03.php');
require_once('listing11_02.php');

// Листинг 11.04

$context = new InterpreterContext();
$literal = new LiteralExpression('четыре');
$literal->interpret($context);
print $context->lookup($literal) . "<br />\n";

?>
