<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="calculations_script.js"></script>
<h5>Scientific calculations</h5>
<!--<form class="form-inline">
    <div class="form-group">
        <label for="exampleInputName2">Name</label>
        <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail2">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
    </div>
    <button type="submit" class="btn btn-default">Send invitation</button>
</form>-->
<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
    <!--<div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input type="file" id="exampleInputFile">
        <p class="help-block">Example block-level help text here.</p>
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox"> Check me out
        </label>
    </div>-->

    <div class="form-group">
        <label for="exampleInputEmail1"></label>
        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="" name="number1">

        <div class="radio">
            <label>
                <input type="radio" name="action" id="optionsRadios1" value="+">
                +
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="action" id="optionsRadios2" value="-">
                -
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="action" id="optionsRadios3" value="*">
                *
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="action" id="optionsRadios4" value="/">
                /
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="action" id="optionsRadios5" value="%">
                %
            </label>
        </div>

        <label for="exampleInputEmail1"></label>
        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="" name="number2">
    </div>

    <button type="button" onclick="calculations()" class="btn btn-primary" name="go">Submit</button>
</form>
<p id="demo">Результат вычислений</p>
<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 01.04.2019
 * Time: 13:49
 */
/*
if (isset($_POST['go']))
{
    if ($_POST['number1'] != '' && $_POST['number2'] != 0 && $_POST['action'] != '')
    {
        echo 'Нажали кнопку ортправить (submit) <br>';
        echo "<span style='color:blue;'>Данные добавлены</span>";
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        $number1 = $_POST['number1'];
        $number2 = $_POST['number2'];
        $action = $_POST['action'];
        if ($action == '+')
        {
            $result = $number1 + $number2;
        }
        elseif ($action == '-')
        {
            $result = $number1 - $number2;
        }
        elseif ($action == '*')
        {
            $result = $number1 * $number2;
        }
        elseif ($action == '/')
        {
            if ($number2 == 0)
            {
                $result = 'бесконечность';
            }
            else
                $result = $number1 / $number2;
        }
        elseif ($action == '%')
        {
            if ($number2 == 0)
            {
                $result = 'Делим на ноль';
            }
            else
                $result = $number1 % $number2;
        }
        echo $number1.' '.$action.' '.$number2.' = '.$result.'<br>';
    }
    else
    {
        echo "<span style='color:blue;'>Не все Данные добавлены</span>";
    }
}*/
?>
</body>
</html>
