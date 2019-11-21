<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!--    <link rel="stylesheet" href="assets/reset.css">-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
<script src="assets/jquery-3.2.1.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 17.01.2019
 * Time: 12:49
 */
spl_autoload_register(function ($class) {
    include $class . '.php';
});
$object = new PerevorotArray();
$object->perevorotTexta('В ролях: Chad White, Ember Stone, Erik Everhard, James Deen, Kasey Warner, Tegan Riley, Willow Hayes, Xander Corvus');
echo 'Example <br>';
//$exampleArray = [1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377, 610, 987, 1597];
$string = 'Описание: These girls can\'t wait to show off their hairy bushes! Tegan Riley, Kasey Warner, Willow Hayes, and Ember Stone are here, and they\'re about to get into some sexually hairy situations. Let these beautiful ladies show you why it\'s so sexy to have hair down there!';
$index = 13;
$save = $object->perevorotString($string, $index);
echo $save . '<br>';
?>
</body>
</html>
