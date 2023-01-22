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
	$ige = $_POST['ige_val'];

	$transaction = $_POST['transaction_id'];

	$return_url1 = "hba1c.php?serial=" . $serial . "&patient_sample=" . $sample . "&report_date=" . $date;
	$return_url2 = "&dr_name=" . $reffered . "&patient_name=" . $name . "&patient_age=" . $age;
	$return_url3 = "&patient_gender=" . $gender . "&res=" . $ige . "&create=Submit";

	$udf1 = base64_encode($return_url1);
	$udf2 = base64_encode($return_url2);
	$udf3 = base64_encode($return_url3);
	$udf5 = "HbA1C Report";

}

if ($udf1 === "no_url" || $udf2 === "no_url" || $udf3 === "no_url") {
	$action = "";
} else {
	$action = $BASE_URL . "/checkout/index.php";
}


?>
<html>
<head>
    <title>HbA1C Report Generate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/template-style.css">
    <link href="../../includes/css/headers.css" rel="stylesheet">
    <link href="../../includes/css/insert_card.css" rel="stylesheet">
</head>

<body>
    <?php include '../../headers/header_admin.php'; ?>
    <div class="lets-do">
        <center>
            <br>
            <h class="header">HbA1C Report<label>
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
                <input type="number" placeholder="Enter Age" value="<?php echo $_age; ?>" name="_age" />
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
                <label>HbA1C :</label>
                <input type="number" placeholder="HbA1c Result" step="any" min="0" value="<?php echo $ige; ?>"
                    name="ige_val" />
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
    </div>
    </div>

</body>

</html>