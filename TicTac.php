<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 19.02.2019
 * Time: 14:16
 */

class TicTac
{
    public function simpleTicTack($n)
    {
        $array = array();
        echo '<table class="table table-bordered table-dark">';
        for ($i = 0; $i < $n; $i++) {
            echo '<tr>';
            for ($j = 0; $j < $n; $j++) {
                echo '<td>' . $array[$i][$j] = '&nbsp' . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }
}