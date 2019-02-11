<?php
/**
session_name('test');
session_start();
$_SESSION['count'] = @$_SESSION['count'] + 1;
unset($_SESSION['count']);
$_SESSION = array();
session_destroy();
*/
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
<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 01.02.2019
 * Time: 20:24
 */
include 'DB.php';
echo $_POST['number'].'<br>';
$number = $_POST['number'];
if ($number > 0)
{
    $query = "INSERT INTO numbers_statistics (number) VALUE ('$number')";
    $stmt = $pdo->query($query);
}
elseif ($number < 0)
{
    echo ' Error. $number must be > 0 <br>';
}
else
{
    echo 'Выводим статистику: <br>';
    $queryStatistics = "SELECT * FROM numbers_statistics";
    $queryMIN = "SELECT MIN(number) FROM numbers_statistics";
    $queryMAX = "SELECT MAX(number) FROM numbers_statistics";
    $querySUM = "SELECT SUM(number) FROM numbers_statistics";
    $querySUMaverage = "SELECT SUM(number)/COUNT(number) FROM numbers_statistics";
    $stmt = $pdo->query($queryStatistics);
    while ($row = $stmt->fetch())
    {
        echo $row['id'].' -> '.$row['number'].'<br>';
    }
}
/**
if (isset($_POST['go']))
{

    echo $_POST['number'].'<br>';
    $number = $_POST['number'];
    function numberAnalysis($number)
    {
        $counter = 0;
        $Summa = 0;
        $min = $number;
        $max = $number;
        if ($number > 0)
        {
            $counter ++;
            $Summa += $number;

        }
        elseif ($number < 0)
        {
            echo 'Error. $number must be > 0. <br>';
        }
        else
        {
            echo 'Get statistics: <br>';
        }
    }
//    numberAnalysis($number);
}
 * */

?>
<!--<a href="#">Обновить страницу</a>-->
</body>
</html>
