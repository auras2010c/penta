<?php

$host = 'localhost';
$user = 'root';
$password = 'password';
$dbname = 'convert';

//Setam DSN
$dsn = 'mysql:host='. $host .';dbname='. $dbname;

//Cream instanta
$pdo = new PDO($dsn, $user, $password);