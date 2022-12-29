<?php

// Initialize database variables
$username = "root";
$password = "";
$servername = "localhost";
$dbname = "healthk";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>