<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 11.02.2019
 * Time: 22:35
 */

$host = '127.0.0.1';
$db   = 'carparking';
$user = 'root';
$pass = '';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,];
$pdo = new PDO($dsn, $user, $pass, $opt);