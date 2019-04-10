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
<form action="#" method="post">
    <input class="form-control form-control-lg" type="text" placeholder="7:00" name="time"><br>
    <input class="form-control form-control-lg" type="text" placeholder="AA0000AM" name="car"><br>
    <button type="submit" class="btn btn-primary" name="go">Submit</button>
</form>
<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 26.03.2019
 * Time: 17:56
 */
include 'DB.php';
if (isset($_POST['go']))
{
    $time = $_POST['time'];
    $car = $_POST['car'];
    $hours =  1*$time;
    $minutes = substr($time, strpos($time,':') + 1);
    echo 'hiurs: '.$hours.'<br>';
    echo 'min: '.$minutes.'<br>';
    echo 'car: '.$car.'<br>';
    /*$queryCheck = "SELECT * FROM parking WHERE car_name='$car'";
    $check = $pdo->query($queryCheck)->fetch();
    print_r($check);
    if (!$check)
    {
        $queryCome = "INSERT INTO parking (car_name, car_time) VALUES ('$car', '$time')";
        $queryOut = "";
        $result = $pdo->query($queryCome);
        echo 'Машина '.$car.' прибыла на парковку в '.$time.'<br>';
    }
    else
        echo 'Машина уехала со стоянки в:';*/
}
?>