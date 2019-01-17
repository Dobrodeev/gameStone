<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 17.01.2019
 * Time: 12:46
 */

class PerevorotArray
{

    public function perevorotTexta($getText)
    {
        echo 'Просто текст: <br>';
        echo $getText.'<br>';
        echo 'Уменьшеный текст <br>';
        echo strtoupper($getText).'<br>';
        echo 'Увеличенный текст: <br>';
        echo strtolower($getText).'<br>';
        echo 'Текст с большой буквы: <br>';
        echo ucfirst($getText).'<br>';
        $explodeText = explode(' ',$getText);
        echo '<pre>';
        print_r($explodeText);
        echo '</pre>';
    }

    public function perevorotString($text, $index)
    {
        echo 'Текст до преобразования: <br>';
        echo $text.'<br>';
    //    $first = substr($text, 0, $index - 1);
    //    $temp = substr($text, $index - 1);
    //    $perevorot = strrev($temp);
    //    $result = $first.$perevorot;
    //    echo $result;
        echo 'Текст после преобразования: <br>';
        return substr($text, 0, $index-1) . strrev(substr($text, $index-1));
    }
    public function fib ($n)
    { // a function called fib, declaire variable n (the sequence number)
        for ($n=0;$n<30;$n++)
        {
            if ($n < 3)
            {
                return $n;
            } // if n is smaller than 3 return n (1 or 2)
            else
                {
                    return fib ($n - 1) + fib ($n - 2);
                }
            /* if the number is 3 or above do 2 sums (n-1) and (n-2)
            and then add the 2 sums together (n-1)+(n-2)
            Example Fibonacci number 4
            (4-1)+(4-2) = 5
            3 + 2 = 5
            */
        }
        print $n;
    }
}