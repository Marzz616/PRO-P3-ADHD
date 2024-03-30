<?php
function getDBConnection() {
    $servername = DB_HOST;
    $username = DB_USER;
    $password = DB_PASS;
    $dbname = DB_NAME;

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
?>