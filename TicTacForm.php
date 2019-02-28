<?php
session_name('TicTac');
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tic Tac Game</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" media="screen">
</head>
<body>
<script src="assets/jquery-3.2.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<form method="post" action="<? echo $_SERVER['SCRIPT_NAME'];?>">
    <div class="form-group">
        <label for="exampleInputEmail1">Походить</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ход" name="x">
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ход" name="y">
        <!--        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
    </div>
    <button type="submit" class="btn btn-primary" name="doGo" value="go">Submit</button>
<!--    <button type="reset" class="btn btn-primary" name="reset" value="reset">Reset</button>-->
</form>
</body>
</html>
<h5>Tic Tac one by one</h5>
<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 28.02.2019
 * Time: 14:01
 */

function createArray()
{
    $n = 3;
    $array = array();
    for ($i = 0; $i < $n; $i ++)
    {
        for ($j = 0; $j < $n; $j++)
        {
            $array[$i][$j] = '&nbsp';
        }
    }
}

function writeArray($array)
{
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
            echo '<td>' . $array[$i][$j]. '</td>';
        }
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}
/*Условие окончания игры - когда три значения подряд одинаковы, например XXX или OOO*/
function afterStep()
{
    /*
     * 00 01 02
     * 10 11 12
     * 20 21 22
     *
     * 8 вариантов трех значений подряд XXX || OOO
     * условие победы - окончание игры*/
    $endGame = false;
    if (
        ($_SESSION['array'][0][0] == $_SESSION['array'][0][1] && $_SESSION['array'][0][1] == $_SESSION['array'][0][2] && ($_SESSION['array'][0][2] == 'X'|| $_SESSION['array'][0][2] == 'O')) ||
        ($_SESSION['array'][1][0] == $_SESSION['array'][1][1] && $_SESSION['array'][1][1] == $_SESSION['array'][1][2] && ($_SESSION['array'][1][2] == 'X'|| $_SESSION['array'][1][2] == 'O')) ||
        ($_SESSION['array'][2][0] == $_SESSION['array'][2][1] && $_SESSION['array'][2][1] == $_SESSION['array'][2][2] && ($_SESSION['array'][2][2] == 'X'|| $_SESSION['array'][2][2] == 'O')) ||
        ($_SESSION['array'][0][0] == $_SESSION['array'][1][0] && $_SESSION['array'][1][0] == $_SESSION['array'][2][0] && ($_SESSION['array'][2][0] == 'X'|| $_SESSION['array'][2][0] == 'O')) ||
        ($_SESSION['array'][0][1] == $_SESSION['array'][1][1] && $_SESSION['array'][1][1] == $_SESSION['array'][2][1] && ($_SESSION['array'][2][1] == 'X'|| $_SESSION['array'][2][1] == 'O')) ||
        ($_SESSION['array'][0][2] == $_SESSION['array'][1][2] && $_SESSION['array'][1][2] == $_SESSION['array'][2][2] && ($_SESSION['array'][2][2] == 'X'|| $_SESSION['array'][2][2] == 'O')) ||
        ($_SESSION['array'][0][0] == $_SESSION['array'][1][1] && $_SESSION['array'][1][1] == $_SESSION['array'][2][2] && ($_SESSION['array'][2][2] == 'X'|| $_SESSION['array'][2][2] == 'O')) ||
        ($_SESSION['array'][0][2] == $_SESSION['array'][1][1] && $_SESSION['array'][1][1] == $_SESSION['array'][2][0] && ($_SESSION['array'][2][0] == 'X'|| $_SESSION['array'][2][0] == 'O'))
    ) {
        $endGame = true;
    }
    return $endGame;
}
function sessionZero()
{
    $_SESSION = array();
}

if ($_POST['doGo'])
{
    if (isset($_POST['x']) && isset($_POST['y']))
    {
        if ($_SESSION['count'] < 9 && $_SESSION['count']%2 == 0)
        {
            $x = $_POST['x'];
            $y = $_POST['y'];

            if (isset($_SESSION['array'][$x][$y]))
            {
                echo 'Это поле уже занято. Сделайте другой ход.<br>';
                writeArray($_SESSION['array']);
            }
            else
            {
                $_SESSION['count'] = @$_SESSION['count'] + 1;
                echo 'Ход №'.$_SESSION['count'].' сделан: ('.$x.', '.$y.') <br>';
                $array[$x][$y] = 'X';
                $_SESSION['array'][$x][$y] = 'X';
                writeArray($_SESSION['array']);
                $flag = afterStep();
                if ($flag)
                {
                    echo 'Крестики победили.<br>';
                    sessionZero();
                }
            }

        }
        elseif ($_SESSION['count'] < 9 && $_SESSION['count']%2 != 0)
        {
            $x = $_POST['x'];
            $y = $_POST['y'];
            echo 'Ход ('.$x.', '.$y.') <br>';
            if (isset($_SESSION['array'][$x][$y]))
            {
                echo 'Это поле уже занято. Сделайте другой ход.<br>';
                writeArray($_SESSION['array']);
            }
            else
            {
                $_SESSION['count'] = @$_SESSION['count'] + 1;
                echo 'Ход №'.$_SESSION['count'].' сделан: ('.$x.', '.$y.') <br>';
                $array[$x][$y] = 'X';
                $_SESSION['array'][$x][$y] = 'O';
                writeArray($_SESSION['array']);
                $flag = afterStep();
                if ($flag)
                {
                    echo 'Нолики победили.<br>';
                    sessionZero();
                }
            }
        }
        else
        {
            echo 'Все ходы сделаны.  <br>';
            writeArray($_SESSION['array']);
            sessionZero();
        }
    }
    else echo 'Заполните оба поля. <br>';
}
echo '<pre>';
print_r($_SESSION['array']);
echo '</pre>';
?>