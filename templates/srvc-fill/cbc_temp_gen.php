<?php

session_start();
// include('../../headers/header_admin.php');
include("../../core/base.php");
include('../../includes/config/connect.php');

$sample = '';
$name = '';
$_age = '';
$age = '';
$gender = '';
$reffered = '';
$date = '';
$ige = '';
$tlc = '';
$neu = '';
$lym = '';
$mono = '';
$eos = '';
$bas = '';
$hb = '';
$plc = '';
$rbc = '';
$pcv = '';
$mcv = '';
$mch = '';
$mchc = '';
$rdw = '';
$transaction = '';

$selectMaxID = 'SELECT id FROM reports ORDER BY id DESC LIMIT 1';
$maxIdResult = mysqli_query($conn, $selectMaxID); //run query

if (mysqli_num_rows($maxIdResult) > 0) {
    while ($maxid = mysqli_fetch_assoc($maxIdResult)) {
        $def_serial = $maxid["id"] + 1;
    }
}

$action = "";
$udf1 = "no_url";
$udf2 = "no_url";
$udf3 = "no_url";
$udf4 = "no_url";

if (isset($_POST['create'])) {
    if (empty($_POST['p_serial'])) {
        $serial = $def_serial;
    } else {
        $serial = $_POST['p_serial'];
    }
    $sample = $_POST['patient_sample'];
    $name = $_POST['patient_name'];
    $_age = $_POST['_age'];
    $age = $_age . ' ' . $_POST['Y_M'];
    $gender = $_POST['patient_gender'];
    $reffered = $_POST['dr_name'];
    $date = $_POST['report_date'];
    // $ige = $_POST['ige_val'];

    $tlc = $_POST['tlc'];
    $neu = $_POST['neu'];
    $lym = $_POST['lym'];
    $mono = $_POST['mono'];
    $eos = $_POST['eos'];
    $bas = $_POST['bas'];
    $hb = $_POST['hb'];
    $plc = $_POST['plc'];
    $rbc = $_POST['rbc'];
    $pcv = $_POST['pcv'];
    $mcv = $_POST['mcv'];
    $mch = $_POST['mch'];
    $mchc = $_POST['mchc'];
    $rdw = $_POST['rdw'];

    $transaction = $_POST['transaction_id'];

    $return_url1 = "cbc.php?serial=" . $serial . "&patient_sample=" . $sample . "&report_date=" . $date . "&dr_name=" . $reffered . "&patient_name=" . $name;
    $return_url2 = "&patient_age=" . $age . "&patient_gender=" . $gender . "&tlc=" . $tlc . "&neu=" . $neu . "&lym=" . $lym;
    $return_url3 = "&mono=" . $mono . "&eos=" . $eos . "&bas=" . $bas . "&hb=" . $hb . "&plc=" . $plc . "&rbc=" . $rbc . "&pcv=" . $pcv;
    $return_url4 = "&mcv=" . $mcv . "&mch=" . $mch . "&mchc=" . $mchc . "&rdw=" . $rdw . "&create=Submit";


    $udf1 = base64_encode($return_url1);
    $udf2 = base64_encode($return_url2);
    $udf3 = base64_encode($return_url3);
    $udf4 = base64_encode($return_url4);
    $udf5 = "Complete Blood Count Template";
}

if ($udf1 === "no_url" || $udf2 === "no_url" || $udf3 === "no_url" || $udf4 === "no_url") {
    $action = "";
} else {
    $action = $BASE_URL . "/checkout/index.php";
}


?>
<html>

<head>
    <title>Complete Blood Count - Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/template-style.css">
    <link href="../../includes/css/headers.css" rel="stylesheet">
    <link href="../../includes/css/insert_card.css" rel="stylesheet">

    <script>
    let hash = '<?php echo $udf1 ?>';

    function submitReportForm() {
        if (hash != 'no_url') {
            document.querySelector("[submit-old]").style.display = "none";
            document.querySelector("[submit-new]").style.display = "block";
        } else {
            return;
        }
    }
    </script>
</head>

<body onload="submitReportForm()">
    <?php include '../../headers/header_admin.php'; ?>
    <div class="lets-do">
        <center>
            <br>
            <h class="header">CBC Report<label>
        </center>
        <div class="form">
            <form action="<?php echo $action; ?>" method="POST" name="payuForm" id="reportForm">

                <input type="hidden" name="key" value="CY4YAH" />
                <input type="hidden" name="hash" value="" />
                <input type="hidden" name="txnid"
                    value="<?php echo substr(hash('sha256', mt_rand() . microtime()), 0, 20); ?>" />
                <input type="hidden" name="amount" value="22" />
                <input type="hidden" name="firstname" id="firstname" value="<?php echo $name; ?>" />
                <input type="hidden" name="email" id="email" value="nishalbarman@gmail.com" />
                <input type="hidden" name="phone" value="9476887301" />
                <input type="hidden" value="<?php echo $age; ?>" name="productinfo">
                <input type="hidden" name="surl" value="<?php echo $success_url; ?>" size="64" />
                <input type="hidden" name="furl" value="<?php echo $failure_url; ?>" size="64" />
                <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
                <input type="hidden" name="udf1" value="<?php echo $udf1; ?>" />
                <input type="hidden" name="udf2" value="<?php echo $udf2; ?>" />
                <input type="hidden" name="udf3" value="<?php echo $udf3; ?>" />
                <input type="hidden" name="udf4" value="<?php echo $udf4; ?>" />
                <input type="hidden" name="udf5" value="<?php echo $udf5; ?>" />
                <input type="hidden" name="address1" value="<?php echo $serial; ?>" />

                <h3>Patient details</h3>
                <label>Serial No. :</label>
                <input type="number" placeholder="Serial number" value="<?php echo $serial; ?>" name="p_serial" />
                <br>
                <label>Sample Lab No. :</label>
                <input type="text" placeholder="Sample Number" value="<?php echo $sample; ?>" name="patient_sample" />
                <br>
                <label>Report Date. :</label>
                <input type="date" onfocus="this.showPicker()" value="<?php echo $date; ?>" name="report_date" />
                <br>
                <label>Reffered By:</label>
                <input type="text" placeholder="Dr Name" value="<?php echo $reffered; ?>" name="dr_name" />
                <br>
                <label>Name:</label>
                <input type="text" placeholder="Enter Name" value="<?php echo $name; ?>" name="patient_name" />
                <br>
                <label>Age</label>
                <input id="age" type="hidden" value="<?php echo $age; ?>" name="patient_age" />
                <input type="number" placeholder="Enter Age" value="<?php echo $_age; ?>" required name="_age" />
                <br>
                <label>Years/Months</label>
                <select name="Y_M" required>
                    <option value="Years">Years</option>
                    <option value="Months">Months</option>
                </select>
                <br>
                <label>Gender</label>
                <br>
                <select name="patient_gender" value="<?php echo $gender; ?>">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>

                <br>

                <h3>Report details</h3>


                <label>TLC :</label>
                <input type="text" placeholder="Enter TLC" value="<?php echo $tlc; ?>" name="tlc" />
                <br>
                <label>Neutrophil :</label>
                <input type="number" placeholder="Enter Neutrophil" value="<?php echo $neu; ?>" name="neu" />
                <br>
                <label>Lymphocyte :</label>
                <input type="text" placeholder="Enter Lymphocyte" value="<?php echo $lym; ?>" name="lym" />
                <br>
                <label>Monocyte :</label>
                <input type="number" placeholder="Enter Monocyte" value="<?php echo $mono; ?>" name="mono" />
                <br>
                <label>Eosinophil:</label>
                <input type="number" placeholder="Enter Eosinophil" value="<?php echo $eos; ?>" name="eos" />
                <br>
                <label>Basophil :</label>
                <input type="number" placeholder="Enter Basophil " value="<?php echo $bas; ?>" name="bas" />
                <br>
                <label>Hb(%):</label>
                <input type="number" step="any" min="0" placeholder="Enter Hb" value="<?php echo $hb; ?>" name="hb" />
                <br>
                <label>Platelet count:</label>
                <input type="number" step="any" min="0" placeholder="Enter Platelet" value="<?php echo $plc; ?>"
                    name="plc" />
                <br>
                <label>RBC count:</label>
                <input type="number" step="any" min="0" placeholder="Enter RBC" value="<?php echo $rbc; ?>"
                    name="rbc" />
                <br>
                <label>PCV:</label>
                <input type="number" step="any" min="0" placeholder="Enter PCB" value="<?php echo $pcv; ?>"
                    name="pcv" />
                <br>
                <label>MCV:</label>
                <input type="number" step="any" min="0" placeholder="Enter MCV" value="<?php echo $mcv; ?>"
                    name="mcv" />
                <br>
                <label>MCH:</label>
                <input type="number" step="any" min="0" placeholder="Enter MCH" value="<?php echo $mch; ?>"
                    name="mch" />
                <br>
                <label>MCHC:</label>
                <input type="number" step="any" min="0" placeholder="Enter MCHC" value="<?php echo $mchc; ?>"
                    name="mchc" />
                <br>
                <label>RDW-CV:</label>
                <input type="number" step="any" min="0" placeholder="Enter RDW-CV" value="<?php echo $rdw; ?>"
                    name="rdw" />
                <br>
                <label>Transaction ID (For updation of report only)</label>
                <input id="tranac" type="text" placeholder="Transaction ID" name="transaction_id"
                    value="<?php echo $transaction; ?>" />

                <br>
                <br>
                <input type="submit" name="create" class="button" submit-old />
            </form>
            <?php if ($udf1 !== "no_url") { ?>
            <button type="button" class="button" data-bs-toggle="modal" data-bs-target="#reportNewUpdate"
                submit-new>Submit</button>
            <?php } ?>
        </div>
    </div>
    </div>
    </div>



</body>

</html>