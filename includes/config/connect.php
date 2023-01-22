<?php

// Declaring array containig localhost ip's

$local = [
    // IPv4 address
    '127.0.0.1',
    'localhost',

    // IPv6 address
    '::1'
];

// Checking if our host is local or remote

if (in_array($_SERVER['REMOTE_ADDR'], $local)) {
    // Initialize local database variables
    $username = "root";
    $password = "";
    $servername = "localhost";
    $dbname = "healthk";
} else {
    // Initialize remote database variables
    $username = "healthkind";
    $password = "hk_new21";
    $servername = "localhost";
    $dbname = "healthkind";
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>