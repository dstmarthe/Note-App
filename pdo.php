<?php
// Config variables
$dbhost  = getenv('dbhost');
$psw = getenv('psw');
$user = getenv('user');
$dbname getenv('dbname');
$pdo = new PDO("mysql:host=$dbhost; dbname=$dbname",
$user, $psw);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>


