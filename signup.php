<?php
 require_once "pdo.php";
  if ( isset($_POST['signup'])) {
    if ( strlen($_POST['email']) < 1 || strlen($_POST['pass']) < 1 ) {
        $_SESSION['error'] = "Email and password are required";
    } elseif (strpos($_POST['email'], "@") === false){
        $_SESSION['error'] = "Email must have an at-sign (@)";
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
      header("Location: index.php");
      return;
    }
  }
  ?>