<?php

require_once('listing11_50.php');
require_once('listing11_48.php');
require_once('listing11_49.php');
require_once('listing11_47.php');

// Листинг 11.51

$controller = new Controller();
$context = $controller->getContext();

$context->addParam('action', 'login' );
$context->addParam('username', 'bob' );
$context->addParam('pass', 'tiddles' );
$controller->process();

print $context->getError();


?>
