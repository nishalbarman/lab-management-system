<?php
include "connect.php";

$sql = "select maintenance from maintenance where 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $main = $row["maintenance"];
    }
}

if (!($_SESSION["role"] == 1)) {
    if ($main === "true") {
        echo "<center><h1 style='color: red; vertical-align: top;' >** Site is under maintenance, please try after some time. **</h1>";
        exit;
    }
}