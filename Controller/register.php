<?php


include("sql.php");
$mysqli = GETSQLLink();
//extract user register data from POST request
$email = trim($_POST['email']);
$username = trim($_POST['username']);
$password = trim($_POST['password']);
//duplicate code: check if their is entry in user table
$query = "SELECT * FROM user";
$res = $mysqli->query($query);
if($res->num_rows > 0){
    $query = "SELECT MAX(userID) as max FROM user";
    $res = $mysqli->query($query);
    $row = $res->fetch_object();
    $id = $row->max +1 ;
    //new userID = lastuserID +1
    //However, userID in sql is set to be auto-incremetal
    //Therefore these codes more duplicate

}else{
    $id = 0 ;
}
//add new user entry to table
$insert = "insert into user (userID, username, password, email, avatar)
        values($id, '$username','$password', '$email', 'uploadimages/default.png')";
$mysqli->query($insert);
$mysqli->close();
echo "<div class='msg'> User Registration Complete</div>";
header("location: ../matchmaking.php");
?>
