<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 19.02.2019
 * Time: 14:16
 */

class TicTac
{
    public $array = array();

    public function simpleTicTack($n)
    {

        /*echo '<table class="table table-bordered table-dark">';
        echo '<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">1</th>
      <th scope="col">2</th>
      <th scope="col">3</th>
    </tr>
  </thead>';
        echo '<tbody>';
        for ($i = 0; $i < $n; $i++) {
            echo '<tr><th scope="row">'.($i+1).'</th>';
            for ($j = 0; $j < $n; $j++) {
                echo '<td>' . $array[$i][$j] = '&nbsp' . '</td>';
            }
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';*/
        for ($i = 0; $i < $n; $i ++)
        {
            for ($j = 0; $j < $n; $j++)
            {
                $array[$i][$j] = '&nbsp';
            }
        }
    }

    public function getStep($x, $y)
    {
        $x = $_POST['x'];
        $y = $_POST['y'];
        echo 'Ход сделан: ('.$x.', '.$y.') ';
        $this->array[$x][$y] = 'X';
    }
    /*
     * Порядок игры:
     * сначала пустое поле
     * Ход первого игрока
     * Оценка ситуации-> затем ход второго, проверка возможности походить(если даное поле не занято)
     * Ход второго-> оценка ситуации -> ход
     * Передача хода другому игроку
     * 2 варианта игры Чел-Чел, Чел-Бот, Бот-Бот
     */
    public function afterStep($x, $y)
    {
        $n = 3;
        $this->array[$x][$y] = 'X';
        $this->array[2][1] = 'O';
        $this->array[2][2] = 'O';
        $this->array[0][1] = 'O';
        /*
         * 00 01 02
         * 10 11 12
         * 20 21 22
         *
         * 8 вариантов трех значений подряд XXX || OOO
         * условие победы - окончание игры
        $endGame = false;
        if (($this->array[0][0] == $this->array[0][1] && $this->array[0][1] == $this->array[0][2]) ||
            ($this->array[1][0] == $this->array[1][1] && $this->array[1][1] == $this->array[1][2]) ||
            ($this->array[2][0] == $this->array[2][1] && $this->array[2][1] == $this->array[2][2]) ||
            ($this->array[0][0] == $this->array[1][0] && $this->array[1][0] == $this->array[2][0]) ||
            ($this->array[0][1] == $this->array[1][1] && $this->array[1][1] == $this->array[2][1]) ||
            ($this->array[0][2] == $this->array[1][2] && $this->array[1][2] == $this->array[2][2]) ||
            ($this->array[0][0] == $this->array[1][1] && $this->array[1][1] == $this->array[2][2]) ||
            ($this->array[0][2] == $this->array[1][1] && $this->array[1][1] == $this->array[2][0])
        )
        {
            $endGame = true;
        }
        */
        echo '<table class="table table-bordered table-dark">';
        echo '<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">0</th>
      <th scope="col">1</th>
      <th scope="col">2</th>
    </tr>
  </thead>';
        echo '<tbody>';
        for ($i = 0; $i < $n; $i++) {
            echo '<tr><th scope="row">'.$i.'</th>';
            for ($j = 0; $j < $n; $j++) {
                echo '<td>' . $this->array[$i][$j]. '</td>';
            }
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    }
}