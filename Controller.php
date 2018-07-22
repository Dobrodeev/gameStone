<?php
/**
 * Created by PhpStorm.
 * User: dobrodeev
 * Date: 22.07.2018
 * Time: 21:26
 */

class Controller
{
//define('DB_CONNECTION_DB', 'Dance');
//define('DB_CONNECTION_USER', 'root');
//define('DB_CONNECTION_PASS', '');
    const DB_CONNECTION_DB = 'Dance';
    const DB_CONNECTION_USER = 'root';
    const DB_CONNECTION_PASS = '';
    const DB_HOST = 'mysql:host=localhost';

    protected $pdo;

    public function __construct()
    {
        $host = self::DB_HOST;
        $db = self::DB_CONNECTION_DB;
        $user = self::DB_CONNECTION_USER;
        $pass = self::DB_CONNECTION_PASS;
        $charset = 'utf8';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];
//        $this->dbh = new PDO('mysql:host=localhost;dbname='.self::DB_CONNECTION_DB, self::DB_CONNECTION_USER, self::DB_CONNECTION_PASS, $opt);
        $this->pdo = new PDO($dsn, $user, $pass, $opt);
    }

    protected function delete_from_db($table, $name_param, $value_param)
    {
        $query="DELETE FROM $table WHERE $name_param='$value_param'";
//        $query = 'DELETE FROM $table ';
        $sth = $this->pdo->query($query);
    }
}