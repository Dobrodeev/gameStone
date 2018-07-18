<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assetst/reset.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <title>Игра ЮЗФ</title>
</head>
<body>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<div>
    <form name="form1" method="post" action="scriptGame.php">
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
            <input type="submit" value="Отослать форму">
            &nbsp;&nbsp;&nbsp<input type="reset" value="Очистить форму">
        </p>
    </form>
</div>
</body>
</html>