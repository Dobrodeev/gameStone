<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Game result</title>
	 <link rel="stylesheet" href="assets/style.css">
	<link rel="stylesheet" href="assets/reset.css">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
	<script src="assets/jquery-3.2.1.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
    <div>
        <form name="form1" method="post" action="#">
            <h3>Game JuZeFa for webdesign</h3>
            <hr size="1">
            <p>Выбираем вариант:</p>
            <p>
                <br>
                <select name=variant size=1>
                    <option value=1>Ножницы</option>
                    <option value=2>Бумага</option>
                    <option value=3 selected>Колодец</option>
                </select>
            </p>
            <br>
            <p>
                <input type="hidden"><?php $id = 0; ?>
                <input type="submit" value="Отослать форму" name="go">
                &nbsp;&nbsp;&nbsp<input type="reset" value="Очистить форму">
            </p>
        </form>
    </div>
	<div class="bordered">
		<h3>Результат</h3>
		<?php
        const ROUND_LIMIT = 6;
        $varUser = $_POST['variant'];
        $varBot = mt_rand(1,3);

		function writeVariant($var)
        {
            $variant = $var;
            global $stringVar;
            if($variant == 1) $stringVar = 'Ножницы';
            elseif($variant == 2) $stringVar = 'Бумага';
            else $stringVar = 'Колодец';
            return $stringVar;
        }

        function writeChange()
        {
            global $varUser, $varBot;
            echo '<p>Вы выбрали вариант: <b>'.writeVariant($varUser).'</b></p>';
            echo '<p>Компьютер(Bot) выбрал вариант: <b>'.writeVariant($varBot).'</b></p>';
        }

		function compareVariant($user, $bot)
        {
            $varUser = $user;
            $varBot = $bot;
            static $counterUser = 0;
            static $counterBot = 0;
            static $counterRound = 0;
            if($varUser == $varBot)
            {
                echo '<h5>Draw</h5>';
                $counterUser += 0.5;
                $counterBot += 0.5;
            }

            elseif(($varUser == 1 && $varBot == 2) || ($varUser == 2 && $varBot == 3) ||
                ($varUser == 3 && $varBot == 1))
            {
                echo '<h5>You win</h5>';
                $counterUser++;
            }

            else
            {
                echo '<h5>Bot win</h5>';
                $counterBot++;
            }
            $counterRound++;
            echo '<h5>Round '.$counterRound.'</h5>';
            echo 'You wins: '.$counterUser.'; Bot wins: '.$counterBot.'<br>';
            // дописать запись счета очьков в БД: id = 1 man_result = 0; bot_result = 1; и так до 6-ти раундов
        }

        function nextRound()
        {
            echo 'next round. <br>';
        }

        writeChange();
        compareVariant($varUser, $varBot);
//        nextRound();
?>
</body>
</html>


