<?php

session_start();
include("../../core/base.php");
include('../../includes/config/connect.php');

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
$udf5 = "Abo and Rh Grouping";

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

    $abs_eo = $_POST['abo'];
    $abs_ne = $_POST['rh'];

    $transaction = $_POST['transaction_id'];

    $return_url1 = "aborh.php?serial=" . $serial . "&patient_sample=" . $sample . "&report_date=" . $date . "&dr_name=" . $reffered . "&patient_name=" . $name;
    $return_url2 = "&patient_age=" . $age . "&patient_gender=" . $gender;
    $return_url3 = "&abo=" . $abs_eo . "&rh=" . $abs_ne;
    $return_url4 = "&create=Submit";


    $udf1 = base64_encode($return_url1);
    $udf2 = base64_encode($return_url2);
    $udf3 = base64_encode($return_url3);
    $udf4 = base64_encode($return_url4);

}

if ($udf1 === "no_url" || $udf2 === "no_url" || $udf3 === "no_url" || $udf4 === "no_url") {
    $action = "";
} else {
    $action = $BASE_URL . "/checkout/index.php";
}

?>
<html>

<head>
    <title>ABO and RH Grouping - Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/template-style.css">
    <link href="../../includes/css/headers.css" rel="stylesheet">
    <link href="../../includes/css/insert_card.css" rel="stylesheet">

</head>

<body onload="submitPayuForm()">
    <?php include '../../headers/header_admin.php'; ?>
    <div class="lets-do">
        <center>
            <br>
            <h class="header">ABO and RH Grouping<label>
        </center>
        <div class="form">
            <form action="<?php echo $action; ?>" method="POST" name="payuForm" id="reportForm">

                <input type="hidden" name="key" value="CY4YAH" />
                <input type="hidden" name="hash" value="" />
                <input type="hidden" name="txnid"
                    value="<?php echo substr(hash('sha256', mt_rand() . microtime()), 0, 20); ?>" />
                <input type="hidden" name="amount" value="<?php echo $amount; ?>" />
                <input type="hidden" name="firstname" id="firstname" value="<?php echo $name; ?>" />
                <input type="hidden" name="email" id="email" value="<?php echo $_SESSION['email']; ?>" />
                <input type="hidden" name="phone" value="<?php echo $_SESSION['phone']; ?>" />
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
                <input id="serial" type="number" placeholder="Serial number" value="<?php echo $serial; ?>"
                    name="p_serial" />
                <br>
                <label>Sample Lab No. :</label>
                <input id="sample" type="text" placeholder="Sample Number" value="<?php echo $sample; ?>" required
                    name="patient_sample" />
                <br>
                <label>Report Date. :</label>
                <input type="date" onfocus="this.showPicker()" value="<?php echo $date; ?>" required
                    name="report_date" />
                <br>
                <label>Reffered By:</label>
                <input id="report_date" type="text" placeholder="Dr Name" value="<?php echo $reffered; ?>" required
                    name="dr_name" />
                <br>
                <label>Name:</label>
                <input id="name" type="text" placeholder="Enter Name" value="<?php echo $name; ?>" required
                    name="patient_name" />
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
                <select id="gender" name="patient_gender" value="<?php echo $gender; ?>" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <br>
                <h3>Report details</h3>

                <label>A.B.O Group</label>
                <input id="abo" type="text" step="any" min="0" placeholder="ABO Group" name="abo"
                    value="<?php echo $abs_eo; ?>" required />
                <br>
                <label>Rh Group</label>
                <input id="rh" type="text" step="any" min="0" placeholder="Rh Group" name="rh"
                    value="<?php echo $abs_ne; ?>" required />
                <br>
                <label>Transaction ID (For updation of report only)</label>
                <input id="tranac" type="text" placeholder="Transaction ID" name="transaction_id"
                    value="<?php echo $transaction; ?>" />

                <br>
                <br>
                <?php if ($udf1 !== "no_url") { ?>
                <button type="button" class="button" data-bs-toggle="modal" data-bs-target="#reportNewUpdate"
                    submit-new>Submit</button>
                <?php } else { ?>
                <input type="submit" name="create" class="button" submit-old />
                <?php } ?>
            </form>

        </div>
    </div>

</body>

</html>