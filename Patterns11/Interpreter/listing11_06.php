<?php

require_once('listing11_03.php');
require_once('listing11_05.php');

// Листинг 11.06

$context = new InterpreterContext();
$myvar = new VariableExpression('input', 'четыре');
$myvar->interpret($context);
print $context->lookup($myvar) . "<br />\n";
// выводится: четыре

$newvar = new VariableExpression('input');
$newvar->interpret($context);
print $context->lookup($newvar) . "<br />\n";
// выводится: четыре

$myvar->setValue("пять");
$myvar->interpret($context);
print $context->lookup($myvar) . "<br />\n";
// выводится: пять

print $context->lookup($newvar) . "<br />\n";
// выводится: пять

?>
