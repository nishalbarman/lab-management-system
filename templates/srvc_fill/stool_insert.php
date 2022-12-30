<?php include '../header.php';
include '../config.php';
include 'sessioncheck.php';

$selectMaxID = 'SELECT id FROM files ORDER BY id DESC LIMIT 1';
$maxIdResult = mysqli_query($link, $selectMaxID); //run query

if (mysqli_num_rows($maxIdResult) > 0) {  
    while($maxid = mysqli_fetch_assoc($maxIdResult)) {
        $def_serial = $maxid["id"] + 1;
    } 
} 

$action = "";
$udf1 = "no_url";
$udf2 = "no_url";
$udf3 = "no_url";
$udf4 = "no_url";
$udf5 = "Stool Report";

if (isset($_POST['create'])) {
    if(empty($_POST['p_serial'])) {
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

    $col = $_POST['col'];
    $con = $_POST['con'];
    $mucu = $_POST['mucu'];
    $blo = $_POST['blo'];
    $rea = $_POST['rea'];
    $ova = $_POST['ova'];
    $cys = $_POST['cys'];
    $cys = str_replace("+","@",$cys);
    $veg = $_POST['veg'];
    $veg = str_replace("+","@",$veg);
    $rbc = $_POST['rbc'];
    $pus = $_POST['pus'];
    $sta = $_POST['sta'];
    $sta = str_replace("+","@",$sta);
    $cry = $_POST['cry'];
    $fat = $_POST['fat'];
    $oth = $_POST['oth'];

    $transaction = $_POST['transaction_id'];    

    $return_url1 = "stool.php?serial=".$serial."&patient_sample=".$sample."&report_date=".$date."&dr_name=".$reffered."&patient_name=".$name;
    $return_url2 = "&patient_age=".$age."&patient_gender=".$gender."&col=".$col."&con=".$con."&mucu=".$mucu;
    $return_url3 = "&blo=".$blo."&rea=".$rea."&ova=".$ova."&cys=".$cys."&veg=".$veg."&rbc=".$rbc;
    $return_url4 = "&pus=".$pus."&sta=".$sta."&cry=".$cry."&fat=".$fat."&oth=".$oth."&create=Submit";
    

    $udf1 = base64_encode($return_url1);
    $udf2 = base64_encode($return_url2);
    $udf3 = base64_encode($return_url3);
    $udf4 = base64_encode($return_url4);

    // echo $udf1."<br>".$udf2."<br>".$udf3;
    // echo "<br>http://healthkind.is-great.net/create/".$return_url1.$return_url2.$return_url3;

}

if($udf1 === "no_url" || $udf2 === "no_url" || $udf3 === "no_url" || $udf4 === "no_url") {
    $action = "";
} else {
    $action = "http://healthkind.is-great.net/create/verify/index.php";
}


?>
<html>

<head>
    <title>Blood frp value intitialize</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .header {
            text-align: center;
            color: #5b6574;
            font-size: 30px;
            font-weight: bold;
        }

        .form form input[type="submit"], .button {
            width: 100%;
            padding: 15px;
            margin-top: 20px;
            background-color: #04AA6D;
            /* #3274d6; */
            border: 0;
            cursor: pointer;
            font-weight: bold;
            color: #ffffff;
            transition: background-color 0.2s;
            margin: 0px auto;
            border-radius: 4px;
        }




        .login form input[type="submit"]:hover {
            background-color: #0a8f5e;
            /* #08a169; */
            /* #2868c7; */
            transition: background-color 0.2s;
        }

        input {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form {
            border-radius: 5px;
            background-color: #f2f2f2;
            border: 1px solid #555;
            width: 80%;
            margin: 25px auto;
            padding: 30px;
            border: 1px solid #555;
            margin-bottom: 10px;
        }

        .addpatient {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: bold;
            text-align: center;
            font-size: 20px;
            color: green;
        }

        /* input[type="date"]::-webkit-calendar-picker-indicator {
			background: transparent;
			bottom: 0;
			color: transparent;
			cursor: pointer;
			height: auto;
			left: 0;
			position: absolute;
			right: 0;
			top: 0;
			width: auto;
		} */
    </style>

    <script>
        var hash = '<?php echo $udf1 ?>';
        function submitPayuForm() {
            if (hash == 'no_url') {
                return;
            }
            document.querySelector("[submit-old]").style.display = "none";
            document.querySelector("[submit-new]").style.display = "block";
            // var payuForm = document.forms.payuForm;
            // payuForm.submit();
        }
    </script>
</head>

<body onload="submitPayuForm()">
    <div class="content">
        <center>
            <h class="header">Urine RE<label>
        </center>
        <div class="form">
            <form action="<?php echo $action; ?>" method="POST" name="payuForm" id="reportForm">

                <input type="hidden" name="key" value="CY4YAH" />
                <input type="hidden" name="hash" value="" />
                <input type="hidden" name="txnid"
                    value="<?php echo substr(hash('sha256', mt_rand() . microtime()), 0, 20);?>" />
                <input type="hidden" name="amount" value="22" />
                <input type="hidden" name="firstname" id="firstname" value="<?php echo $name; ?>" />
                <input type="hidden" name="email" id="email" value="nishalbarman@gmail.com" />
                <input type="hidden" name="phone" value="9476887301" />
                <input type="hidden" value="<?php echo $age; ?>" name="productinfo">
                <input type="hidden" name="surl" value="<?php echo $success_url; ?>"
                    size="64" />
                <input type="hidden" name="furl" value="<?php echo $failure_url; ?>"
                    size="64" />
                <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
                <input type="hidden" name="udf1" value="<?php echo $udf1; ?>" />
                <input type="hidden" name="udf2" value="<?php echo $udf2; ?>" />
                <input type="hidden" name="udf3" value="<?php echo $udf3; ?>" />
                <input type="hidden" name="udf4" value="<?php echo $udf4; ?>" />
                <input type="hidden" name="udf5" value="<?php echo $udf5; ?>" />
                <input type="hidden" name="address1" value="<?php echo $serial; ?>" />

                <h3>Patient details</h3>
                <label>Serial No. :</label>
                <input type="number" placeholder="Serial number" value="<?php echo $serial; ?>" name="p_serial"
                     />
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
                <input id="age" type="hidden"  value="<?php echo $age; ?>" name="patient_age" />
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


                <label>Colour :</label>
                <input type="text" placeholder="Enter Colour" value="<?php echo $col; ?>" name="col" />
                <br>
                <label>Consistency :</label>
                <input type="text" placeholder="Enter Appearance" value="<?php echo $con; ?>" name="con" />
                <br>
                <label>Mucus :</label>
                <input type="text" placeholder="Enter Deposit" value="<?php echo $mucu; ?>" name="mucu" />
                <br>
                <label>Blood :</label>
                <input type="text" placeholder="Enter Sp. Gravity" value="<?php echo $blo; ?>" name="blo" />
                <br>
                <label>Reaction :</label>
                <input type="text" placeholder="Enter Reaction " value="<?php echo $rea; ?>" name="rea" />
                <br>
                <label>OVA :</label>
                <input type="text" placeholder="Enter Sugar" value="<?php echo $ova; ?>" name="ova" />
                <br>
                <label>Cysts :</label>
                <input type="text" placeholder="Enter Albumin" value="<?php echo $cys; ?>" name="cys" />
                <br>
                <label>Veg Cell :</label>
                <input type="text" placeholder="Enter Phosphate" value="<?php echo $veg; ?>" name="veg" />
                <br>
                <label>RBC :</label>
                <input type="text" placeholder="Enter Pus Cell" value="<?php echo $rbc; ?>" name="rbc" />
                <br>
                <label>Pus Cell</label>
                <input type="text" placeholder="Enter R.B.C" value="<?php echo $pus; ?>" name="pus" />
                <br>
                <label>Starch Cell :</label>
                <input type="text" placeholder="Enter Ep. Cells" value="<?php echo $sta; ?>" name="sta" />
                <br>
                <label>Crystal :</label>
                <input type="text" placeholder="Enter Casts" value="<?php echo $cry; ?>" name="cry" />
                <br>
                <label>Fat Cell :</label>
                <input type="text" placeholder="Enter Crystais" value="<?php echo $fat; ?>" name="fat" />
                <br>
                <br>
                <label>Others :</label>
                <input type="text" placeholder="Enter Crystais" value="<?php echo $oth; ?>" name="oth" />
                <br>
                <label>Transaction ID (For updation of report only)</label>
                <input id="tranac" type="text" placeholder="Transaction ID" name="transaction_id"
                    value="<?php echo $transaction; ?>"  />

                <br>
                <br>
                <input type="submit" name="create" class="button" submit-old />
                <button type="button" class="button" data-toggle="modal" data-target="#exampleModalCenter"
                    style="display:none" submit-new>Submit</button>

            </form>
        </div>
    </div>
    </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Choose an option?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Continue to a new report or update an existing report.</p>
                </div>
                <div class="modal-footer">
                    <button id="updateBtn" type="button" class="btn btn-primary">Update Existing</button>
                    <button id="newBtn" type="button" class="btn btn-primary">New Report</button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/report.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>