<?php
function GetSQLLink() {
    $mysqli = new mysqli("localhost", "root", "", "sakura2");
    if ($mysqli-> connect_errno) {
        echo "Cannot connect to database server! Please check the connection.";
        exit();
    }
    return $mysqli;
}

?>
