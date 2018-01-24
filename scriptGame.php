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
		$y = $_POST['day_s'];
			if($y == 1) $y2 = 'Ножницы';
			elseif($y == 2) $y2 = 'Бумага';
			elseif($y == 3) $y2 = 'Колодец';
		echo '<p>Вы выбрали вариант: <b>'.$y2.'</b></p>';
		$x = rand(1,3);
			if($x ==1 ) $x2 = 'Ножницы';
			elseif($x == 2) $x2 = 'Бумага';
			elseif($x == 3) $x2 = 'Колодец';
		echo '<p>Компьютер(Bot) выбрал вариант: <b>'.$x2.'</b></p>';
		if($y == $x)
			echo '<p>Draw</p>';
		elseif($y == 1 && $x == 2)
			echo '<p>You win</p>';
		elseif($y == 1 && $x == 3)
			echo '<p>Bot win</p>';
		elseif($y == 2 && $x == 3)
			echo '<p>You win</p>';
		?>
	<a href="Game Form for ЮЗФ.htm">Next round</a>
	</div>
	<hr>
<div class="row">
  <div class="span4">Страница 1</div>
  <div class="span8">Страница 2</div>
</div>
<hr>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span2">
      <!--Sidebar content-->
      <p>Text 1</p>
      <p>Text 2</p>
      <p>Text 3</p>
      <p>Text 4</p>
    </div>
    <div class="span10">
      <!--Body content-->
      <p>Text 1</p>
      <p>Text 2</p>
      <p>Text 3</p>
      <p>Text 4</p>
    </div>
  </div>
</div>
</body>
</html>


