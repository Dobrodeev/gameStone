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
spl_autoload_register(function ($className)
{
    include $className.'.php';
});
$objectSort = new SortClass();
//$objectSort->print_arr();
$objectSort->our_sort();
echo '<span style="color: #005cbf">После сортировки: </span><br>';
$objectSort->print_arr();
?>
</body>
</html>
