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
$patient_name = $_POST['patient_name'];
$number_age = $_POST['age'];
$age_back = $_POST['age_back'];

$final_age = $number_age . " " . $age_back;
$gender = $_POST['gender'];
$pdf_file = $_FILES['report_pdf']['tmp_name'];
$created_by = $_SESSION['name'];

$filename = time() . '_' . str_replace(' ', '_', $patient_name) . '.pdf';

// print_r(json_encode(array('name' => $patient_name, 'age' => $final_age, 'gender' => $gender, 'pdf_temp' => $pdf_file, 'createdby' => $created_by, 'mainfilename' => $filename)));
// exit;

// Here I need to make changes

$sql = "select * from reports where id = '$serial_no'";
$rowCheck = mysqli_query($conn, $sql);
$count = mysqli_num_rows($rowCheck);

if ($count > 0) {

    $ch = curl_init($fn_url);
    $save_file_loc = "temp.pdf";
    $fp = fopen($save_file_loc, 'wb');
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    curl_close($ch);
    fclose($fp);

    while ($row = mysqli_fetch_assoc($rowCheck)) {
        $file = $row["file_name"];
    }
    $old_file = "../../uploads/reports/" . $file;
    $new_file = "temp.pdf";
    $mergedName = mergePdf($old_file, $new_file);
    unlink($old_file);
    unlink($new_file);
    rename($mergedName, $old_file);
    $save_file_loc = $old_file;

} else {
    $save_file_loc = '../../uploads/reports/' . $filename;
    if (move_uploaded_file($pdf_file, $save_file_loc)) {
        // $sql = "INSERT INTO reports (patient_name, patient_age, file_name, size, downloads) VALUES ('$patient_name', '$final_age', '$filename', $size, 0)";

        date_default_timezone_set("Asia/Calcutta");
        $date = date('d/m/Y h:i:s a', time());

        $size = 0;
        // $sql = "INSERT INTO reports (patient_name, patient_age, file_name, size, downloads, created_by, creation_date) VALUES (?,?,?,?,?,?,?)";
        // $stmt = $conn->prepare($sql);
        // $stmt->bind_param('sssiisd', $patient_name, $final_age, $filename, $size, $size, $created_by, $date);
        // $stmt->execute();

        $sql = "INSERT INTO reports (patient_name, patient_age, file_name, size, downloads, created_by, creation_date) VALUES ('$patient_name', '$final_age', '$filename', $size, 0, '$created_by', '$date')";

        $result = $conn->query($sql);

        $data = array('success' => $result);
        print_r(json_encode($data));
        exit;
        // $data = array('success' => $stmt->get_warnings());
        // print_r(json_encode($data));
        // exit;
    }

    // if (checkMain($conn) === "false") {

    // }
}





header("location: $save_file_loc");

function mergePdf($firstPdf, $secondPdf)
{
    $target_url = 'http://13.234.114.167:3000/mergepdf';

    $fPdf = curl_file_create($firstPdf);
    $sPdf = curl_file_create($secondPdf);

    $post = array('pdf1' => $fPdf, 'pdf2' => $sPdf);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $target_url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    $fp = fopen('merged.pdf', 'wb');
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    curl_close($ch);
    fclose($fp);
    return 'merged.pdf';
}


// Changes need to be done above


$data = array('success' => true);
print_r(json_encode($data));
exit;


?>