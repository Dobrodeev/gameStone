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
<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 11.03.2019
 * Time: 20:31
 */
spl_autoload_register(function ($class)
{
    include $class.'.php';
});
$a = new PassengerCar();
$b = new PassengerCar('Green', 120);

$b->wheels[2]->setPressure(7);
echo $a."<br>";
$a->color = 'Red';
echo $a."<br>";
echo $b."<br>";

for ($i=0; $i < 4; ++$i) {
    echo $b->wheels[$i]->getPressure() . "<br>";
}
# ++$i, $i++ examples
function post(&$x)
{
    $temp = $x;
    $x += 1;
    return $temp;
}

function pref(&$x)
{
    return $x += 1;;
}


$x = 10;
echo post($x)."<br>";
echo $x."<br>";

$x = 10;
echo $x++."<br>";
echo $x."<br>";


$x = 10;
echo pref($x)."<br>";
echo $x."<br>";

$x = 10;
echo ++$x."<br>";
echo $x."<br>";
?>
</body>
</html>
