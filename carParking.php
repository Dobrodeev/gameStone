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
<!--    <input class="form-control form-control-lg" type="text" placeholder="AA0000AM" name="car"><br>-->
    <button type="submit" class="btn btn-primary" name="go">Submit</button>
</form>
<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 26.03.2019
 * Time: 17:56
 */
/*7:00 * CAR1
-Прибытие
7:10 * CAR2
-Прибытие
7:20 * CAR3
-Прибытие
7:20 * CAR1
-Отбытие, общая парковка: 0:20
7:33 * CAR2
-Отбытие, всего парковок: 0:23*/
include 'DB.php';
if (isset($_POST['go']))
{
    $time = $_POST['time'];
    $hours =  1*$time;
    $minutes = substr($time, strpos($time,':') + 1,2);
    $car = substr($time, strpos($time, '*') + 1);
    /*echo 'hiurs: '.$hours.'<br>';
    echo 'min: '.$minutes.'<br>';
    echo 'car: '.$car.'<br>';
    echo 'car: '.$car.'<br>';*/
    $queryCheck = "SELECT * FROM parking WHERE car_name='$car'";
    $check = $pdo->query($queryCheck)->fetch();
//    print_r($check);
    if (!$check)
    {
        $on_parking = 'y';
        $queryCome = "INSERT INTO parking (car_time, on_parking, car_name) VALUES ('$time','$on_parking','$car')";
        $result = $pdo->query($queryCome);
        echo "<span style='color:blue;'>Машина приехала на стоянку</span>";
    }
    else
    {
        $on_parking = 'n';
        $queryOut = "UPDATE parking SET on_parking='$on_parking' WHERE car_name='$car'";
        $result = $pdo->query($queryOut);
        echo "<span style='color:blue;'>Машина уехала со стоянки</span>";
    }

}
?>