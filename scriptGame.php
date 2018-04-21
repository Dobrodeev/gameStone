<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Game result</title>
	<!-- <link rel="stylesheet" href="assets/style.css"> -->
	<link rel="stylesheet" href="assets/reset.css">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
	<script src="assets/jquery-3.2.1.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<div class="bordered">
		<h3>Результат</h3>
		<?php
//        include 'gameStone.php';
		define('WIN_LIMIT', 10);
        $varUser = $_POST['variant'];
        $varBot = rand(1,3);
        $counterUser = $counterBot = 0;

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
            global $counterUser, $counterBot;
//            $counterUser = $counterBot = 0;
            if($varUser == $varBot)
            {
                echo '<p>Draw</p>';
                $counterUser += 0.5;
                $counterBot += 0.5;
            }

            elseif(($varUser == 1 && $varBot == 2) || ($varUser == 2 && $varBot == 3) ||
                ($varUser == 3 && $varBot == 1))
            {
                echo '<p>You win</p>';
                $counterUser++;
            }

            else
            {
                echo '<p>Bot win</p>';
                $counterBot++;
            }
        }

        writeChange();
		compareVariant($varUser, $varBot);
		echo 'You wins: '.$counterUser.' Bot wins: '.$counterBot.'<br>';
		?>
	<a href="GameForm .htm">Next round</a>
</body>
</html>


