<?php
include("../core/base.php");
include '../includes/config/connect.php';

$action = $BASE_URL . "/core/engine/main-engine.php";

$status = $_POST["status"];
$firstname = $_POST["firstname"];
$amount = $_POST["amount"];
$txnid = $_POST["txnid"];
$posted_hash = $_POST["hash"];
$key = $_POST["key"];
$productinfo = $_POST["productinfo"];
$email = $_POST["email"];
$salt = "72toOcfuXCBizlYLEGqvVYeIUnXLOGsY";

$serial = $_POST['address1'];
$part1 = $_POST['udf1'];
$part2 = $_POST['udf2'];
$part3 = $_POST['udf3'];
$part4 = $_POST['udf4'];
$udf5 = $_POST['udf5'];

$filename = time() . '_' . $firstname . 'pdf';

$url = $BASE_URL . "/templates/srv-repo/" . base64_decode($part1) . base64_decode($part2) . base64_decode($part3) . base64_decode($part4);
$link_encode = base64_encode($url);

date_default_timezone_set("Asia/Calcutta");
$date = 'Not Available (' . $date = date('d/m/Y h:i:s a', time()) . ')';

$sql = "INSERT INTO `transactions` (`serial`, `name`, `status`, `amount`, `transaction_id`, `encoded_value`, `pdf_created`, `pdf_onserver`, `report_name`) VALUES ('$serial', '$firstname', '$status', '$amount', '$txnid', '$link_encode', 0, '$date', '$udf5');";
$res = mysqli_query($conn, $sql);

if (isset($_POST["additionalCharges"])) {
    $additionalCharges = $_POST["additionalCharges"];
    $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '||||||' . $udf5 . '|' . $part4 . '|' . $part3 . '|' . $part2 . '|' . $part1 . '|' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
} else {
    $retHashSeq = $salt . '|' . $status . '||||||' . $udf5 . '|' . $part4 . '|' . $part3 . '|' . $part2 . '|' . $part1 . '|' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
}

$hash = hash("sha512", $retHashSeq);
if ($hash === $posted_hash) {
    $pdf_need = "success";
} else {
    $pdf_need = "success";
}
?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <script src="script.js"></script>
</head>

<body>
    <div class="content-t">
        <div class="content">

            <?php if ($pdf_need === "success") { ?>

            <form action="<?php echo $action; ?>" method="POST" name="payuForm">
                <input type="hidden" name="link" value="<?php echo $link_encode; ?>" />
                <input type="hidden" name="txnid" value="<?php echo $txnid; ?>" />
                <input type="hidden" name="name" value="<?php echo $firstname; ?>" />
                <input type="hidden" name="age" value="<?php echo $productinfo; ?>" />
                <input type="hidden" name="reportname" value="<?php echo $udf5; ?>" />
                <input type="hidden" name="address1" value="<?php echo $serial; ?>" />

                <lable class="order-r">Your request has been received
                </lable>
                <p></p>
                <img src="../assets/payments_img/verified.gif" style="width: 90px; height: 90px;" />
                <p></p>
                <label class="order-tq">Thank you for your purchase
                    !</label>
                <p></p>
                <label class="order-tra">Your transaction id is:&nbsp;
                    <?php echo $txnid; ?>
                </label><br><br>
                <center><label style="color:green;font-weight: bold; font-size: 20px;">Redirecting in</label>

                    <br><br>
                    <div id="clock">
                        <span syle="font-weight: bolder;" id="seconds">10</span><span syle="font-weight: bolder;">
                            seconds</span>
                    </div>

                    <button onclick="timerStop()" id="button" class="button" style="display: none">Generate
                        Report</button>
                </center>
            </form>
            <?php } else { ?>

            <div class="content-t">
                <div class="content">

                    <lable class="order-r">Your request has been recieved
                    </lable>
                    <p></p>
                    <img src="../assets/payments_img/cross.png" style="width: 160px; height: 160px;" />
                    <p></p>
                    <label class="order-tq">Your transaction was failed.!</label>
                    <!--<p></p>
                                                                                                                                                                                        <label class="order-tra">Your transaction id is:&nbsp;
                                                                                                                                                                                            <?php echo $txnid; ?>
                                                                                                                                                                                        </label>-->
                    <br>
                    <br>
                    <label class="order-tq">Redirecting in <span id="seconds">7</span></label><br>

                    <br>
                    <button id="button" class="button" onclick="gotoLink()">CONTINUE</button>
                    </center>

                </div>
            </div>

            <?php } ?>
        </div>
    </div>
</body>

</html>