<?php
session_start();

include("sql.php");

$mysqli = GETSQLLink();
$senderID= $_POST['senderID'];
$receiverID = $_POST['receiverID'];


$query = "UPDATE matching set matchSuccess = 'Y' where senderID=".$senderID." and receiverID=".$receiverID." ;";

$res = $mysqli -> query($query);
$mysqli->close();
echo '<script>
alert("Congratulations! You have a new match!");
window.location.href="../matching.php";
</script>';
?>