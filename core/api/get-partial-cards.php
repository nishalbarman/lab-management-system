<?php
include('../../includes/config/connect.php');

session_start();
$email = $_SESSION['email'];

$sql = "SELECT * FROM `cards` INNER JOIN (SELECT card_id, COUNT(*) as view_count FROM views WHERE user_id = '$email' GROUP BY card_id ORDER BY view_count DESC LIMIT 4) as v ON v.card_id = cards.id";
// $sql = "SELECT * FROM cards
// INNER JOIN (
//     SELECT card_id, COUNT(*) as view_count
//     FROM views
//     WHERE user_id = '$email'
//     GROUP BY card_id
//     ORDER BY view_count DESC
//     LIMIT 6
// ) as v ON v.card_id = cards.id";


$res = $conn->query($sql);
$data = array();
while ($row = mysqli_fetch_assoc($res)) {
    $data[] = $row;
}

print_r(json_encode($data));

?>