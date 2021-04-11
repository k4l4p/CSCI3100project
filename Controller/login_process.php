<?php
session_start();


include("sql.php");
$mysqli = GETSQLLink();
$email= $_POST['email'];
$password = $_POST['password'];

$query = "select * from user where email = '$email' and password ='$password'";
$res = $mysqli->query($query);
if(!$res){
    echo $email.$password;
    $mysqli->close();
    //header("Location: ../login.php");

}else{
    $row = $res->fetch_object();
    $mysqli->close();
    session_destroy();
    session_start();
    $_SESSION["loggedin"] = true;
    $_SESSION["id"] = $row->userID;
    $_SESSION["username"] = $row->username;                                                  
    header("location: ../matchmaking.php");
}

?>