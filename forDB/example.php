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
    <?php

    $number = 5;
    $str = 'Мир';
//    echo "Привет $str !";
//    echo 'Привет '.$str.' !';
//    echo 'Привет " '.'$str" !';
    echo "Привет '$str'";
    echo '<br>';
    echo 'Привет "'.$str.'" !';
    //
//    DELETE FROM News WHERE name = 'имя';
    $table = 'News';
    $name_param = 'name';
    $value_param = 'имя';
    echo '<br>';
    $query = "DELETE FROM $table WHERE $name_param = '$value_param'";
    echo $query."<br>";
    $query = 'DELETE FROM ' .$table. ' WHERE ' .$name_param. '="'. $value_param. '"';
    echo $query."<br>";
    // $db_conn->query("UPDATE shedule SET time='$_GET['time']', monday='$_GET['monday']', tuesday='$_GET['tuesday']', wednesday='$_GET['wednesday']', thursday='$_GET['thursday']', friday='$_GET['friday']', saturday='$_GET['saturday']', sunday='$_GET['sunday']' WHERE id='$_GET['id']'");
    $get_time = 'get time';
    $get_monday = 'get_monday';
    $id_get = 'this id';
    $db_conn = "UPDATE shedule SET time='$get_time', monday='$get_monday' WHERE id='$id_get'";
    echo $db_conn.'<br>';
    $name = 'John';
    $message = 'шоб ты здох ';
    $time = '19:30';
    $id = 67;
    // $table = '';
    echo $message.$name.'<br>';
    echo 'UPDATE shedule SET time="'.$time.'" WHERE id="'.$id.'"<br>';
    $name_description = 'name-description';
    $link_img = 'name-link';    
    $sth = "UPDATE News SET description='$name_description', link='$link_img' WHERE name='$name'";
    echo $sth.'<br>';
    // $db_conn->query('DELETE FROM shedule WHERE id="' . $_GET['id'] . '"');
    // $getting = '$_GET['id']';
    $getting = 'get something';
    $db_conn = 'DELETE FROM shedule WHERE id="' . $getting . '"';
    echo $db_conn.'<br>';


function clearMessage($message)
{
    $m = trim($message);
    $m = htmlspecialchars($message);
    $m = strip_tags($message);
    return $m;
}
/*
if ($_POST['go'])
{
    if ($_POST['message'])
    {
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        $message = clearMessage($_POST['message']);
        $surname = implode(',',$_POST['surname']);
        $email = implode(',', $_POST['email']);
        }
        }
*/
$array = array('имя', 'почта', 'телефон');
$comma_separated = implode(",", $array);
$second_variant = implode(' ', $array);
$third_variant = implode('',$array);
echo $comma_separated; // имя,почта,телефон

// Пустая строка при использовании пустого массива:
var_dump(implode('hello', array())); // string(0) ""
    echo '<br>';
echo 'Выведем через пробел: <br>';
echo '<pre>';
print_r($second_variant);
echo '</pre>';
echo 'Выведем без пробелов: <br>';
echo '<pre>';
print_r($third_variant);
echo '</pre>';
echo 'Обьединим элементы массива в строку: <br>';
$arrayForImplode =['lastname', 'email', 'phone'];
echo 'Было: <br>';
echo '<pre>';
print_r($arrayForImplode);
echo '</pre>';
$separated = implode(",", $arrayForImplode);
echo $separated; // lastname,email,phone
$names = array('Valera', 'Victor', 'Vane');
echo 'Name: '.$names.'<br>';
$yourName = implode(' ',$names);
echo 'It will be your name: '.$yourName.'<br>';

    $elements = array('a', 'b', 'c');

    echo "<ul><li>" . implode("</li><li>", $elements) . "</li></ul>";

    $id_nums = array(1,6,12,18,24);
    echo 'айдишники $id_name: <br>';
    echo '<pre>';
    print_r($id_nums);
    echo '</pre>';
    echo 'Выведем массив $id_nums: <br>';
    echo $id_nums.'<br>';
    $id_nums = implode(", ", $id_nums);
    echo 'Список $id_name получили из массива и сделали строкой: <br>';
    echo $id_nums.'<br>';
    $sqlquery = "Select name,email,phone from usertable where user_id IN ($id_nums)";

    // $sqlquery becomes "Select name,email,phone from usertable where user_id IN (1,6,12,18,24)"
    $test = ["one",2,3,"four",5.67];
    echo '<pre>';
    print_r($test);
    echo '</pre>';
    echo 'Сделаем все элементы массива строковыми: <br>';
    $test=implode(["one",2,3,"four",5.67]);
    echo $test;
    //outputs: "one23four5.67"
    ?>
</body>
</html>
