<?php
session_start();
 
$_SESSION = array();
//destroy user credential 
session_destroy();

header("location: ../login.php");
exit;
?>