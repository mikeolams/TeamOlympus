<?php 
// remove the user session data
// then redirect to login screen
unset($_SESSION['user']);
header("location: login.php");
?>