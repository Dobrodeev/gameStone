<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 23.01.2019
 * Time: 22:29
 */

//

/**
 * Class SimpleAlgoritms
 */
class SimpleAlgoritms
{
    /**
     *
     */
    public function cvadrarickNumbers()
    {
        $array = [];
        echo '<table>';
        for ($i = 0; $i < 9; $i++) {
            echo '<tr>';
            for ($j = 0; $j < 9; $j++) {
                echo '<td>'.$array[$i][$j] = (9 * $i + $j + 1).'</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
        for ($i = 0; $i < 9; $i++) {
            for ($j = 0; $j < 9; $j++) {
                if ($j > $i) {
                    $temp = $array[$i][$j];
                    $array[$i][$j] = $array[$j][$i];
                    $array[$j][$i] = $temp;
                }
            }
        }
        echo '<hr>';
        echo '<table>';
        for ($i = 0; $i < 9; $i++) {
            echo '<tr>';
            for ($j = 0; $j < 9; $j++) {
                echo '<td>'.$array[$i][$j].'</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }
// $a[$i][$j]=$a[$j][$i]


    /** Pyramida
     * 2345
     * 2345
     * 345
     * 45
     * 5
     */
//
    /**
     *
     */
    public function pyramidaDown()
    {
        $a = 3;
        $b = 6;

        for ($j = 0; $j < $a; $j++) {
            for ($i = $a; $i <= $b; $i++) {
                echo $i;
            }
            echo '<br/>';
        }

        for ($j = $a + 1; $j <= $b; $j++) {
            for ($i = $a; $i <= $b; $i++) {
                if ($i < $j) {
                    echo '0';
                } else {
                    echo $i;
                }
            }

            echo '<br/>';
        }
    }

    /**
     * @param $N
     */
    public function diagonalMatrica($N)
    {
        // $N - размер квадрата
        $N = 15;
        for ($i = 0; $i < $N; $i++) {
            for ($j = 0; $j < $N; $j++) {
//        if (($i == $j || $j == $N - 1 -$i) && !($i == $j && $j == $N - 1 -$i))
                if ($i == $j ^ $j == $N - 1 - $i) {
                    echo 'X';
                } else {
                    echo '0';
                }
            }
            echo '<br>';
        }
    }

    /**
     *
     */
    public function gameIn15()
    {
        $array = array(
            array(1, 2, 3, 4),
            array(5, 6, 7, 8),
            array(9, 10, 11, 12),
            array(13, 14, 15, 16)
        );
        foreach ($array as $item) {
            foreach ($item as $value) {
                echo $value.' ';
            }
            echo '<br>';
        }
    }

    /**
     * @param $n
     * @return float|int
     */
    public function recFactorial($n)
    {
        if ($n < 0) {
            return 0;
        }
        if ($n == 0) {
            return 1;
        }
        return $n * recFactorial($n - 1);
    }

    /**
     * @param $n
     * @return float|int
     */
    public function factorial($n)
    {
        if ($n < 0) {
            return 0;
        }
        if ($n == 0) {
            return 1;
        }
        $f = 1;

        for ($i = 1; $i <= $n; $i++) {
            $f = $f * $i;
        }

        return $f;
    }

    /** S = 1 + x^2/2! + x^4/4! + ...+ x^n/n!
     * n<N, x<R
     * n & x задаются через адресную строку методом GET*/
    public function exponenta()
    {
        $n = $_GET['n'];
        $x = $_GET['x'];
        echo $n.'<br>';
        echo $x.'<br>';
        $i = 1;
        $exponenta = 1;
        while ($i <= $n) {
            $exponenta += pow($x, 2 * $i) / (recFactorial(2 * $i));
            $i++;
        }

        echo 'exp('.$x.')='.$exponenta.'<br>';
        echo ' при n='.$n.'<br>';
        //echo recFactorial(5).'<br>';
        /** Более оптимальный просчет суммы ряда */

        $n = 20;
        $x = 5.3;

        $sum = 1;
        $fact = 1;
        for ($i = 2; $i <= 2 * $n; $i += 2) {
            for ($j = ($i - 1); $j <= $i; $j++) {
                $fact *= $j;
            }
            $sum += pow($x, $i) / ($fact);
        }
        echo $sum;
    }

    /**
     * @param $text
     * @param $index
     * @return string
     */
    public function perevorotString($text, $index)
    {
//        echo $text.'<br>';
        //    $first = substr($text, 0, $index - 1);
        //    $temp = substr($text, $index - 1);
        //    $perevorot = strrev($temp);
        //    $result = $first.$perevorot;
        //    echo $result;
        return substr($text, 0, $index - 1).strrev(substr($text, $index - 1));
    }

    /**
     * @param  array  $arr
     * @return mixed
     */
    public function maxElementOfArray(array $arr)
    {
        $array = [];
        $array = $arr;
        $temp = $array[0];
        for ($i = 0; $i < count($array) - 1; $i++) {
            if ($array[$i + 1] > $temp) {
                $temp = $array[$i + 1];
            }
        }
        return $temp;
    }

    /**
     * @param  array  $arr
     * @return mixed
     */
    public function minElement(array $arr)
    {
        $min = $arr[0];
        for ($i = 1; $i < count($arr) - 1; $i++) {
            if ($arr[$i] < $min) {
                $min = $arr[$i];
            }
        }
        return $min;
    }

    /**
     * @param $arr
     */
    public function puzurSort($arr)
    {
        echo 'До сортировки: <br>';
        foreach ($arr as $value) {
            echo $value.' ';
        }
        for ($i = 0; $i < count($arr) - 1; $i++) {
            for ($j = count($arr) - 1; $j > $i; $j--) {
                if ($arr[$j - 1] > $arr[$j]) {
                    $temp = $arr[$j - 1];
                    $arr[$j - 1] = $arr[$j];
                    $arr[$j] = $temp;
                }
            }
        }
        echo '<br>';
        echo 'После сортировки: <br>';
        foreach ($arr as $value) {
            echo $value.' ';
        }
        echo '<br>';
    }

    /**
     * @param $n
     */
    public function simpleMatrica($n)
    {
        $n = 9;
        $array = array();
        echo '<table class="table">';
        for ($i = 0; $i < $n; $i++) {
            echo '<tr>';
            for ($j = 0; $j < $n; $j++) {
                echo '<td>'.$array[$i][$j] = (9 * $i + $j + 1).'</td>';
            }
            echo '</tr>';
        }
        echo '</table>';

        echo '<table class="table table-dark">';
        for ($i = 0; $i < $n; $i++) {
            echo '<tr>';
            for ($j = 0; $j < $n; $j++) {
                if ($j % 2 == 0) {
                    echo '<td>'.$array[$i][$j].'</td>';
                } else {
                    echo '<td>'.$array[$n - 1 - $i][$j].'</td>';
                }
            }
            echo '</tr>';
        }
        echo '</table>';
    }

    /**
     * На вход подаются 3 числа, метод определяет, будул ли 2 числа четными
     * @param $num1
     * @param $num2
     * @param $num3
     */
    public function evenNumbers($num1, $num2, $num3)
    {
        if (($num1 % 2 == 0 && $num2 % 2 == 0) or ($num2 % 2 == 0 && $num3 % 2 == 0) or ($num1 % 2 == 0 && $num3 % 2 == 0)) {
            echo $num1.', '.$num2.', '.$num3.' - 2 числа четные <br>';
        } else {
            echo $num1.', '.$num2.', '.$num3.' - нету двох четных чисел <br>';
        }
    }

    /**
     * @param $num1
     * @param $num2
     * @param $num3
     */
    public function evenNumbers2($num1, $num2, $num3)
    {
        if (($num1 % $num2 == 0) or ($num1 % $num3 == 0) or ($num3 % $num1 == 0) or ($num2 % $num1 == 0) or ($num2 % $num3 == 0) or ($num3 % $num2 == 0)) {
            echo $num1.', '.$num2.', '.$num3.' - 2 числа четные <br>';
        } else {
            echo $num1.', '.$num2.', '.$num3.' - нету двох четных чисел <br>';
        }
    }

    /**
     * @param $num1
     * @param $num2
     * @param $num3
     */
    public function evenNumbers3($num1, $num2, $num3)
    {
        if ((($num1 * $num2) % 2 == 0) and (($num1 * $num3) % 2 == 0) and (($num2 * $num3) % 2 == 0)) {
            echo $num1.', '.$num2.', '.$num3.' - 2 числа четные <br>';
        } else {
            echo $num1.', '.$num2.', '.$num3.' - нету двох четных чисел <br>';
        }
    }


    /**
     * @param $num1
     * @param $num2
     * @param $num3
     */
    public function evenNumbers4($num1, $num2, $num3)
    {
        $counter = 0;
        if ($num1 % 2 == 0) {
            $counter++;
        }
        if ($num2 % 2 == 0) {
            $counter++;
        }
        if ($num3 % 2 == 0) {
            $counter++;
        }
        if ($counter >= 2) {
            echo $num1.', '.$num2.', '.$num3.' - 2 числа четные <br>';
        } else {
            echo $num1.', '.$num2.', '.$num3.' - нету двох четных чисел <br>';
        }
    }

    /**
     * @param $num1
     * @param $num2
     * @param $num3
     */
    function evenNumbers5($num1, $num2, $num3)
    {

        if ($num1 % 2 + $num2 % 2 + $num3 % 2 <= 1) {
            echo $num1.', '.$num2.', '.$num3.' - 2 числа четные <br>';
        } else {
            echo $num1.', '.$num2.', '.$num3.' - нету двох четных чисел <br>';
        }
    }

    /**
     * @param $n
     */
    public function simpleTicTack($n)
    {
        $n = 3;
        $array = array();
        echo '<table class="table table-bordered table-dark">';
        for ($i = 0; $i < $n; $i++) {
            echo '<tr>';
            for ($j = 0; $j < $n; $j++) {
                echo '<td>'.$array[$i][$j] = '&nbsp'.'</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }
}