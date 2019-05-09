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
<form action="#" method="post">
    <input type="text" name="data">
    <input type="submit">
</form>
<script src="assets/jquery-3.2.1.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 23.01.2019
 * Time: 22:37
 */
spl_autoload_register(function ($class)
{
    include $class.'.php';
});
$object = new SimpleAlgoritms();
/*$object->pyramidaDown();
echo 'Выведем диагонали матрицы: <br>';
$object->diagonalMatrica(19);
echo 'Выведем числа по порядку: <br>';
echo $object->cvadrarickNumbers();
echo 'Вычисли факториал: <br>';
$n = 5;
echo $n.'!='.$object->factorial(5).'<br>';
//echo 'Вычислим рекурсивный факториал: <br>';
//$object->recFactorial(7);
$text2 = 'Создавать запросы с помощью низкоуровневого API не намного сложнее, чем с помощью прямых или вспомогательных методов. Разница состоит в том, что такой подход позволяет контролировать многие другие аспекты запроса и получать о выполняющемся запросе гораздо больше информации. Центральное место в низкоуровневом API занимает метод ajax(), простой пример использования которого приведен ниже (здесь используется исходный файл и файл mydata.json, описанные в предыдущей статье):';
$text = 'Обычно уведомления — это короткие информационные сообщения для пользователей о том';
$index = 29;
echo $object->perevorotString($text, $index);
$testArray = [3, 7, 15, 1, 292, 1, 1, 1, 2, 1, 3, 1, 14, 2, 1, 1, 2, 2, 2, 2, 1, 84, 2, 1, 1];
echo '<br>Max element of $testArray: <br>';
echo $object->maxElementOfArray($testArray);
echo '<br>';
echo 'Минимальный элемент массива $arr: <br>';
echo $object->minElement($testArray).'<br>';
//$object->gameIn15();
$object->puzurSort($testArray);
shuffle($testArray);
echo 'Перемешали массив $testArray: <br>';
function writelineArray($testArray)
{
    foreach ($testArray as $value)
    {
        echo $value.' ';
    }
    echo '<br>';
}
writelineArray($testArray);
sort($testArray);
echo 'Снова отсортировали массив: <br>';
writelineArray($testArray);
echo '<br>';
$object->simpleMatrica(10);
$object->evenNumbers(13, 267, 38);
$object->evenNumbers4(19,12,90);
echo 'Tic Tack <br>';
$object->simpleTicTack(2);*/
$testArray = [3, 7, 15, 1, 292, 1, 1, 1, 2, 1, 3, 1, 14, 2, 1, 1, 2, 2, 2, 2, 1, 84, 2, 1, 1];
$fibonacciArray = [0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377, 610, 987, 1597, 2584, 4181, 6765, 10946, 17711,];
$catallanaArray = [1, 1, 2, 5, 14, 42, 132, 429, 1430, 4862, 16796, 58786, 208012, 742900, 2674440, 9694845, 35357670, 129644790, 477638700, 1767263190, 6564120420, 24466267020, 91482563640, 343059613650, 1289904147324, 4861946401452,];
$simpleArrayZero = [11, 101, 10111, 101111, 1011001, 1100101];
$simpleArrayPalindrom = [2, 3, 5, 7, 11, 101, 131, 151, 181, 191, 313, 353, 373, 383, 727, 757, 787, 797, 919, 929, 10301, 10501, 10601, 11311, 11411, 12421, 12721, 12821, 13331, 13831, 13931, 14341, 14741, 15451, 15551, 16061, 16361, 16561, 16661, 17471, 17971, 18181,];
$web=array('HTML','CSS','JavaScript','PHP','MySQL');
$people = array (
    "Иванов" => array ("рост" => 174, "вес"  => 68),
    "Петров" => array ("рост" => 181, "вес"  => 90),
    "Сидоров" => array ("рост" => 166, "вес"  => 73),
    'Mike Tayson'=> array('height'=>183, 'weight'=>91, 'размах рук'=>168, 'боев'=>100, 'побед'=>90, 'нокаутом'=>87, 'поражений'=>10, 'профессиональный дебют'=>1983, 'последний бой'=>2008),
);

foreach ($people as $person => $surname)  {
    echo  "<br>$person<br>";
    foreach ($surname as $parametr => $pp) {
        echo  "$parametr => $pp<br>";
    }
}
function writelineArray($testArray)
{
    foreach ($testArray as $value)
    {
        echo $value.' ';
    }
    echo '<br>';
}
//writelineArray($testArray);
$randomArray = [];
for ($i = 0; $i < 10; $i ++)
{
    $randomArray[$i] = mt_rand(0, 12);
}
//writelineArray($randomArray);
//$object->puzurSort($testArray);
/*
 * Задача : Пользователь вводит строку, это дата в формате: 240398 (ДДММГГ)
         Проверить введеные данные на корректность с помощью функции возвращающей true или false

Написать функцию возвращающий строку в формате 24.03.1998;
Написать функцию возвращающий строку в формате 24 march 1998;
Если год больше 30 то 19хх
Если год меньше 30, то 2000-е
Примеры:

140319 -> 14.03.2019
031276 -> 03.12.1976
670190 -> Incorrect date
202093 -> Incorrect date
*/
$someDate1 = 280299;
$someDate2 = 031276;
$someDate3 = 240419;
$someDate4 = 110119;
$dannie = $_POST['data'];
$someDate5 = $dannie;

//010801
echo 'data= '.$dannie.'<br>';
echo is_string($dannie);
$incorrectDate1 = 670190;
$incorrectDate2 = 670190;
// 1-31.1-12.00-99
/*const MIN_DAY = 1;
const MAX_DAY = 31;
const MAX_DAY28 = 28;
const MIN_MONTH = 1;
const MAX_MONTH = 12;
const MIN_YEAR = 0;
const MAX_YEAR = 99;

function validDay($value)
{
    if ($value >= MIN_DAY && $value <= MAX_DAY)
        return true;
}

function validDay30($value)
{
    if ($value >= MIN_DAY && $value < MAX_DAY)
        return true;
}

function validDay28($value)
{
    if ($value >= MIN_DAY && $value <= MAX_DAY28)
        return true;
}
function validMonth($value)
{
    if ($value >= MIN_MONTH && $value <= MAX_MONTH)
        return true;
}

function validYear($value)
{
    if ($value >= MIN_YEAR && $value <= MAX_YEAR)
        return true;
}*/

function validDate($day, $month)
{
    $array31 = [1, 3, 5, 7, 8, 10, 12];
    if (in_array($month, $array31) && $day > 0 && $day <= 31)
        return true;
    elseif ($month == 2 && $day > 0 && $day <= 28)
        return true;
    if ($month >= 4 && $month < 12 && $day > 0 && $day <= 30)
        return true;
    return false;
}

function writeMonth($month)
{
    switch ($month)
    {
        case 1 : $month = 'January';
        break;
        case 2 : $month = 'February';
            break;
        case 3 : $month = 'March';
            break;
        case 4 : $month = 'April';
            break;
        case 5 : $month = 'May';
            break;
        case 6 : $month = 'June';
            break;
        case 7 : $month = 'July';
            break;
        case 8 : $month = 'August';
            break;
        case 9 : $month = 'September';
            break;
        case 10 : $month = 'October';
            break;
        case 11 : $month = 'November';
            break;
        case 12 : $month = 'December';
            break;
        default : $month = null;
    }
    return $month;
}

function writeMonthArray($month)
{
    $arrayMonth = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
//    $resultMonth = $arrayMonth[$month - 1];
//    return $resultMonth;
    return $arrayMonth[$month -1];
}
function parseDate($value)
{
    /*$day = substr($value, 0,2);
    $month = substr($value, 2, 2);
    $year = substr($value, 4, 2);*/
    $day = round($value / 10000);
    $month = round($value / 100) % 100;
    $year = $value % 100;
    echo 'day='.$day.' month='.$month.' year='.$year.'<br>';
    /*if ($month % 2 != 0 && $month != 2)
    {
        if (validDay($day) && validMonth($month) && validYear($year))
        {
            if ($year >= 30)
            {
                echo $day.'.'.$month.'.19'.$year.'<br>';
            }
            elseif ($year < 30)
            {
                echo $day.'.'.$month.'.20'.$year.'<br>';
            }
        }
    }
    elseif ($month % 2 == 0)
    {
        if ($month == 2)
        {
            if (validDay28($day) && validMonth($month) && validYear($year))
            {
                if ($year >= 30)
                {
                    echo $day.'.'.$month.'.19'.$year.'<br>';
                }
                elseif ($year < 30)
                {
                    echo $day.'.'.$month.'.20'.$year.'<br>';
                }
            }
            else
                echo 'Incorrect date. <br>';
        }
        elseif ($month != 2)
        {
            if (validDay30($day) && validMonth($month) && validYear($year))
            {
                if ($year >= 30)
                {
                    printf('%02d.%02d.%d <br>',$day, $month, 1900 + $year);
                }
                elseif ($year < 30)
                {
                    printf('%02d.%02d.%d <br>',$day, $month, 2000 + $year);
                }
            }
        }*/
    if (validDate($day, $month))
    {
        /*if ($year >= 30)
            printf('%02d.%02d.%d <br>',$day, $month, 1900 + $year);
        else
            printf('%02d.%02d.%d <br>',$day, $month, 2000 + $year);*/
        printf('%02d.%02d.%d <br>',$day, $month, $year >= 30 ? 1900 + $year : 2000 + $year);
    }
        else
            echo 'Incorrect date. <br>';
}
echo '<hr>';
parseDate($someDate1);
parseDate($someDate2);
parseDate($someDate3);
parseDate($someDate4);
parseDate($someDate5);
parseDate($incorrectDate1);
parseDate($incorrectDate2);
/*$someDay = 100191;
$preobraz = ''.$someDay;
echo $preobraz;
echo is_string($preobraz);*/
$ourMonth = 4;
echo writeMonth($ourMonth);
echo writeMonthArray($ourMonth);
?>
</body>
</html>
