<?php

include("sql.php");
$mysqli = GETSQLLink();
$email= $_POST['email'];
$password = $_POST['password'];

$query = "select * from user where email = '$email' and password ='$password'";
$res = $mysqli->query($query);
$row = $res->fetch_object();
$mysqli -> close();

if(!$row){

    header("Location: Login.php");

}else{
    header("Location: ../UI/matchmaking.php");
}

?>