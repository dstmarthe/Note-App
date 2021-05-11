<?php
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
// Config variables
$dbhost  = $url["host"];
$psw = $url["pass"];
$user = $url["user"];
$dbname getenv('dbname');
$pdo = new PDO("mysql:host=".$dbhost.";dbname=".$dbname.";",
$user, $psw);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>


