<?php include '../../includes/config/connect.php';

$title = $_POST['card_title'];
$price = $_POST['card_price'];
$top_color = $_POST['card_top_color'];
$bottom_color = $_POST['card_bottom_color'];
$btn = $_POST['card_btn'];
$url = $_POST['card_url'];
$new_label = $_POST['new_label'];
$keywords = $_POST['card_keywords'];

$sql = "INSERT INTO `cards` (`cardname`,`price`,`url`,`color_f`,`color_s`,`btn_name`, `keywords`, `new`) VALUES (?,?,?,?,?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sissssss', $title, $price, $url, $top_color, $bottom_color, $btn, $keywords, $new_label);
$stmt->execute();

if ($stmt->get_result()) {
    $data = array('success' => true);
    print_r(json_encode($data));
} else {
    $data = array('success' => false);
    print_r(json_encode($data));
}


?>