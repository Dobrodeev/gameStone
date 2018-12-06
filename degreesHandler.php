<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deegrees Celsius</title>
<!--    <link rel="stylesheet" href="assets/reset.css">-->
<!--    <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">-->
</head>
<body>
<!--<script src="assets/jquery-3.2.1.js"></script>-->
<!--<script src="assets/js/bootstrap.min.js"></script>-->
<?php
/**
 * Created by PhpStorm.
 * User: dobrodeev
 * Date: 06.12.2018
 * Time: 9:41
 */
spl_autoload_register(function ($class)
{
    include $class.'.php';
}
);
$degreesCel = new RecursivClass();
//$degreesCel->degreesExchange();
$degreesCel->degreesExchangeParametrs(13,19,2);
?>
</body>
</html>

