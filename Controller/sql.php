<?php
//function defined to link to the sql server
function GetSQLLink() {
    $mysqli = new mysqli("localhost", "root", "123456", "sakura");
    if ($mysqli-> connect_errno) {
        echo "Cannot connect to database server! Please check the connection.";
        exit();
    }
    return $mysqli;
}

?>
