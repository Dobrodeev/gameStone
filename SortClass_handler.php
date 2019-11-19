<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sort array</title>
    <link rel="stylesheet" href="assets/reset.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
<script src="assets/jquery-3.2.1.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<?php
/**
 * Created by PhpStorm.
 * User: dobrodeev
 * Date: 10.08.2018
 * Time: 22:00
 */
spl_autoload_register(function ($className) {
    include $className . '.php';
});
//include 'sorts.php';
$objectSort = new SortClass();
//$objectSort->our_sort();
$countElements = 100;
echo '<span style="color: #005cbf">После сортировки ' . $countElements . ' элементов массива: </span><br>';
//$objectSort->print_arr();
$array = $objectSort->randomArray($countElements);
/*echo '<pre>';
print_r($array);
echo '</pre>';*/
$mtime = microtime(true);
$objectSort->bubbleSort($array);
printf("Время операции сортировки bubbletSort() <span style='color: #007bff'>%f милисекунд. </span>", microtime(true) - $mtime);
echo 'microtime(): ' . microtime(true) . '<br>';
//$objectSort->print_arr($array);
shuffle($array);
$mtime = microtime(true);
$objectSort->caseSort($array);
printf("Время операции сортировки caseSort() <span style='color: #007bff'>%f милисекунд. </span>", microtime(true) - $mtime);
echo 'microtime(): ' . microtime(true) . '<br>';
shuffle($array);
$mtime = microtime(true);
$objectSort->insertSort($array);
printf("Время операции сортировки insertSort() <span style='color: #007bff'>%f милисекунд. </span>", microtime(true) - $mtime);
echo 'microtime(): ' . microtime(true) . '<br>';
shuffle($array);
$mtime = microtime(true);
$objectSort->qsort($array, 0, count($array) - 1);
printf("Время операции сортировки quickSort() <span style='color: #007bff'>%f милисекунд. </span>", microtime(true) - $mtime);
echo 'microtime(): ' . microtime(true) . '<br>';
//$objectSort->print_arr($array);
//$objectSort->caseSort($array);
//$objectSort->insertSort($array);

//$objectSort->insertSort()

//$objectSort->print_arr($array);
?>
</body>
</html>
