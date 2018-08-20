<?php
/**
 * Created by PhpStorm.
 * User: dobrodeev
 * Date: 19.08.2018
 * Time: 15:37
 */

class ExampleClass
{
    public function exampleArrays()
    {
        /**
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
         */
//        $deputyArray = [];
        $deputyArray['Наша Украина'] = 'Укроп Украинский';
        $deputyArray['Чужа Украина'] = 'Козак Деснянский';
        $deputyArray['Малороссия'] = 'Отаман Белокопытов';
        $deputyArray['ДНР'] = 'Иван Мазепа';
        $deputyArray['ЛНР'] = 'Лев Ландау';
        $deputyArray['Крым'] = 'Евгений Лифшиц';
        $deputyArray['Буковель'] = 'Академик Тихонов';
        $deputyArray['Народный фронт'] = 'Професоср Самарский';
        $deputyArray['Народный фронт'] = 'Олег Ляшко';
        $deputyArray['БПП'] = 'Надежда Савченко';
        $deputyArray['БЮТ'] = 'Олесь Бузина';
        echo '<br>Массив депутатов<br>';
        foreach ($deputyArray as $party=>$deputy)
        {
            echo $party.'=>'.$deputy.'<br>';
        }
        asort($deputyArray);
        echo 'Посортировали массив <br>';
        foreach ($deputyArray as $party=>$deputy)
        {
            echo $party.' => '.$deputy.'<br>';
        }
        shuffle($deputyArray);
        echo 'Перемешали массив <br>';
        foreach ($deputyArray as $party=>$deputy)
        {
            echo $party.' => '.$deputy.'<br>';
        }
        echo 'Выберем трех победителей <br>';
        $rand_keys = array_rand($deputyArray, 3);
        echo 'первое место - '.$deputyArray[$rand_keys[0]].'<br>';
        echo 'второе место - '.$deputyArray[$rand_keys[1]].'<br>';
        echo 'третье место - '.$deputyArray[$rand_keys[2]].'<br>';
        $key1 = $rand_keys[0];
        $key2 = $rand_keys[1];
        $key3 = $rand_keys[2];
        for ($i = 0; $i < count($deputyArray); $i++)
        {
            for ($j = 0; $j < count($rand_keys); $j++)
            {
                if ($i == $rand_keys[$j]) unset($deputyArray[$i]);
            }
        }
        echo 'Депутаты, которые не заняли призовые места <br>';
        foreach ($deputyArray as $key=>$value)
        {
            echo $key.'=>'.$value.'<br>';
        }
        echo 'Многомерный массив <br>';
        $weightArray = array(
            'Саша Тернополь'=>array('рост'=>'181', 'вес'=>97, 'профессия'=>'охранник'),
            'Игорь Бодибилдер'=>array('рост'=>'182', 'вес'=>106, 'профессия'=>'тренер'),
            'Валентина Маринец'=>array('рост'=>'165', 'вес'=>46, 'размер груди'=>0, 'профессия'=>'секретарь суда'),
            'Диана Маринец'=>array('рост'=>'168', 'вес'=>48, 'размер груди'=>1, 'профессия'=>'врач терапевт'),
            'Виктория Бойко'=>array('рост'=>'166', 'вес'=>53, 'размер груди'=>3, 'профессия'=>'фотограф, тренер по классике'),
            'Марина Флейм'=>array('рост'=>'169', 'вес'=>51, 'размер груди'=>1, 'профессия'=>'тренер по пилону')
        );
        foreach ($weightArray as $key=>$someone)
        {
            echo '<ul>'.$key;
            foreach ($someone as $value=>$item)
            {
                echo '<li>'.$value.'=>'.$item.'</li>';
            }
            echo '</ul>';
        }
    }

    public function clearMessage($message)
    {
        $m = trim($message);
        $m = htmlspecialchars($message);
        $m = strip_tags($message);
        return $m;
    }
}