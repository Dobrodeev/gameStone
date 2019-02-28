<?php
/*session_name('TicTac');
session_start();
$_SESSION['count'] = @$_SESSION['count'] + 1;
$_SESSION['stepX'] = array();
$_SESSION['stepY'] = array();*/
?>
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
<form method="post" action="<? echo $_SERVER['SCRIPT_NAME'];?>">
    <div class="form-group">
        <label for="exampleInputEmail1">Походить</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ход" name="x">
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ход" name="y">
        <!--        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
    </div>
    <button type="submit" class="btn btn-primary" name="doGo" value="go">Submit</button>
</form>
</body>
</html>
<h5>Tic Tac one by one</h5>
<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 28.02.2019
 * Time: 14:01
 */
/*$x = $_POST['x'];
$y = $_POST['y'];
echo 'Ход сделан: ('.$x.', '.$y.') <br>';*/
$array = array();
function saveStep($x)
{
    global $array;
    $array = array();
    $array[] = $x;
}
if ($_POST['doGo'])
{
    $x = $_POST['x'];
    $y = $_POST['y'];
    saveStep($x);
    echo 'Ход ('.$x.', '.$y.') <br>';
    /*$_SESSION['stepX'][] = $x;
    $_SESSION['stepY'][] = $y;
    echo 'Ход №'.$_SESSION['count'].' сделан: ('.$x.', '.$y.') <br>';*/
}
echo '<pre>';
print_r($array);
echo '</pre>';
?>