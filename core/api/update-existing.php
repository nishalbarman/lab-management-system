<?php
include '../../includes/config/connect.php';
include '../base.php';

$form_fname = $_POST["firstname"];
$form_age = $_POST['patient_age'];
$form_serial = $_POST['address1'];
$transac = $_POST['transaction_id'];
$reportname = $_POST['udf5'];

$part1 = $_POST['udf1'];
$part2 = $_POST['udf2'];
$part3 = $_POST['udf3'];
$part4 = $_POST['udf4'];

$sql = "select * from transactions where transaction_id = '$transac'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);
if ($count > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $db_name = $row['name'];
        $db_status = $row['status'];
        $db_serial = $row['serial'];
        $db_created = $row['pdf_created'];
    }
}

if (empty($db_name) && empty($db_status) && empty($db_serial) && empty($db_created)) {
    $data = array('success' => false, 'message' => "No details found for the transaction id");
    print_r(json_encode($data));
    exit;
} else {
    $url = $BASE_URL . "/templates/srv-repo/" . base64_decode($part1) . base64_decode($part2) . base64_decode($part3) . base64_decode($part4);
    if (empty($url)) {
        $data = array('success' => false, 'message' => "Inputs fields are missing");
        print_r(json_encode($data));
        exit;
    }

    $url_enc_str = str_replace(" ", "%20", $url);
    $shurl = file_get_contents('http://tinyurl.com/api-create.php?url=' . $url_enc_str);
    $fn_url = 'http://13.234.114.167:8000/api/render?url=' . $shurl . '&pdf.pageRanges=1&pdf.format=A4&emulateScreenMedia=false&pdf.margin.top=0cm&pdf.margin.right=0cm&pdf.margin.bottom=0cm&pdf.margin.left=0cm';

    $sql = "select * from reports where id = '$db_serial'";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    if ($count > 0) {
        $db_age = 0;
        while ($row = mysqli_fetch_assoc($res)) {
            $db_age = $row['patient_age'];
            $db_filename = $row['file_name'];
            $db_reportname = $row['file_name'];
        }

        if ($form_fname === $db_name && $form_age === $db_age && $form_serial === $db_serial) {
            $ch = curl_init($fn_url);
            $save_file_loc = "../../uploads/temp/temp.pdf";
            $fp = fopen($save_file_loc, 'wb');
            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_exec($ch);
            curl_close($ch);
            fclose($fp);
            $old_file = "../../uploads/" . $db_filename;
            $new_file = "../../uploads/temp/temp.pdf";
            unlink($old_file);
            rename($new_file, $old_file);
            $save_file_loc = $old_file;

            date_default_timezone_set("Asia/Calcutta");
            $date = 'Updated (' . $date = date('d/m/Y h:i:s a', time()) . ')';

            $sql = "UPDATE `transactions` SET `pdf_onserver`='$date'";
            mysqli_query($conn, $sql);

            $data = array('success' => true, 'message' => "Report Updated Successfully");
            print_r(json_encode($data));
            exit;
        } else {
            $data = array('success' => false, 'message' => "Invalid Transaction ID");
            print_r(json_encode($data));
            exit;
        }
    } else {
        $data = array('success' => false, 'message' => "Patient detailes is mismatched with previous report");
        print_r(json_encode($data));
        exit;
    }
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



// $sql = "INSERT INTO `payments` (`serial`, `name`, `status`, `amount`, `transaction_id`, `encoded_value`, `pdf_created`, `pdf_onserver`) VALUES ('$serial', '$firstname', '$status', '$amount', '$txnid', '$link_encode', 0, '$date');";
// $res = mysqli_query($link, $sql);