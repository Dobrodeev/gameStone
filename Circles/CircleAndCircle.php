<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Circle & Circle</title>
    <!--    <link rel="stylesheet" href="assets/reset.css">-->
    <!--    <link rel="stylesheet" href="">-->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
<script src="../assets/jquery-3.2.1.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<?php
//require_once 'CircleAndCircle_handler.php';
?>
<h4>Определение количества точек пересечения двух окружностей</h4>
<form action="CircleAndCircle_handler.php" method="post">
    <h5>Окружность 1</h5>
    <div class="form-group">
        <label for="Circle1">Координата центра по X</label>
        <input type="number" class="form-control" id="Circle1X" placeholder="X1" name="circle1[x1]">
    </div>
    <div class="form-group">
        <label for="Circle1">Координата центра по Y</label>
        <input type="number" class="form-control" id="Circle1Y" placeholder="Y1" name="circle1[y1]">
    </div>
    <div class="form-group">
        <label for="Circle1">Радиус, мм</label>
        <input type="number" class="form-control" id="Circle1R" placeholder="R1" name="circle1[r1]">
    </div>
    <h5>Окружность 2</h5>
    <div class="form-group">
        <label for="Circle1">Координата центра по X</label>
        <input type="text" class="form-control" id="Circle2X" placeholder="X2" name="circle2[x2]">
    </div>
    <div class="form-group">
        <label for="Circle1">Координата центра по Y</label>
        <input type="number" class="form-control" id="Circle2Y" placeholder="Y2" name="circle2[y2]">
    </div>
    <div class="form-group">
        <label for="Circle1">Радиус, мм</label>
        <input type="text" class="form-control" id="Circle2R" placeholder="R2" name="circle2[r2]">
    </div>

    <!--    <div class="form-group">-->
    <!--        <label for="exampleInputPassword1">Password</label>-->
    <!--        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">-->
    <!--    </div>-->
    <!--    <div class="form-group">-->
    <!--        <label for="exampleInputFile">File input</label>-->
    <!--        <input type="file" id="exampleInputFile">-->
    <!--        <p class="help-block">Example block-level help text here.</p>-->
    <!--    </div>-->
    <!--    <div class="checkbox">-->
    <!--        <label>-->
    <!--            <input type="checkbox"> Check me out-->
    <!--        </label>-->
    <!--    </div>-->
    <button type="submit" class="btn btn-default" name="go">Submit</button>
</form>
<!--<h5>--><?php //echo $result; ?><!--</h5>-->
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: dobrodeev
 * Date: 14.08.2018
 * Time: 11:50
 */
?>