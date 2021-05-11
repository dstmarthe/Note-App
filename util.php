<?php
function flashMessages() {
    if ( isset($_SESSION['error']) ) {
        echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
        unset($_SESSION['error']);
    }
    if ( isset($_SESSION['success']) ) {
        echo('<p style="color: green;">'.htmlentities($_SESSION['error'])."</p>\n");
        unset($_SESSION['success']);
    }
}
if (isset($_POST['logout']))
{
    header( 'Location: logout.php' ) ;
return;
}
if (isset($_POST['signup']))
{
    header( 'Location: signup.php' ) ;
return;
}
function navbar() {
    if ( ! isset($_SESSION['user_id'])) {
        echo 
        "<ul>",
      "<li id='login'>",
       "<a id='login-trigger' href='#'>",
          "Log in <i class='fa fa-caret-down' aria-hidden='true'></i>",
        "</a>",
        "<div id='login-content'>",
          "<form>",
            "<fieldset id='inputs'>",
              "<input  id='username'",
                      "type='email'",
                      "name='email'",
                      "placeholder='Your email address'",
                      "required>",
              "<input  id='password'",
                      "type='password'",
                      "name='pass'",
                      "placeholder='Password'",
                      "required>",
            "</fieldset>",
            "<fieldset id='actions'>
              <input  type='submit'
                      id='submit'
                      value='Log in'>
              <label>
                <input  type='checkbox'
                        checked='checked'
                        aria-checked='true'>
                Keep me signed in
              </label>
             
            </fieldset>
            
          </form>
        </div>
      </li>
      <li id='signup'>
        <form method='post'><a name='signup' href='#'>Sign up</a></form>
      </li>
    </ul>";
  } else 
  {
    echo "<span id='name'>Welcome ".$_SESSION['name']."</span><button name='logout' id='logout'>    logout</button>";
  }
  
}
?>