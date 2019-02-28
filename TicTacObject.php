<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tic Tac Game</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" media="screen">
</head>
<body>
<script src="assets/jquery-3.2.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<form method="post" action="#">
    <div class="form-group">
        <label for="exampleInputEmail1">Походить</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ход" name="x">
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ход" name="y">
<!--        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
    </div>
    <button type="submit" class="btn btn-primary" name="go">Submit</button>
</form>
</body>
</html>
<h5>Tic Tac one by one</h5>
<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 19.02.2019
 * Time: 14:17
 */
spl_autoload_register(function ($class)
{
    include $class.'.php';
});
$TicTac = new TicTac();
$TicTac->simpleTicTack(3);
$TicTac->getStep();
//$TicTac->getStepZeroPlayer();
/*do
{
    $TicTac->getStep();
}
while($TicTac->counter <= 9);*/

?>