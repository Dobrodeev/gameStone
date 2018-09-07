<?php
/**
 * Created by PhpStorm.
 * User: dobrodeev
 * Date: 06.08.2018
 * Time: 16:43
 */
//include 'RecursivClass.php';
require_once 'factorialForm.php';
if(isset($_POST['go']))
{
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
}
spl_autoload_register(function ($className)
{
    include $className.'.php';
});
$objCardGame = new ExampleClass();
$objCardGame->cardsGame();
;
/**
echo '<pre>';
print_r($_POST['number']);
echo '</pre>';

$factorial = new RecursivClass();
$x = 8;
echo $x.'! = '.$factorial->factorialRecursic($x).'<br>';
$factorial->factorialFor(7);
*/
?>
