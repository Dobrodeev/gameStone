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
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 18.02.2019
 * Time: 20:49
 */
//spl_autoload_register(function ($class)
//{
//    include $class.'.php';
//});
include 'List.php';
$a = new Our_List();
$a->push_front(35);
$a->push_front(11);
$a->push_front(21);
$a->list_print();


/*
Написать метод для удаления первого элемента списка. (pop_front)

*Написать метод для добавления элемента в конец списка.

*Метод получения элемента по индексу: $a->get(index)


*/
?>