<?php
/**
 * Created by PhpStorm.
 * User: dobrodeev
 * Date: 06.08.2018
 * Time: 16:43
 */
require_once 'factorialForm.php';
require_once __DIR__ . '/../Sorts/RecursivClass.php';

if (isset($_POST['go'])) {
    $number = trim($_POST['number'] ?? '');

    // факториал больше 170! не помещается в float
    if (!ctype_digit($number) || (int)$number < 1 || (int)$number > 170) {
        echo '<p style="color: red">Введите целое число от 1 до 170</p>';
    } else {
        $n = (int)$number;
        $factorial = new RecursivClass();
        echo '<p>Через цикл: ' . $n . '! = ' . $factorial->factorialFor($n) . '</p>';
        echo '<p>Через рекурсию: ' . $n . '! = ' . $factorial->factorialRecursic($n) . '</p>';
    }
}
