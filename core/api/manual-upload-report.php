<?php
session_start();
include("../../core/base.php");

if (isset($_SESSION['loggedin'])) { // If season not exist
    if ($_SESSION['role'] === 0) { // If technician
        header("location: ../../index.php");
        exit;
    } else if ($_SESSION['role'] === 2) { // If normal user
        header("location: ../../index.php");
        exit;
    }
}

include '../../includes/config/connect.php';

$serial_no = $_POST['serial_no'];
$serial_no = (int) $serial_no;
$patient_name = ucwords(strtolower($_POST['patient_name']));

// $patient_name = str_replace(' ', '_', $patient_name);
$number_age = $_POST['age'];
$age_back = $_POST['age_back'];

$final_age = $number_age . " " . $age_back;
$gender = $_POST['gender'];
$pdf_file = $_FILES['report_pdf']['tmp_name'];
$created_by = $_SESSION['name'];

$filename = time() . '_' . $patient_name . '.pdf';
$filename = str_replace(' ', '_', $filename);
$rowCheck = '';
$count = -1;
if (isset($serial_no)) {
    $sql = "SELECT * FROM `reports` WHERE id=$serial_no";
    $rowCheck = $conn->query($sql);
    $count = $rowCheck->num_rows;
} else {
    $count = -1;
}

if ($count > 0) {

    $target_url = 'http://13.234.114.167:3000/mergepdf';

    $new_file = "../../uploads/merge/temp.pdf";
    if (move_uploaded_file($_FILES['report_pdf']['tmp_name'], $new_file)) {
        $file = '';
        while ($row = $rowCheck->fetch_assoc()) {
            $file = $row["file_name"];
        }
        $old_file = "../../uploads/reports/" . $file;

        $fPdf = curl_file_create($old_file);
        $sPdf = curl_file_create($new_file);

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
        $mergedName = '../../uploads/merge/merged.pdf';
        unlink($old_file);
        unlink($new_file);
        rename($mergedName, $old_file);
        $save_file_loc = $old_file;
        $data = array('success' => true);
        print_r(json_encode($data));
    } else {
        $data = array('success' => false);
        print_r(json_encode($data));
    }

} else {

    $save_file_loc = '~/uploads/reports/' . $filename;

    if (move_uploaded_file($_FILES['report_pdf']['tmp_name'], '../../uploads/reports/' . $filename)) {

        date_default_timezone_set("Asia/Calcutta");
        $date = date('d/m/Y h:i:s a', time());
        $size = filesize('../../uploads/reports/' . $filename);

        $sql = "INSERT INTO reports (patient_name, patient_age, file_name, size, downloads, created_by, creation_date) VALUES ('$patient_name', '$final_age', '$filename', $size, 0, '$created_by', '$date')";

        if ($conn->query($sql)) {
            $data = array('success' => true);
            print_r(json_encode($data));
        } else {
            $data = array('success' => false);
            print_r(json_encode($data));
        }

    } else {
        $data = array('success' => false);
        print_r(json_encode($data));
    }


}


?>