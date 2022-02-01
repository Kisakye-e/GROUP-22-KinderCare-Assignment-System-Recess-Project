<!--exiting out of the login session-->

<?php
    session_start();
    unset($_SESSION["emailAddress"]);
    unset($_SESSION["firstName"]);
    header("Location:index.php");
?>
