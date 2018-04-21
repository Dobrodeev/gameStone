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
		$varUser = $_POST['variant'];
			if($varUser == 1) $stringUser = 'Ножницы';
			elseif($varUser == 2) $stringUser = 'Бумага';
			elseif($varUser == 3) $stringUser = 'Колодец';
		echo '<p>Вы выбрали вариант: <b>'.$stringUser.'</b></p>';
		$varBot = rand(1,3);
			if($varBot == 1 ) $stringBot = 'Ножницы';
			elseif($varBot == 2) $stringBot = 'Бумага';
			elseif($varBot == 3) $stringBot = 'Колодец';
		echo '<p>Компьютер(Bot) выбрал вариант: <b>'.$stringBot.'</b></p>';
		if($varUser == $varBot)
			echo '<p>Draw</p>';
		elseif($varUser == 1 && $varBot == 2)
			echo '<p>You win</p>';
		elseif($varUser == 1 && $varBot == 3)
			echo '<p>Bot win</p>';
		elseif($varUser == 2 && $varBot == 3)
			echo '<p>You win</p>';
		?>
	<a href="GameForm .htm">Next round</a>
</body>
</html>


