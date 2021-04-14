<?php
session_start();


include("sql.php");
$mysqli = GETSQLLink();
$email= $_POST['email'];
$password = $_POST['password'];

$query = "select * from user where email = '$email' and password ='$password'";
$res = $mysqli->query($query);
if($res->num_rows <= 0){
    echo $email.$password;
    $mysqli->close();
    header("Location: ../login.php");

}else{
    $row = $res->fetch_object();
    include ('../Chat.php');
	$chat = new Chat();
    session_destroy();
    session_start();
    $_SESSION["loggedin"] = true;
    $_SESSION["id"] = $row->userID;
    $_SESSION["username"] = $row->username;    
	$chat->updateUserOnline($row->userID, 1);
	$lastInsertId = $chat->insertUserLoginDetails($row->userID);
	$_SESSION['login_details_id'] = $lastInsertId;        
    $mysqli->close();
    header("location: ../matchmaking.php");
}

?>