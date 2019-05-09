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

</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 06.05.2019
 * Time: 14:01
 */
$array = [1991, 1941, 1994, 1989, 1945, 1966, 1976, 1939, 1933, 1982];
echo 'До сортировки: <br>';
for ($i = 0; $i < count($array) - 1; $i ++) {
    echo $array[$i] . ' ';
}
    /* Пузырьковая сортировка*/
for ($i = 0; $i < count($array) - 2; $i ++) // count()-2 а не -1
{
    for ($j = count($array) - 1; $j > $i; $j --)
    {
        if ($array[$j] < $array[$j - 1])
        {
            $temp = $array[$j - 1];
            $array[$j - 1] = $array[$j];
            $array[$j] = $temp;
        }
    }
}
echo '<br>После: <br>';
for ($i = 0; $i < count($array) - 1; $i ++)
{
    echo $array[$i].' ';
}
echo '<br>';
/* Сортировка выбором*/
shuffle($array);
echo '<br>После shufle(): <br>';
for ($i = 0; $i < count($array) - 1; $i ++)
{
    echo $array[$i].' ';
}
for ($i = count($array) - 1; $i > 0 ; $i --)
{
    $maxIndex = 0;
    for ($j = 0; $j < $i; $j ++)
        {
            if ($array[$j] > $array[$maxIndex])
            {
                $maxIndex = $j;
            }
        }
    /*xchng()*/
    $temp = $array[$maxIndex];
    $array[$maxIndex] = $array[$i];
    $array[$i] = $temp;
}
echo '<br>После СВ: <br>';
for ($i = 0; $i < count($array) - 1; $i ++)
{
    echo $array[$i].' ';
}
?>