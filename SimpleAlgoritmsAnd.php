<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
<script src="assets/jquery-3.2.1.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 23.01.2019
 * Time: 22:37
 */
spl_autoload_register(function ($class)
{
    include $class.'.php';
});
$object = new SimpleAlgoritms();
$object->pyramidaDown();
echo 'Выведем диагонали матрицы: <br>';
$object->diagonalMatrica(19);
echo 'Выведем числа по порядку: <br>';
echo $object->cvadrarickNumbers();
echo 'Вычисли факториал: <br>';
$n = 5;
echo $n.'!='.$object->factorial(5).'<br>';
//echo 'Вычислим рекурсивный факториал: <br>';
//$object->recFactorial(7);
$text2 = 'Создавать запросы с помощью низкоуровневого API не намного сложнее, чем с помощью прямых или вспомогательных методов. Разница состоит в том, что такой подход позволяет контролировать многие другие аспекты запроса и получать о выполняющемся запросе гораздо больше информации. Центральное место в низкоуровневом API занимает метод ajax(), простой пример использования которого приведен ниже (здесь используется исходный файл и файл mydata.json, описанные в предыдущей статье):';
$text = 'Обычно уведомления — это короткие информационные сообщения для пользователей о том';
$index = 29;
echo $object->perevorotString($text, $index);
$testArray = [3, 7, 15, 1, 292, 1, 1, 1, 2, 1, 3, 1, 14, 2, 1, 1, 2, 2, 2, 2, 1, 84, 2, 1, 1];
echo '<br>Max element of $testArray: <br>';
echo $object->maxElementOfArray($testArray);
echo '<br>';
$object->gameIn15();
$object->puzurSort($testArray);
?>
</body>
</html>
