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
        /**
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
        }*/
    }

    public function clearMessage($message)
    {
        $m = trim($message);
        $m = htmlspecialchars($message);
        $m = strip_tags($message);
        return $m;
    }

    public function cardsGame()
    {
        $cards = array(
            1=>array('A', 'heart'),
            2=>array('A', 'diamond'),
            3=>array('A', 'club'),
            4=>array('A', 'spade'),
            5=>array('K', 'heart'),
            6=>array('K', 'diamond'),
            7=>array('K', 'club'),
            8=>array('K', 'spade'),
            9=>array('Q', 'heart'),
            10=>array('Q', 'diamond'),
            11=>array('Q', 'club'),
            12=>array('Q', 'spade'),
            13=>array('J', 'heart'),
            14=>array('J', 'diamond'),
            15=>array('J', 'club'),
            16=>array('J', 'spade'),
            17=>array('10', 'heart'),
            18=>array('10', 'diamond'),
            19=>array('10', 'club'),
            20=>array('10', 'spade'),
            21=>array('9', 'heart'),
            22=>array('9', 'diamond'),
            23=>array('9', 'club'),
            24=>array('9', 'spade'),
            25=>array('8', 'heart'),
            26=>array('8', 'diamond'),
            27=>array('8', 'club'),
            28=>array('8', 'spade'),
            29=>array('7', 'heart'),
            30=>array('7', 'diamond'),
            31=>array('7', 'club'),
            32=>array('7', 'spade'),
            33=>array('6', 'heart'),
            34=>array('6', 'diamond'),
            35=>array('6', 'club'),
            36=>array('6', 'spade'),
            37=>array('5', 'heart'),
            38=>array('5', 'diamond'),
            39=>array('5', 'club'),
            40=>array('5', 'spade'),
            41=>array('4', 'heart'),
            42=>array('4', 'diamond'),
            43=>array('4', 'club'),
            44=>array('4', 'spade'),
            45=>array('3', 'heart'),
            46=>array('3', 'diamond'),
            47=>array('3', 'club'),
            48=>array('3', 'spade'),
            49=>array('2', 'heart'),
            50=>array('2', 'diamond'),
            51=>array('2', 'club'),
            52=>array('2', 'spade'),
            // еще можно два джокера добавить
        );
        /**
        foreach ($cards as $card=>$mast)
        {
            foreach ($mast as $key=>$value)
            {
//                echo $key.'=>'.$value.'<br>';
                echo $value.' ';
            }
            echo '<br>';
        }
        */
        $cardsSomeone = mt_rand(1, 52);
        echo '<h5>First hand<h5>';
        echo '<img src="img/'.$cardsSomeone.'.jpg" alt="first card" width = 30% height = 30%>';
        $cardsSomeone2 = abs(mt_rand(1, 52) - 13);
        echo '<img src="img/'.$cardsSomeone2.'.jpg" alt="second card" width = 30% height = 30%>';
        echo '<hr>';
        foreach ($cards as $card)
        {
            unset($cards[$cardsSomeone]);
            unset($cards[$cardsSomeone2]);
        }
        $cardsSomeone = mt_rand(1, 52);
        echo '<h5>Second hand<h5>';
        echo '<img src="img/'.$cardsSomeone.'.jpg" alt="first card" width = 30% height = 30%>';
        $cardsSomeone2 = abs(mt_rand(1, 52) - 13);
        echo '<img src="img/'.$cardsSomeone2.'.jpg" alt="second card" width = 30% height = 30%>';
        foreach ($cards as $card)
        {
            unset($cards[$cardsSomeone]);
            unset($cards[$cardsSomeone2]);
        }
        $flopCards = array_rand($cards, 3);
        echo '<h5>Флоп<h5>';
        foreach ($flopCards as $card)
        {
            echo '<img src="img/'.$card.'.jpg" alt="second card" width = 30% height = 30%>';
        }
        /**
        echo '<pre>';
        print_r($cards);
        echo '</pre>';
         */
        echo '<br>';
        echo 'Осталось карт в колоде: '.count($cards).'<br>';
    }
    /**
     * 16 задач на массивы из НАУ
     */
    public function exercisesArrays()
    {
        $simpleArray = [49, -13, 26, -3, 19, 29, 3, 27, -20, 18];
        echo '<pre>';
        print_r($simpleArray);
        echo '</pre>';
        echo 'min элемент массива: '.min($simpleArray).'<br>';
        $Summa = 0;
        for ($i = 0; $i < count($simpleArray); $i ++)
        {
            if ($simpleArray[$i] > 0)
            {
                $Summa += $simpleArray[$i];
            }
        }
        echo 'Сумма положительных элементов массива: '.$Summa.'<br>';
        $Summa = 0;
        for ($i = 0; $i < count($simpleArray); $i++)
        {
            if ($simpleArray[$i] < 0)
            {
                $Summa += $simpleArray[$i];
            }
        }
        echo 'Сумма отрицательных элементов массива: '.$Summa.'<br>';
        $Proizvedenie = 1;
        for ($i = 0; $i < sizeof($simpleArray); $i++)
        {
            if ($simpleArray[$i] > 0)
            {
                $Proizvedenie *= $simpleArray[$i];
            }
        }
        echo 'Произведение положительных элементов массива: '.$Proizvedenie.'<br>';
        $Proizvedenie = 1;
        for ($i = 0; $i < sizeof($simpleArray); $i++)
        {
            if ($simpleArray[$i] < 0)
            {
                $Proizvedenie *= $simpleArray[$i];
            }
        }
        echo 'Произведение отрицательных элементов массива: '.$Proizvedenie.'<br>';
        echo 'элементы массива, которые > 5:<br>';
        for ($i = 0; $i < sizeof($simpleArray); $i++)
        {
            if ($simpleArray[$i] > 5)
            {
                echo $simpleArray[$i].' ';
            }
        }
        echo '<br>';
        echo 'Вторая половина массива:<br>';
        for ($i = count($simpleArray)/2; $i < sizeof($simpleArray); $i++)
        {
                echo $simpleArray[$i].' ';
        }
        echo '<br>Количество положительных элементов массива:<br>';
        $num = 0;
        for ($i = 0; $i < count($simpleArray); $i++)
        {
            if ($simpleArray[$i] > 0)
            {
                $num++;
            }
        }
        echo 'Всего '.$num.' положительных элементов<br>';
        $num = 0;
        for ($i = 0; $i < count($simpleArray); $i++)
        {
            if ($simpleArray[$i] < 0)
            {
                $num++;
            }
        }
        echo 'Всего '.$num.' отрицательных элементов<br>';
        $Proizvedenie = 1;
        for ($i = 0; $i < sizeof($simpleArray); $i++)
        {
            if ($simpleArray[$i] > 0)
            {
                $Proizvedenie *= $i;
            }
        }
        echo 'Произведение положительных номеров элементов массива: '.$Proizvedenie.'<br>';
        $Proizvedenie = 1;
        for ($i = 0; $i < sizeof($simpleArray); $i++)
        {
            if ($simpleArray[$i] < 0)
            {
                $Proizvedenie *= $i;
            }
        }
        echo 'Произведение отрицательных номеров элементов массива: '.$Proizvedenie.'<br>';
        $minElement = min($simpleArray);
        for ($i = 0; $i < count($simpleArray); $i++)
        {
            if ($simpleArray[$i] == $minElement)
            {
//                echo 'Номер min элемента: '.key($simpleArray).'<br>';
                echo 'Номер min элемента: '.$i.'<br>';
            }
        }
        $maxElement = max($simpleArray);
        for ($i = 0; $i < count($simpleArray); $i++)
        {
            if ($simpleArray[$i] == $maxElement)
            {
                echo 'Номер max элемента: '.$i.'<br>';
            }
        }
        /**
         * Средрее арифметическое элементов массива
         */
        $avgSumma = 0;
        for ($i = 0; $i < count($simpleArray); $i++)
        {
            $avgSumma += abs($simpleArray[$i]);
        }
        echo 'Среднее арифметическое: '.$avgSumma/count($simpleArray).'<br>';
        echo 'Элементы которые < 10<br>';
        for ($i = 0; $i < count($simpleArray); $i++)
        {
            if ($simpleArray[$i] < 10)
            {
                echo $simpleArray[$i].' ';
            }
        }
        echo '<br>Элементы которые 0< x <6<br>';
        for ($i = 0; $i < count($simpleArray); $i++)
        {
            if ($simpleArray[$i] > 0 && $simpleArray[$i] < 6)
            {
                echo $simpleArray[$i].' ';
            }
        }
    }
    /** Примеры функций для работы с массивами */
    public function someFunctionsArrays()
    {
        /** @var Fibonacci array $exampleArray */
        $exampleArray = [1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377, 610, 987, 1597];
        $warDates = [1646, 1877, 1914, 1939, 1979, 2014];
        $simpleArray = [49, -13, 26, -3, 19, 29, 3, 27, -20, 18];
        echo '<pre>';
        print_r($simpleArray);
        echo '</pre>';
        echo 'Индексы элементы массива которые > 6: <br>';
        while ($someone = current($simpleArray)) {
            if ($someone > 6) {
                echo key($simpleArray).'<br />';
            }
            next($simpleArray);
        }
        $simpleArray[] = 56;
        $simpleArray[] = - 39;
        $simpleArray[] = - 43;
        echo '<pre>';
        print_r($simpleArray);
        echo '</pre>';
        $degreesArray = range(0,100, 10);
        foreach ($degreesArray as $value)
        {
            echo $value.' С - '. (9 / 5 * $value + 32).' F<br>';
        }
    }
    /** Случайный елемент массива */
    function generatorRandomArrays() //подходит только для индексных массивов, индексы которых начинаются с 0
    {
        $j = 0;
        for ($i = 0; $i < 10; $i++)
        {
            $arr[$i] = $j++;
            echo $arr[$i].' ';
        }
        //получаем случайный индекс массива
        $index = mt_rand(0, count($arr)-1);
        echo ' <br>Случайный елемент массива $arr: '.$arr[$index].'<br>';
    }
}