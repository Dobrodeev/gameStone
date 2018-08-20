<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<script src="assets/jquery-3.2.1.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<?php
/**
 * Created by PhpStorm.
 * User: dobrodeev
 * Date: 19.08.2018
 * Time: 15:39
 */
spl_autoload_register(function ($className)
{
    include $className.'.php';
});
$arrayObject = new ExampleClass();
echo $arrayObject->clearMessage('Это текст с    implode(x)  <p>и еще чем-то <? echo $arrayX;?></p>лишними пробелами.').'<br>';
$arrayObject->exampleArrays();
?>
</body>
</html>
