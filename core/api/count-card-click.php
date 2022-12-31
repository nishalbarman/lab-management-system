<?php
include('../../includes/config/connect.php');

$file_id = $_GET['file_id'];
$user = $_GET['user'];

$sql = "INSERT INTO `views` (`card_id`, `user_id`) VALUES ($file_id, '$user')";

$res = $conn->query($sql);

// print_r(json_encode($data));

?>