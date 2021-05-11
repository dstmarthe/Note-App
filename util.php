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
?>