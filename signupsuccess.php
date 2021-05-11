<?php
session_start();
echo flashMessages()."Redirecting...";
sleep(2);
header("Location: index.php");
return;
?>