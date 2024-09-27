<?php
session_start();
$servername = "localhost";
$username = "root";
$password = ""; // Update with your database password
$dbname = "hms"; // Update with your database name
$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>