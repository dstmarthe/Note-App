<?php
  session_start(); 
  require_once "pdo.php";
  require_once "util.php";
  include "login.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://use.fontawesome.com/b8efeac290.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Leaf a Note</title>
  </head>
  <body>
    <main>
      <nav>
        <?php 
        if ( ! isset($_SESSION['user_id'])) {
          echo 
          "<ul>
        <li id='login'>
          <a id='login-trigger' href='#'>
            Log in <i class='fa fa-caret-down' aria-hidden='true'></i>
          </a>
          <div id='login-content'>
            <form>
              <fieldset id='inputs'>
                <input  id='username'
                        type='email'
                        name='email'
                        placeholder='Your email address'
                        required>
                <input  id='password'
                        type='password'
                        name='pass'
                        placeholder='Password'
                        required>
              </fieldset>
               <?flashMessages();?>
              <fieldset id='actions'>
                <input  type='submit'
                        id='submit'
                        value='Log in'>
                <label>
                  <input  type='checkbox'
                          checked='checked'>
                  Keep me signed in
                </label>
               
              </fieldset>
              
            </form>
          </div>
        </li>
        <li id='signup'>
          <a href='signup.php'>Sign up</a>
        </li>
      </ul>";
    } else 
    {
      echo "<p style='name'>".$_SESSION['name']."</p>";
    }
      ?>
      </nav>
      <form method="POST" id="noteField">
        <label for="nTitle">Title </label
        ><input type="text" name="title" id="nTitle" placeholder="Add a Title" autocomplete="off"/>
        <label for="nField">Enter a note</label>
        <textarea name="note" id="nField" cols="30" rows="10" placeholder="Login To Save Notes"></textarea spellcheck="true">
        <button class="leaf-submit" type="submit">
          Add Note
          <i class="fa fa-plus-square"></i>
        </button>
      </form>
      <div id="container">
        <div id="leavesTop">Notes</div>
        <div id="leaves">
          <!-- <div class="leaf">
            <p class= "leafCont"></p>
            <button>Delete</button>
          </div> -->
    
      </div>
      <script>
      $(document).ready(function(){
        $('#login-trigger').click(function(){
          $(this).next('#login-content').slideToggle();
          $(this).toggleClass('active');
    
          if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
            else $(this).find('span').html('&#x25BC;')
          })
      });
      </script>
    </main>
    <script src="main.js"></script>
    <?php
      if (isset($_SESSION['user_id'])) {
        $stmt = $pdo->query("SELECT note_title, note FROM notes WHERE user_id = :xyz");
    $stmt->execute(array(":xyz" => $_SESSION['user_id']));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ( $row === false ) {
        $_SESSION['error'] = 'Empty';
        header( 'Location: index.php' ) ;
        return;
    }
    echo 
    foreach ( $rows as $row ) {
     echo '<script type="text/javascript">',
     'autoNote('.$row['note_title'].','.$row['note'].');',
      '</script>;'
    ;
    }
  }
    ?>
  </body>
</html>