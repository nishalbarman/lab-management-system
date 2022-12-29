<?php

// Initialize database variables
$user = "root";
$pass = "";
$host = "localhost";
$database = "healthk";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>