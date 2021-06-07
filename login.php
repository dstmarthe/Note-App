<?php
 require_once "pdo.php";
if ( isset($_POST['cancel'] ) ) {
    header("Location: index.php");
    return;
}


// Check to see if we have some POST data, if we do process it
if ( isset($_POST['login'])) {
    if ( strlen($_POST['email']) < 1 || strlen($_POST['pass']) < 1 ) {
        $_SESSION['error'] = "Email and password are required";
    } elseif (strpos($_POST['email'], "@") === false){
        $_SESSION['error'] = "Email must have an at-sign (@)";
    } else {
        $stmt = $pdo->prepare('SELECT user_id, name, password FROM users
            WHERE email = :em');
        $stmt->execute(array( ':em' => $_POST['email']));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if( ! $row) $_SESSION["error"] = "Doesn't exist.";
        if ( password_verify($_POST['pass'], $row['password']) !== false) {
            $_SESSION['name'] = $row['name'];
            $_SESSION['user_id'] = $row['user_id'];
   
            // Redirect the browser to index.php
             error_log("Login success ".$_POST['email']);
            header("Location: index.php");
            return;
            
        } else {
            $_SESSION["error"] = "Incorrect password.";
            error_log("Login fail ".$_POST['email']);
            header("Location: index.php");
            return;
        }
    }
}

?>
