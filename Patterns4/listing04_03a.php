<?php

require_once "listing04_03.php";


// Листинг 04.03a

//Для создания БД и наполнения ее данными
//раскомментируйте приведенный ниже код.

/*
$dsn = __DIR__ . "/products.db";
$db = new SQLite3($dsn);

$sql = file_get_contents(__DIR__ . '/listing04_03.sql');
$db->exec($sql);

$sql = file_get_contents(__DIR__ . '/listing04_03b.sql');
$db->exec($sql);
$db->close();

exit();
*/

$dsn = "sqlite:/".__DIR__."/products.db";
$pdo = new \PDO($dsn, null, null);
$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
$obj = ShopProduct::getInstance(1, $pdo);

var_dump($obj);


?>
