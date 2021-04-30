<?php
session_start();


include("sql.php");
$mysqli = GETSQLLink();
$email= $_POST['email'];
$password = $_POST['password'];

//check if email and password esixt in table
$query = "select * from user where email = '$email' and password ='$password'";
$res = $mysqli->query($query);
if($res->num_rows <= 0){ //if no entry, return to login page
    //echo $email.$password;
    $mysqli->close();
    header("Location: ../login.php");

}else{
    $row = $res->fetch_object();
    include ('../Chat.php');
	$chat = new Chat();
    session_destroy();
    //create new session 
    session_start();
    //add credential for current login user
    $_SESSION["loggedin"] = true;
    $_SESSION["id"] = $row->userID;
    $_SESSION["username"] = $row->username;    
    //update online status
	$chat->updateUserOnline($row->userID, 1);
	$lastInsertId = $chat->insertUserLoginDetails($row->userID);
	$_SESSION['login_details_id'] = $lastInsertId;        
    $mysqli->close();
    //redirect to matchmaking page
    header("location: ../matchmaking.php");
}

?>