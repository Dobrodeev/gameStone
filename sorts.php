<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" media="screen">
</head>
<body>
<script src="assets/jquery-3.2.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
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
function printArray($array)
{
    for ($i = 0; $i < count($array); $i ++) {
        echo $array[$i] . ' ';
    }
}
printArray($array);
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
echo '<br>После сортировки пузырьком: <br>';
printArray($array);
echo '<br>';
/* Сортировка выбором*/
shuffle($array);
echo 'После shuffle(): <br>';
printArray($array);
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
printArray($array);
shuffle($array);
echo '<br>Снова перемешали: <br>';
printArray($array);
/*Сортировка вставками*/
// 2 4 66 34 3 1 19
//
shuffle($array);
function vstavckaSort(&$var)
{
    for ($i = 1; $i < count($var); ++ $i)
    {
        $j = $i;
        while ($j > 0 &&  $var[$j - 1] > $var[$j])
        {
            $temp = $var[$j];
            $var[$j] = $var[$j - 1];
            $var[$j - 1] = $temp;
            -- $j;
        }
    }
}
echo '<br>Сортировка вставками: <br>';
vstavckaSort($array);
printArray($array);
shuffle($array);
echo '<br>Снова перемешали: <br>';
printArray($array);
function cmp_even($a, $b)
{
    if ($a % 2 == 0 && $b % 2 == 0)
    {
        return 0;
    }
    return ($a % 2 == 0 && $b % 2 != 0) ? -1 : 1;
}
uasort($array, 'cmp_even');
echo '<br>После usort() : <br>';
printArray($array);
shuffle($array);
echo '<br>Снова перемешали: <br>';
printArray($array);
/*Данн массив чисел. Отсортировать его таким образом, чтоб сначала шли все четные, затем уже все нечетные.
Порядок следования элементов среди четных/нечетных сохранялся чтоб как в исходном массиве*/
function even_add_odd(&$var)
{
    for ($i = 0; $i < count($var); $i++) {
        for ($j = count($var) - 1; $j > $i; $j--) {
            if ($var[$j] % 2 != 0) {
                $temp = $var[$j - 1];
                $var[$j - 1] = $var[$j];
                $var[$j] = $temp;
            }
        }
    }
}
function even_sort(&$var)
{
    $i = 0;
    $k = count($var);
    while ($i < $k)
    {
        if ($var[$i] % 2 != 0 && $var[$k] == 0)
            continue;
        if ($var[$i] == 0)
            $i ++;
        if ($var[$k] % 2 != 0)
            $k --;
    }
}
/*even_sort($array);
echo 'После even_sort() <br>';
printArray($array);*/
/*Оптимизировать алгоритм сортировки пузырьком*/
?>