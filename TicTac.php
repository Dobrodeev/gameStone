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
    public $x;
    public $y;
    public $counter = 0;

    public function simpleTicTack($n)
    {
        for ($i = 0; $i < $n; $i ++)
        {
            for ($j = 0; $j < $n; $j++)
            {
                $array[$i][$j] = '&nbsp';
            }
        }
    }

    public function getStep()
    {
            $this->x = $_POST['x'];
            $this->y = $_POST['y'];

            $this->array[$this->x][$this->y] = 'X';
            $this->counter ++;
            echo 'Ход №'.$this->counter.' сделан: ('.$this->x.', '.$this->y.') <br>';
            $n = 3;
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

//        return $this->array;
    }
    public function getStepZeroPlayer()
    {
        $this->x = 3;
        $this->y = 2;

        $this->array[$this->x][$this->y] = 'O';
        $this->counter ++;
        echo 'Ход №'.$this->counter.' сделан: ('.$this->x.', '.$this->y.') <br>';
        $n = 3;
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
    /*
     * Порядок игры:
     * сначала пустое поле
     * Ход первого игрока
     * Оценка ситуации-> затем ход второго, проверка возможности походить(если даное поле не занято)
     * Ход второго-> оценка ситуации -> ход
     * Передача хода другому игроку
     * 2 варианта игры Чел-Чел, Чел-Бот, Бот-Бот
     */
    public function afterStep()
    {
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
    }

}