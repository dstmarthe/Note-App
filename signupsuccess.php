<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="style.css" />
<title>Success</title>
</head>
<body>
<nav role="navigation">
      <img src="favicon.svg" alt="logo" id="logo">
        <?php
        navbar();
         echo flashMessages()."Redirecting..."; 
         sleep(2);
header("Location: index.php");
return;
         ?>
      </nav>
</body>


</html>