<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Text Perevorot</title>
    <link rel="stylesheet" href="assets/reset.css">
    <!--    <link rel="stylesheet" href="">-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
<script src="assets/jquery-3.2.1.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<form action="TextPerevorot_handler.php" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Some text</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
               placeholder="Enter some text" name="text">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <button type="submit" class="btn btn-primary">Перевернуть строку</button>
</form>
<?php
/**
 * $start = 12;
 * $end = 19;
 * for ($i = $start; $i <= $end; $i++)
 * {
 * //    echo $i.'<br>';
 * for ($j = 0;  $j < $i; $j++)
 * {
 * echo $i;
 * }
 * echo '<br>';
 * }
 */
//


/**
 * текст который подается на вход
 * abcdefgggh
 * порядковый номер (индекс) символа(буквы), которую будем менять местами с последней буквой, результат:
 * abcdhgggfe
 * @param $text
 * @param $index
 * @return string
 */
function revolutionString($text, $index)
{
    echo $text.'<br>';
//    $first = substr($text, 0, $index - 1);
//    $temp = substr($text, $index - 1);
//    $perevorot = strrev($temp);
//    $result = $first.$perevorot;
//    echo $result;
    return substr($text, 0, $index - 1).strrev(substr($text, $index - 1));
}

$string = 'abcdefgggh';
$index = 5;
echo revolutionString($string, $index).'<br>';
?>
</body>
</html>
