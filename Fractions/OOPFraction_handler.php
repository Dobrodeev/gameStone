<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OOP</title>
    <!--    <link rel="stylesheet" href="assets/css/bootstrap.min.css">-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


</head>
<body>
<!--<script src="assets/jquery-3.2.1.js"></script>-->
<!--<script src="assets/js/bootstrap.min.js"></script>-->
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<?php

spl_autoload_register(function ($class) {
    include $class.'.php';
});
$fr1 = new Fraction(1, 2);
$fr2 = new Fraction(3, 5);

$fr1->addFraction($fr2);
$fr1->addFraction($fr2);
echo 'Сумма дробей: <br>';
echo $fr1->toString();
echo '<br>После упрощения: <br>';
$fr1->simplify();
echo $fr1->toString();
echo '<hr>';
$fr3 = new Fraction(16000, 800);
print_r($fr3);
//$fraction->simpleOutput($fr3);
echo $fr3->toString();
echo '<br>После упрощения: <br>';
$fr3->simplify();
echo $fr3->toString();

$fr4 = new BeautyFraction();
echo '<br>';
print_r($fr3);
echo '<br>';
$fr4->niceOutput($fr3);
echo '<br>';
$fraction = new BeautyFractionOutput();
$fraction->printFraction(1145, 19);
$fraction->simplification(743, 51);
$fr5 = new Fraction(434, 34);
print_r($fr5);
$fraction->simpleOutput($fr5);
?>
</body>
</html>
