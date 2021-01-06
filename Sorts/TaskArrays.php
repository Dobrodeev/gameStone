<?php
/**
 * Created by PhpStorm.
 * User: dobrodeev
 * Date: 13.12.2018
 * Time: 11:10
 */

class TaskArrays
{
    public function exercisesArrays()
    {
        /** max element */
        $simpleArray = [9, -13, 26, -3, 19, 29, 3, 27, -20, 18, -17];
        echo '<pre>';
        print_r($simpleArray);
        echo '</pre>';
//        echo 'max элемент массива: '.min($simpleArray).'<br>';
        $maximumElement = $simpleArray[0];
        for ($i = 1; $i < count($simpleArray); $i++) {
            if ($simpleArray[$i] > $maximumElement) {
                $maximumElement = $simpleArray[$i];
            }
        }
        echo 'max элемент массива: '.$maximumElement.'<br>';
        echo 'min элемент массива: '.min($simpleArray).'<br>';
        $Summa = 0;
        for ($i = 0; $i < count($simpleArray); $i++) {
            if ($simpleArray[$i] > 0) {
                $Summa += $simpleArray[$i];
            }
        }
        echo 'Сумма положительных элементов массива: '.$Summa.'<br>';
        $Summa = 0;
        for ($i = 0; $i < count($simpleArray); $i++) {
            if ($simpleArray[$i] < 0) {
                $Summa += $simpleArray[$i];
            }
        }
        echo 'Сумма отрицательных элементов массива: '.$Summa.'<br>';
        $Proizvedenie = 1;
        for ($i = 0; $i < sizeof($simpleArray); $i++) {
            if ($simpleArray[$i] > 0) {
                $Proizvedenie *= $simpleArray[$i];
            }
        }
        echo 'Произведение положительных элементов массива: '.$Proizvedenie.'<br>';
        $Proizvedenie = 1;
        for ($i = 0; $i < sizeof($simpleArray); $i++) {
            if ($simpleArray[$i] < 0) {
                $Proizvedenie *= $simpleArray[$i];
            }
        }
        echo 'Произведение отрицательных элементов массива: '.$Proizvedenie.'<br>';
        echo 'элементы массива, которые > 5:<br>';
        for ($i = 0; $i < sizeof($simpleArray); $i++) {
            if ($simpleArray[$i] > 5) {
                echo $simpleArray[$i].' ';
            }
        }
        echo '<br>';
        echo 'Вторая половина массива:<br>';
        for ($i = (int) (count($simpleArray) / 2); $i < sizeof($simpleArray); $i++) // (int) приведение к целому
        {
            echo $simpleArray[$i].' ';
        }
        echo '<br>Количество положительных элементов массива:<br>';
        $num = 0;
        for ($i = 0; $i < count($simpleArray); $i++) {
            if ($simpleArray[$i] > 0) {
                $num++;
            }
        }
        echo 'Всего '.$num.' положительных элементов<br>';
        $num = 0;
        for ($i = 0; $i < count($simpleArray); $i++) {
            if ($simpleArray[$i] < 0) {
                $num++;
            }
        }
        echo 'Всего '.$num.' отрицательных элементов<br>';
        $Proizvedenie = 1;
        for ($i = 0; $i < sizeof($simpleArray); $i++) {
            if ($simpleArray[$i] > 0) {
                $Proizvedenie *= $i;
            }
        }
        echo 'Произведение положительных номеров элементов массива: '.$Proizvedenie.'<br>';
        $Proizvedenie = 1;
        for ($i = 0; $i < sizeof($simpleArray); $i++) {
            if ($simpleArray[$i] < 0) {
                $Proizvedenie *= $i;
            }
        }
        echo 'Произведение отрицательных номеров элементов массива: '.$Proizvedenie.'<br>';
        $minElement = min($simpleArray);
        for ($i = 0; $i < count($simpleArray); $i++) {
            if ($simpleArray[$i] == $minElement) {
//                echo 'Номер min элемента: '.key($simpleArray).'<br>';
                echo 'Номер min элемента: '.$i.'<br>';
            }
        }
        /** обходимся без min() */
        $minimumElement = $simpleArray[0];
        $minimumIndex = 0;
        for ($i = 1; $i < count($simpleArray); $i++) {
            if ($simpleArray[$i] < $minimumElement) {
                $minimumElement = $simpleArray[$i];
                $minimumIndex = $i;
            }
        }
        $maxElement = max($simpleArray);
        for ($i = 0; $i < count($simpleArray); $i++) {
            if ($simpleArray[$i] == $maxElement) {
                echo 'Номер max элемента: '.$i.'<br>';
            }
        }
        /**
         * Средрее арифметическое элементов массива
         */
        $avgSumma = 0;
        for ($i = 0; $i < count($simpleArray); $i++) {
            $avgSumma += abs($simpleArray[$i]);
        }
        echo 'Среднее арифметическое: '.$avgSumma / count($simpleArray).'<br>';
        echo 'Элементы которые < 10<br>';
        for ($i = 0; $i < count($simpleArray); $i++) {
            if ($simpleArray[$i] < 10) {
                echo $simpleArray[$i].' ';
            }
        }
        echo '<br>Элементы которые 0< x <6<br>';
        for ($i = 0; $i < count($simpleArray); $i++) {
            if ($simpleArray[$i] > 0 && $simpleArray[$i] < 6) {
                echo $simpleArray[$i].' ';
            }
        }
    }
}