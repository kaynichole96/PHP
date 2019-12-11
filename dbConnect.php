<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$connect = new mysqli("host", "root", "", "dbname");


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
