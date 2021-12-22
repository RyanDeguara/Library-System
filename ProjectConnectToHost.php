<?php
$servername = "localhost";
$username = "ryan";
$password = "password1";
$dbname = "projectdb";

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>