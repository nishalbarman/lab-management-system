<?php
include '../headers/header_admin.php';
include '../includes/config/connect.php';

$action = '';

if (isset($_POST['create'])) {
	$txnidd = $_POST['txnidd'];
	$serial = $_POST['address1'];
	$sql = "select * from payments where transaction_id = '$txnidd'";
	$result = mysqli_query($link, $sql);
	$count = mysqli_num_rows($result);

	if ($count > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$url_encoded = $row['encoded_value'];
			$status = $row['status'];
		}

		if ($status === 'success') {
			if (empty($url_encoded)) {
				$action = '';
				$error = 'Something went wrong!';
			} else {
				$action = 'http://healthkind.is-great.net/create/convert.php';
			}
		} else {
			$error = 'Payment Unsuccessful for the transaction ID';
		}
	} else {
		$action = '';
		$error = 'Transaction id is invalid';
	}
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Download by transition if</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="<?php echo $BASE_URL; ?>services/styles/repo-txn.css">

    <script>
    var errr = '<?php echo $error; ?>';
    var hash = '<?php echo $action; ?>';

    function submitPayuForm() {
        if (errr != '') {
            document.getElementById("msg").style.display = "block";
        }
        if (hash == '') {
            return;
        }
        var payuForm = document.forms.payuForm;
        payuForm.submit();
    }
    </script>
</head>

<body onload="submitPayuForm()">
    <div class="login">
        <h1>Download Report By Txn ID</h1>
        <span id="msg" style="text-align:center; font-weight:bold; color:red;">
            <?php echo $error; ?>
        </span>
        <form action="<?php echo $action; ?>" method="POST" name="payuForm">
            <input type="hidden" name="link" value="<?php echo $url_encoded; ?>" />
            <input type="hidden" name="txnid" value="<?php echo $txnidd; ?>" />
            <input type="hidden" name="delete" value="true" />
            <div style="display: flex">
                <label for="username">
                    <i class="fas fa-user"></i>
                </label>
                <input type="number" name="address1" value="<?php echo $serial; ?>" placeholder="Serial No" required />
            </div>
            <div style="display: flex">
                <label for="username">
                    <i class="fas fa-user"></i>
                </label>
                <input type="text" name="txnidd" placeholder="Transaction ID" id="username"
                    value="<?php echo $txnidd; ?>" required>
            </div>
            <br>
            <input type="submit" name="create" value="Generate">
        </form>
    </div>
</body>

</html>