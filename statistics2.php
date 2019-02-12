<?php
/***/
session_name('test');
session_start();

function start_init()
{
    $_SESSION['count'] = 0;
    $_SESSION['sum'] = 0;
    $_SESSION['min'] = INF; 
    $_SESSION['max'] = -1; 
}
//$_SESSION['count'] = @$_SESSION['count'] + 1;
//unset($_SESSION['count']);
//$_SESSION = array();
//session_destroy();
if (!isset($_SESSION['count']))
{
    start_init();
}

?>
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
    <input class="form-control form-control-lg" type="text" placeholder=".form-control-lg" name="number"><br>
    <button type="submit" class="btn btn-primary" name="go">Submit</button>
</form>

<?
if (isset($_POST['go']))
{

    $number = $_POST['number'];
    echo $number.'<br>';
    if ($number > 0)
    {
        $_SESSION['count']++;
        $_SESSION['sum'] += $number;
        
        // if ($_SESSION['count']==1)
        // {
        //     $_SESSION['min'] = $number; 
        //     $_SESSION['max'] = $number; 
        // }
        // else
        // {
        //     if ($_SESSION['min'] > $number) $_SESSION['min'] = $number;
        //     if ($_SESSION['max'] < $number) $_SESSION['max'] = $number;
        // }

        if ($_SESSION['min'] > $number) $_SESSION['min'] = $number;
        if ($_SESSION['max'] < $number) $_SESSION['max'] = $number;
              
    }
    elseif ($_SESSION['count']!=0 && $number == 0)
    {
        echo 'Кол-во всех чисел = '.$_SESSION['count'].'<br>';
        echo 'Сумма всех чисел = '.$_SESSION['sum'].'<br>';
        echo 'min = '.$_SESSION['min'].'<br>';
        echo 'max = '.$_SESSION['max'].'<br>';
        echo 'Среднее арифметическое чисел = '.$_SESSION['sum']/$_SESSION['count'].'<br>';
        start_init();
    }
    elseif ($number < 0)
    {
        echo ' Error. $number must be > 0 <br>';
    }
}

?>
</body>
</html>
