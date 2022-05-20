<!-- <?php 
session_start();
$_SESSION["userid"] = '';
$_SESSION["name"] = '';
session_destroy;
// header("Location:login.php");
header("location:item.php");
?> -->



<?php
session_start(); //Start the current session
$_SESSION["userid"] = '';
$_SESSION["name"] = '';
session_destroy(); //Destroy it! So we are logged out now
header("Location:login.php");
?>


