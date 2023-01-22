<?php

session_start();

include '../../includes/config/connect.php';
$local = [
    // IPv4 address
    '127.0.0.1',
    'localhost',

    // IPv6 address
    '::1'
];

if (in_array($_SERVER['REMOTE_ADDR'], $local)) {
    $BASE_URL = "http://65.0.101.158";
} else {
    $BASE_URL = "http://65.0.101.158";
}

// $token = getToken($conn);
$serial = getSerial($conn);
$serial_new = $_POST['address1'];
$txnid = $_POST['txnid'];
$url_enc = $_POST['link'];
// $delete = $_POST['delete'];
$url = base64_decode($url_enc);
$p_name = $_POST['name'];
$p_age = $_POST['age'];
$reportname = $_POST['reportname'];
$size = 0;
$username = $_SESSION['name'];

if (empty($url)) {
    echo "<h1 style='color: red'><center>Something went wrong</center></h1>";
    exit;
}

if (empty($p_name)) {
    $p_name = "Not Declared";
    $p_age = "N/A";
}

$filename = time() . '_' . $p_name . '.pdf';

$url_enc_str = str_replace(" ", "%20", $url);
$shurl = file_get_contents('http://tinyurl.com/api-create.php?url=' . $url_enc_str);
$fn_url = 'http://35.154.35.109:8000/api/render?url=' . $shurl . '&pdf.pageRanges=1&pdf.format=A4&emulateScreenMedia=false&pdf.margin.top=0cm&pdf.margin.right=0cm&pdf.margin.bottom=0cm&pdf.margin.left=0cm';

$sq = "select * from reports where id = '$serial_new'";
$rowCheck = mysqli_query($conn, $sq);
$count = mysqli_num_rows($rowCheck);

if ($count > 0) {

    $ch = curl_init($fn_url);
    $save_file_loc = "../../uploads/temp/temp.pdf";
    $fp = fopen($save_file_loc, 'wb');
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    curl_close($ch);
    fclose($fp);

    while ($row = mysqli_fetch_assoc($rowCheck)) {
        $file = $row["file_name"];
    }
    $old_file = "../../uploads/repo/" . $file;
    $new_file = "../../uploads/temp/temp.pdf";
    $mergedName = mergePdf($old_file, $new_file);
    unlink($old_file);
    unlink($new_file);
    rename($mergedName, $old_file);
    $save_file_loc = $old_file;

} else {
    $ch = curl_init($fn_url);
    $save_file_loc = '../../uploads/repo/' . $filename;
    $fp = fopen($save_file_loc, 'wb');
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    curl_close($ch);
    fclose($fp);

    date_default_timezone_set("Asia/Calcutta");
    $date = 'Available (' . $date = date('d/m/Y h:i:s a', time()) . ')';

    $sql = "INSERT INTO reports (patient_name, patient_age, file_name, size, downloads, created_by, creation_date) VALUES ('$p_name', '$p_age', '$filename', $size, 0, '$username', '$date')";
    $conn->query($sql);
    // }
}

$back_up = '../../backups/' . $serial . '_' . $p_name;
file_put_contents($back_up, base64_decode($url_enc) . '                                                  ' . $url_enc);

date_default_timezone_set("Asia/Calcutta");
$date = 'Available (' . $date = date('d/m/Y h:i:s a', time()) . ')';

$sql = "UPDATE `transactions` SET `pdf_created` = 1, `pdf_onserver` = '$date' WHERE serial = '$serial_new'";
$res = mysqli_query($conn, $sql);

header("location:  $BASE_URL/check/$save_file_loc");

function mergePdf($firstPdf, $secondPdf)
{
    $target_url = 'http://35.154.35.109:3000/mergepdf';

    $fPdf = curl_file_create($firstPdf);
    $sPdf = curl_file_create($secondPdf);

    $post = array('pdf1' => $fPdf, 'pdf2' => $sPdf);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $target_url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    $fp = fopen('../../uploads/merge/merged.pdf', 'wb');
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    curl_close($ch);
    fclose($fp);
    return '../../uploads/merge/merged.pdf';
}

function getToken($conn)
{
    $sql = "SELECT * FROM reports";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $token = $row["token"];
        }
    }
    return $token;
}

function getSerial($link)
{
    $selectMaxID = 'SELECT id FROM reports ORDER BY id DESC LIMIT 1';
    $maxIdResult = mysqli_query($link, $selectMaxID); //run query

    if (mysqli_num_rows($maxIdResult) > 0) {
        while ($maxid = mysqli_fetch_assoc($maxIdResult)) {
            $serial = $maxid["id"];
        }
    }
    return $serial;
}

function checkMain($conn)
{
    $sql = "select maintenance from maintenance where 1";
    $results = $conn->query($sql);
    if ($results->num_rows > 0) {
        while ($row = $results->fetch_assoc()) {
            $main = $row["maintenance"];
        }
    }
    return $main;
}