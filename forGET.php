<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="viber://add?number=38067111111"><img src="img/viber.jpg" style="width:45px;height:30px;"></a>
<img src="images/viber.jpg" style="width:90px;height:60px;">
<?php
/**
 * Created by PhpStorm.
 * User: dobrodeev
 * Date: 10.12.2018
 * Time: 10:07
 */
function recFactorial($n)
{
    if ($n < 0) return 0;
    if ($n == 0) return 1;
    return $n*recFactorial($n-1);
}

function factorial($n)
{
    if ($n < 0) return 0;
    if ($n == 0) return 1;
    $f = 1;

    for($i=1; $i<=$n; $i++)
    {
        $f = $f*$i;
    }

    return $f;
}
$n = $_GET['n'];
$x = $_GET['x'];
echo $n.'<br>';
echo $x.'<br>';
$i = 1;
$exponenta = 1;
while ($i <= $n)
{
    $exponenta += pow($x, 2*$i) / (recFactorial(2*$i));
    $i++;
}

echo 'exp('.$x.')='.$exponenta.'<br>';
echo ' при n='.$n.'<br>';
echo recFactorial(5).'<br>';
?>
</body>
</html>
