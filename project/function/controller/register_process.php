<?php


include("sql.php");
$mysqli = GETSQLLink();
$email = trim($_POST['email']);
$gender = trim($_POST['gender']);
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$query = "SELECT * FROM user";
$res = $mysqli->query($query);
if($res->num_rows > 0){
    $query = "SELECT MAX(userID) as max FROM user";
    $res = $mysqli->query($query);
    $row = $res->fetch_object();
    $id = $row->max +1 ;

}else{
    $id = 0 ;
}

$insert = "insert into user (userID, username, email, gender, password, isfirstLogin)
        values($id, '$username','$email', '$gender','$password', 'Y')";
$mysqli->query($insert);
$mysqli->close();
echo "<div class='msg'> User Registration Complete</div>";


//header("location: ../matchmaking.php");
?>