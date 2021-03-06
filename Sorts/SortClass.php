<?php
/**
 * Created by PhpStorm.
 * User: dobrodeev
 * Date: 10.08.2018
 * Time: 16:27
 */

/**
 * В файле sort.php (в приложении) находится массив, его нужно отсортировать по такому алгоритму:
 *
 * - по возрастанию в алфавитном порядке по значению[0];
 * - если значения[0] одинаковы, то по возрастанию по сумме значения[1] и значения[2].
 * Например, если исходный массив такой:
 * g, 6, 3
 * f, 8, 6
 * a, 5, 3
 * f, 2, 5
 *
 * то должен получиться такой массив:
 * a, 5, 3
 * f, 2, 5
 * f, 8, 6
 * g, 6, 3
 */
//

/**
 * Class SortClass
 */
class SortClass
{
    /**
     * @var array
     */
    private $data = array(
        array('x', '67', '16'),
        array('w', '98', '93'),
        array('g', '1', '71'),
        array('p', '21', '3'),
        array('q', '88', '35'),
        array('b', '76', '61'),
        array('w', '83', '25'),
        array('u', '19', '94'),
        array('t', '98', '90'),
        array('w', '6', '79'),
        array('e', '45', '66'),
        array('r', '16', '14'),
        array('s', '55', '94'),
        array('o', '47', '30'),
        array('p', '6', '52'),
        array('e', '5', '59'),
        array('k', '36', '22'),
        array('g', '54', '8'),
        array('h', '38', '98'),
        array('n', '75', '29'),
        array('x', '12', '3'),
        array('b', '3', '62'),
        array('r', '61', '2'),
        array('q', '81', '79'),
        array('g', '39', '6'),
        array('z', '99', '74'),
        array('b', '32', '88'),
        array('s', '50', '1'),
        array('q', '26', '71'),
        array('u', '40', '69'),
        array('a', '70', '93'),
        array('k', '95', '42'),
        array('b', '88', '31'),
        array('w', '79', '44'),
        array('u', '3', '21'),
        array('m', '39', '23'),
        array('a', '46', '51'),
        array('t', '86', '8'),
        array('h', '46', '11'),
        array('r', '53', '85'),
        array('e', '49', '12'),
        array('h', '32', '23'),
        array('y', '54', '39'),
        array('p', '85', '17'),
        array('f', '46', '38'),
        array('a', '47', '21'),
        array('a', '51', '63'),
        array('a', '67', '75'),
        array('b', '38', '17'),
        array('p', '94', '37'),
        array('d', '68', '12'),
        array('k', '9', '90'),
        array('f', '48', '77'),
        array('m', '52', '91'),
        array('m', '25', '71'),
        array('w', '4', '51'),
        array('b', '10', '40'),
        array('o', '52', '67'),
        array('x', '52', '72'),
        array('n', '42', '50'),
        array('w', '92', '55'),
        array('l', '17', '24'),
        array('c', '24', '56'),
        array('r', '29', '6'),
        array('w', '51', '4'),
        array('k', '57', '41'),
        array('x', '93', '51'),
        array('r', '67', '25'),
        array('x', '27', '93'),
        array('f', '45', '49'),
        array('h', '60', '4'),
        array('y', '81', '60'),
        array('y', '68', '6'),
        array('k', '19', '9'),
        array('e', '94', '74'),
        array('h', '39', '6'),
        array('f', '35', '1'),
        array('k', '30', '49'),
        array('z', '55', '41'),
        array('v', '4', '69'),
        array('s', '80', '58'),
        array('r', '67', '83'),
        array('u', '26', '61'),
        array('d', '4', '47'),
        array('t', '48', '21'),
        array('z', '49', '76'),
        array('k', '2', '81'),
        array('o', '26', '87'),
        array('i', '86', '51'),
        array('i', '85', '76'),
        array('o', '8', '23'),
        array('o', '70', '65'),
        array('d', '7', '38'),
        array('x', '14', '12'),
        array('d', '50', '18'),
        array('p', '95', '11'),
        array('j', '35', '32'),
        array('z', '57', '38'),
        array('e', '68', '13'),
        array('t', '58', '31'),
        array('b', '23', '56'),
        array('u', '37', '5'),
        array('b', '7', '62'),
        array('l', '61', '96'),
        array('z', '6', '31'),
        array('w', '30', '23'),
        array('z', '14', '58'),
        array('g', '86', '84'),
        array('r', '21', '96'),
        array('b', '11', '90'),
        array('q', '97', '59'),
        array('c', '42', '28'),
        array('f', '86', '93'),
        array('f', '98', '55'),
        array('x', '72', '53'),
        array('k', '33', '38'),
        array('l', '18', '87'),
        array('i', '15', '36'),
        array('e', '45', '60'),
        array('v', '63', '88'),
        array('s', '78', '9'),
        array('u', '63', '77'),
        array('g', '32', '78'),
        array('b', '9', '6'),
        array('b', '77', '76'),
        array('r', '67', '97'),
        array('q', '74', '98'),
        array('w', '88', '91'),
        array('n', '9', '46'),
        array('d', '90', '5'),
        array('a', '81', '74'),
        array('o', '82', '41'),
        array('a', '7', '52'),
        array('j', '46', '12'),
        array('o', '90', '51'),
        array('z', '8', '24'),
        array('a', '40', '10'),
        array('o', '64', '80'),
        array('z', '15', '36'),
        array('r', '25', '85'),
        array('u', '38', '83'),
        array('i', '95', '93'),
        array('c', '42', '54'),
        array('h', '49', '5'),
        array('x', '48', '72'),
        array('z', '2', '89'),
        array('r', '48', '30'),
        array('a', '90', '49'),
        array('h', '56', '39'),
        array('r', '32', '40'),
        array('r', '3', '12'),
        array('w', '27', '19'),
        array('g', '26', '52'),
        array('c', '35', '60'),
        array('z', '60', '94'),
        array('k', '24', '51'),
        array('z', '98', '36'),
        array('o', '61', '93'),
        array('o', '23', '34'),
        array('i', '34', '44'),
        array('r', '54', '47'),
        array('s', '20', '22'),
        array('n', '53', '24'),
        array('j', '88', '76'),
        array('y', '45', '89'),
        array('d', '85', '24'),
        array('t', '8', '84'),
        array('r', '75', '69'),
        array('v', '12', '69'),
        array('k', '37', '43'),
        array('l', '64', '74'),
        array('g', '60', '13'),
        array('a', '83', '1'),
        array('q', '50', '59'),
        array('m', '62', '51'),
        array('p', '15', '97'),
        array('l', '34', '30'),
        array('f', '29', '26'),
        array('y', '76', '71'),
        array('e', '86', '99'),
        array('j', '13', '92'),
        array('l', '76', '90'),
        array('d', '59', '38'),
        array('j', '19', '36'),
        array('j', '88', '11'),
        array('c', '98', '4'),
        array('y', '46', '25'),
        array('y', '38', '84'),
        array('y', '60', '97'),
        array('z', '8', '24'),
        array('l', '68', '8'),
        array('s', '5', '20'),
        array('z', '81', '32'),
        array('f', '65', '91'),
        array('f', '23', '63'),
        array('n', '41', '59'),
        array('r', '94', '42'),
        array('z', '70', '72'),
        array('d', '23', '74'),
        array('l', '74', '23'),
        array('a', '1', '84'),
        array('u', '72', '12'),
        array('o', '30', '2'),
        array('r', '57', '97'),
        array('d', '4', '13'),
        array('v', '66', '94'),
        array('g', '63', '86'),
        array('z', '88', '64'),
        array('z', '89', '59'),
        array('g', '37', '4'),
        array('n', '47', '45'),
        array('l', '2', '32'),
        array('k', '54', '79'),
        array('b', '52', '28'),
        array('r', '10', '32'),
        array('d', '1', '58'),
        array('m', '51', '68'),
        array('q', '69', '69'),
        array('f', '95', '65'),
        array('p', '20', '41'),
        array('v', '88', '23'),
        array('a', '76', '66'),
        array('x', '19', '41'),
        array('e', '94', '40'),
        array('q', '86', '77'),
        array('p', '42', '38'),
        array('m', '4', '26'),
        array('k', '51', '97'),
        array('n', '55', '77'),
        array('a', '54', '9'),
        array('h', '47', '42'),
        array('r', '72', '59'),
        array('e', '94', '77'),
        array('l', '32', '86'),
        array('i', '71', '99'),
        array('j', '13', '69'),
        array('m', '93', '4'),
        array('g', '52', '39'),
        array('c', '91', '69'),
        array('a', '28', '17'),
        array('j', '33', '23'),
        array('b', '56', '97'),
        array('d', '87', '83'),
        array('p', '4', '74'),
        array('c', '19', '21'),
        array('s', '46', '69'),
        array('m', '64', '30'),
        array('h', '25', '29'),
        array('t', '33', '62'),
        array('a', '4', '6'),
        array('y', '59', '59'),
        array('v', '32', '2'),
        array('o', '40', '7'),
        array('r', '91', '58'),
        array('o', '37', '85'),
        array('e', '22', '67'),
        array('d', '49', '30'),
        array('g', '4', '33'),
        array('b', '60', '97'),
        array('k', '37', '20'),
        array('z', '99', '48'),
        array('j', '3', '41'),
        array('p', '44', '79'),
        array('n', '95', '55'),
        array('t', '49', '1'),
        array('v', '97', '23'),
        array('t', '19', '61'),
        array('v', '67', '11'),
        array('y', '7', '63'),
        array('i', '55', '65'),
        array('g', '70', '56'),
        array('h', '98', '1'),
        array('m', '45', '71'),
        array('y', '78', '87')
    );

    /**
     * @param $array
     */
    public function print_arr($array)
    {
        foreach ($array/*$this->data*/ as $value) {
            echo '--';
            foreach ($value as $key) {
                echo $key.' ';
            }
            echo '<br>';
        }
    }

    /**
     * @param $size
     * @return array
     */
    public function randomArray($size)
    {
        $array = [];
        $start = ord('a');
        $end = ord('z');
        for ($i = 0; $i < $size; ++$i) {
            $array[] = [chr((mt_rand($start, $end))), mt_rand(1, 100), mt_rand(1, 100)];
        }
        return $array;
        /*echo 'Нагенерировали массив: <br>';
        foreach ($array as $value) {
            echo '--';
            foreach ($value as $key)
            {
                echo $key.' ';
            }
            echo '<br>';
        }*/
    }

    /**
     * @param $var1
     * @param $var2
     * @return bool
     */
    private function compareArray(&$var1, &$var2)
    {
        if ($var1[0] == $var2[0]) {
            /*if (1 * $var1[1] + 1 * $var1[2] > 1 * $var2[1] + 1 * $var2[2])
            return true;
            else
                return false;*/
            return (1 * $var1[1] + 1 * $var1[2] > 1 * $var2[1] + 1 * $var2[2]);
        }
        return ($var1[0] > $var2[0]);
    }

    // передать callback а вне класса передать массив и callback f

    /**
     * @param $var
     */
    public function insertSort(&$var)
    {
//        $var = &$this->data;
        for ($i = 1; $i < count($var); ++$i) {
            $j = $i;
//            while ($j > 0 &&  $this->compareArray($var[$j - 1] , $var[$j]))  3 4 11 19
            while ($j > 0 && $var[$j - 1] > $var[$j]) {
                $temp = $var[$j];
                $var[$j] = $var[$j - 1];
                $var[$j - 1] = $temp;
                --$j;
            }
        }
        /*foreach ($var as $value) {
            echo '--';
            foreach ($value as $key) {
                echo $key . ' ';
            }
            echo '<br>';
        }*/
    }

    /**
     * @param $array
     */
    public function bubbleSort(&$array)
    {
        for ($i = 0; $i < count($array) - 2; $i++) // count()-2 а не -1
        {
            for ($j = count($array) - 1; $j > $i; $j--) {
                if ($array[$j] < $array[$j - 1]) {
                    $temp = $array[$j - 1];
                    $array[$j - 1] = $array[$j];
                    $array[$j] = $temp;
                }
            }
        }
    }

    /**
     * @param $array
     */
    public function caseSort(&$array)
    {
        for ($i = count($array) - 1; $i > 0; $i--) {
            $maxIndex = 0;
            for ($j = 0; $j < $i; $j++) {
                if ($array[$j] > $array[$maxIndex]) {
                    $maxIndex = $j;
                }
            }
            /*xchng()*/
            $temp = $array[$maxIndex];
            $array[$maxIndex] = $array[$i];
            $array[$i] = $temp;
        }
    }

    // Быстрая сортировка Хоара

    /**
     * @param $arr
     * @param $first
     * @param $last
     */
    public function qsort(&$arr, $first, $last)
    {
        $i = $first;
        $j = $last;
        $x = $arr[($i + $j) / 2];
        do {
            while ($arr[$i] < $x) {
                ++$i;
            }
            while ($arr[$j] > $x) {
                --$j;
            }
            if ($i <= $j) {
                if ($i < $j) {
                    $temp = $arr[$i];
                    $arr[$i] = $arr[$j];
                    $arr[$j] = $temp;
                }
                ++$i;
                --$j;
            }

        } while ($i <= $j);
        if ($i < $last) {
            $this->qsort($arr, $i, $last);
        }
        if ($j > $first) {
            $this->qsort($arr, $first, $j);
        }
    }


    /**
     *
     */
    public function our_sort()
    {
//        array('t','19','61'),
//        array('v','67','11'),
        function cmp($a, $b)
        {
            /**
             * if ($a[0] > $b[0])
             * return 1;
             * if ($a[0] < $b[0])
             * return -1;
             */
            if ($a[0] == $b[0]) {
                if (($a[1] + $a[2]) == ($b[1] + $b[2])) {
                    return 0;
                }
                return (($a[1] + $a[2]) < ($b[1] + $b[2])) ? -1 : 1;
            }
            return ($a[0] > $b[0]) ? 1 : -1;
        }

        usort($this->data, 'cmp');
//        sort($this->data);
        /** @var
         * $start_index = 0;
         * $shift = 1;
         *
         * while($start_index < sizeof($this->data))
         * {
         * while($this->data[$start_index][0] == $this->data[$start_index+$shift][0])
         * {
         * ++$shift;
         * }
         * if ($shift>1){
         *
         * for ($i=0; $i<$shift; ++$i)
         * {
         * $temp[$i] = $this->data[$start_index+$i];
         * }
         * usort($temp,'cmp');
         * for ($i=0; $i<$shift; ++$i)
         * {
         * $this->data[$start_index+$i] =  $temp[$i];
         * }
         * }
         *
         * $start_index += $shift;
         * $shift = 1;
         * unset($temp);
         * }
         */
    }

    /**
     * @param $a
     * @param $b
     * @return bool
     */
    private static function cmp_ins($a, $b)
    {
        if ($a[0] == $b[0]) {
            return ($a[1] + $a[2]) > ($b[1] + $b[2]);
        }
        return $a[0] > $b[0];
    }

    /**
     *
     */
    public function insert_sort()
    {
        for ($index = 1; $index < count($this->data); ++$index) {
            $j = $index;
            while ($j > 0 && SortClass::cmp_ins($this->data[$j - 1], $this->data[$j])) {
                $tmp = $this->data[$j];
                $this->data[$j] = $this->data[$j - 1];
                $this->data[$j - 1] = $tmp;
                --$j;
            }
        }
    }
}