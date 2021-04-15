<?php
session_start();
include("sql.php");
$mysqli = GETSQLLink();
$receiverID= $_POST['receiverID'];
$senderID = $_POST['senderID'];



$insert = "insert into matching (senderID, receiverID, matchSuccess)
        values('$senderID','$receiverID', 'N')";
$mysqli->query($insert);
$mysqli->close();
//$_SESSION['chatRequestSuccess'] = true;


//header("location: ../matching.php");
//echo '<script language="javascript">';
//echo 'alert("You have sent the chat request to the user")';
//echo '</script>';

echo '<script>
alert("You have sent the chat request to the user");
window.location.href="../matching.php";
</script>';

?>