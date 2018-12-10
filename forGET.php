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
$cosinus = pow(-1, $n) * pow($x, 2*$n) / (recFactorial(2*$n));
echo 'cos('.$x.')='.$cosinus.'<br>';
echo ' при n='.$n.'<br>';