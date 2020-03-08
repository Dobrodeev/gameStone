<?php

require_once('listing0B_03.php');
require_once('listing0B_05.php');
require_once('listing0B_01.php');

//Листинг Б.06

$context = new Context();
$user_in = "\$input equals '4' or \$input equals 'four'";
$reader = new StringReader( $user_in );
$scanner = new Scanner( $reader, $context ); 

while ( $scanner->nextToken() != Scanner::EOF ) {
   print $scanner->token();
   print "\t{$scanner->charNo()}";
   print "\t{$scanner->getTypeString()}\n";
}

?>
