<?php
include('../../includes/config/connect.php');


$sql = "SELECT * FROM `cards`;";

$res = $conn->query($sql);
$data = array();
while ($row = mysqli_fetch_assoc($res)) {
    $data[] = $row;
}

print_r(json_encode($data));

?>