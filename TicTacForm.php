<?php
session_name('TicTac');
session_start();

/*$_SESSION['stepX'] = array();
$_SESSION['stepY'] = array();*/
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

function makeStep($x, $y)
{
    $array[$x][$y] = 'X';
    /*$array[1][1] = 'O';
    $array[1][2] = 'O';
    echo '$array[][]='.$x.' '.$y.'<br>';*/
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
$arrayTest = array(array(0, 1, 2),
    array(0, 1, 2),
    array(0, 1, 2)
);

function sessionZero()
{
    $_SESSION = array();
}
//createArray();
if ($_POST['doGo'])
{
    if ($_SESSION['count'] < 9 && $_SESSION['count']%2 == 0)
    {
        $x = $_POST['x'];
        $y = $_POST['y'];
        echo 'Ход ('.$x.', '.$y.') <br>';
        $_SESSION['count'] = @$_SESSION['count'] + 1;
        echo 'Ход №'.$_SESSION['count'].' сделан: ('.$x.', '.$y.') <br>';
        $array[$x][$y] = 'X';
        $_SESSION['array'][$x][$y] = 'X';
        writeArray($_SESSION['array']);
    }
    elseif ($_SESSION['count'] < 9 && $_SESSION['count']%2 != 0)
    {
        $x = $_POST['x'];
        $y = $_POST['y'];
        echo 'Ход ('.$x.', '.$y.') <br>';
        $_SESSION['count'] = @$_SESSION['count'] + 1;
        echo 'Ход №'.$_SESSION['count'].' сделан: ('.$x.', '.$y.') <br>';
        $array[$x][$y] = 'X';
        $_SESSION['array'][$x][$y] = 'O';
        writeArray($_SESSION['array']);
    }
    else
    {
        echo 'Все ходы сделаны.  <br>';
        writeArray($_SESSION['array']);
        sessionZero();
    }
}
echo '<pre>';
print_r($_SESSION['array']);
echo '</pre>';

?>