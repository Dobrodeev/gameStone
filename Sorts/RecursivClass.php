<?php
/**
 * Created by PhpStorm.
 * User: dobrodeev
 * Date: 06.08.2018
 * Time: 16:35
 */

//

/**
 * Class RecursivClass
 */
class RecursivClass
{
    /**
     * @param $number
     * @return float|int
     */
    public function factorialRecursic($number)
    {
        if ($number == 1) {
            return 1;
        } else {
            return ($number * $this->factorialRecursic($number - 1));
        }
    }

    /**
     * @param $number
     * @return int
     */
    public function factorialFor($number)
    {
        $factorial = 1;
        for ($i = 1; $i <= $number; $i++) {
            $factorial *= $i;
        }
//        echo $number.'! = '.$factorial.'<br>';
        return $factorial;
    }

    /**
     * Degrees Celsius Degrees Fahrenheit
     * F = 9 / 5 x C + 32
     */
    public function degreesExchange()
    {
        $Fahrenheit = 0;
        $j = 0;
        echo '<b>Exchange Deegrees Celsius to Fahrengeit</b><br>';
        for ($i = 0; $i <= 30; $i++) {
            $Fahrenheit = 9 / 5 * $j + 32;
            echo $j.' Celsius -> '.$Fahrenheit.' F<br>';
            $j += 10;
        }
    }


    /**
     * Degrees Celsius Degrees Fahrenheit with parametrs
     * @param $start
     * @param $step
     * @param $num_rows
     */
    public function degreesExchangeParametrs($start, $step, $num_rows)
    {
//        $Fahrenheit = 0;
        echo "<b>Exchange Deegrees Celsius to Fahrengeit with step $step</b><br>";
        echo '<table border="1">';
        echo '<tr><th>Цельсий </th><th>Фаренгейт</th></tr>';
        for ($C = $start; $C < $start + $step * $num_rows; $C += $step) {
//            $Fahrenheit = 9 / 5 * $start + 32;
//            echo '<tr><td>'.$start.' Celsius </td><td>'.$Fahrenheit.' F</td></tr>';
//            $start += $step;
            echo '<tr><td>'.$C.' Celsius </td><td>'.(9 / 5 * $C + 32).' F</td></tr>';
        }
        echo '</table>';
    }
}
