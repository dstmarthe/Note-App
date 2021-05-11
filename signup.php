<?php
  session_start(); 
  require_once "pdo.php";
  require_once "util.php"
  
  if (isset($_POST['cancel']))
  {
      header( 'Location: index.php' ) ;
  return;
  }
    if ( isset($_POST['email']) && isset($_POST['pass']) ) {
    if ( strlen($_POST['email']) < 1 || strlen($_POST['pass']) < 1 ) {
        $_SESSION['error'] = "Email and password are required";
        header("Location: login.php");
        return;
    } elseif (strpos($_POST['email'], "@") === false){
        $_SESSION['error'] = "Email must have an at-sign (@)";
header("Location: login.php");
return;
    } else {
        $pw = password_hash( $_POST['pass'] , PASSWORD_DEFAULT);
        $stmt = $pdo->prepare('INSERT INTO users (name, email, password)
        VALUES ( :nam, :em, :pw)');
      $stmt->execute(array(
        ':em' => $_POST['email'],
        ':nam' => $_POST['name'],
        ':pw' => $pw)
      );
      error_log("Signup success ".$_POST['email']);
      $_SESSION["success"] = "Sign up successful. Welcome!";
      header( 'Location: signupsuccess.php' ) ;
            return;
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="signupStyle.css" />
    <title>Sign Up</title>
    <link rel="shortcut icon" type="image/svg+xml" href="favicon.svg"/>
</head>
<body>
<nav role="navigation">
      <img src="favicon.svg" alt="logo" id="logo">
        <?php
         flashMessages(); 
         navbar();
         ?>
      </nav>
    <main id="main">
        <h1 id="title">Sign up</h1>
        <p id="description">Signing up allows you to save notes!</p>
        <form method="post" id="survey-form">
        <label for="name" id="name-label" class="box">Username:<br><br><br><input type="text" id="usern" name="name" placeholder="Enter a username" required></label>

            <label for="email" id="email-label" class="box"  >Email:<br><br><br><input type="email" id="email" name="email" placeholder="Enter your e-mail address" required></label>
            
            <label for="pass" class="box" >Email:<br><br><br><input type="password" id="email" name="pass" required placeholder="Enter a password"></label>
            
            <button type="submit" id="submit">Submit</button>
        </form>
        <? flashMessages();?>
    </main>
</body>
</html>
