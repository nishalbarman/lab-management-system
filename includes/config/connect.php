<?php

// Initialize local database variables
$username = "root";
$password = "";
$servername = "localhost";
$dbname = "healthk";

// Initialize server database variables
// $username = "healthkind";
// $password = "hk_new21";
// $servername = "localhost";
// $dbname = "healthkind_new";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>