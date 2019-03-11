<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Object</title>
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
$listObject = new Our_List();
$listObject->push_front(1991);
$listObject->push_front(1989);
$listObject->push_front(1972);
$listObject->push_front(1965);
$listObject->push_front('man');
$listObject->list_print();
printf('$strart = %d',$listObject->start);
printf('<br>Количество элементов в списке $count = %d', $listObject->count);
echo '<br>';
$listObject->get_element(2);
echo '<pre>';
print_r($listObject);
echo '</pre>';
/*$a->push_front(35);
$a->push_front(11);
$a->push_front(21);

printf("Осталось в списке %d объектов. <br>", $a->count);
$a->push_front(55);
$a->push_front(-100);
printf("Осталось в списке %d объектов. <br>", $a->count);

$a->pop_front();
while($a->count)
    printf("Мы взяли из списка: %d <br>", $a->pop_front());

printf("Осталось в списке %d объектов. <br>", $a->count);
$a->pop_front();*/
?>