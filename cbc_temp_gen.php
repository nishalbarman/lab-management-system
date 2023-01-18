<?php
session_start();

// include('headers/header_admin.php');
include("core/base.php");
include('includes/config/connect.php');

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
    $age_part = $_POST['Y_M'];
    $age = $_age . ' ' . $_POST['Y_M'];
    $gender = $_POST['patient_gender'];
    $reffered = $_POST['dr_name'];
    $date = $_POST['report_date'];

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

    $return_url1 = "../srv-repo/cbc.php?serial=" . $serial . "&patient_sample=" . $sample . "&report_date=" . $date . "&dr_name=" . $reffered . "&patient_name=" . $name;
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CBC Report Template -- HealthKind Lab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <style>
    * {
        font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande",
            "Lucida Sans", Arial, sans-serif;
    }

    body {
        background: #eee
    }

    #regForm {
        background-color: #ffffff;
        margin: 0px auto;
        font-family: Raleway;
        padding: 40px;
        border-radius: 10px
    }

    #register {

        color: #6A1B9A;
    }

    h1 {
        text-align: center
    }

    input,
    .form-control,
    .form-select {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
        border-radius: 10px;
        -webkit-appearance: none;
    }

    .tab input:focus {

        border: 1px solid #6a1b9a !important;
        outline: none;
    }

    input.invalid {

        border: 1px solid #e03a0666;
    }

    .tab {
        display: none
    }

    .btnNextPrev {
        background-color: #6A1B9A;
        color: #ffffff;
        border: none;
        border-radius: 50%;
        padding: 10px 20px;
        font-size: 17px;
        font-family: Raleway;
        cursor: pointer
    }

    .btnNextPrev:hover {
        opacity: 0.8
    }

    .btnNextPrev:focus {

        outline: none !important;
    }

    #prevBtn {
        background-color: #bbbbbb
    }


    .all-steps {
        text-align: center;
        margin-top: 30px;
        margin-bottom: 30px;
        width: 100%;
        display: inline-flex;
        justify-content: center;
    }

    .step {
        height: 40px;
        width: 40px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 15px;
        color: #6a1b9a;
        opacity: 0.5;
    }

    .step.active {
        opacity: 1
    }


    .step.finish {
        color: #fff;
        background: #6a1b9a;
        opacity: 1;

    }



    .all-steps {
        text-align: center;
        margin-top: 30px;
        margin-bottom: 30px
    }

    .thanks-message {
        display: none
    }
    </style>

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
    <div class="container mt-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-8">
                <form id="regForm" action="<?php echo $action; ?>" method="post" name="FormData">

                    <!-- payu details -->

                    <input type="hidden" name="key" value="CY4YAH" />
                    <input type="hidden" name="hash" value="" />
                    <input type="hidden" name="txnid"
                        value="<?php echo substr(hash('sha256', mt_rand() . microtime()), 0, 20); ?>" />
                    <input type="hidden" name="amount" value="25" />
                    <input type="hidden" name="firstname" id="firstname" value="<?php echo $name; ?>" />
                    <input type="hidden" name="email" id="email" value="$_SESSION['email']" />
                    <input type="hidden" name="phone" value="$_SESSION['phone']" />
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

                    <!-- detailes ends here -->



                    <h1 id="register">Complete Blood Count</h1>
                    <div class="all-steps" id="all-steps">
                        <span class="step"><i class="fa fa-user"></i></span>
                        <span class="step"><i class="fa fa-user"></i></span>
                        <span class="step"><i class="fa fa-user"></i></span>
                        <span class="step"><i class="fa fa-user"></i></span>
                        <!-- <span class="step"><i class="fa fa-spotify"></i></span>
                        <span class="step"><i class="fa fa-mobile-phone"></i></span> -->
                    </div>

                    <div class="tab">
                        <h4>Initial Details</h4>
                        <p>
                            <input placeholder="Serial No" type="number" oninput="this.className = ''" name="p_serial"
                                value="<?php if (!isset($serial)) {
                                    echo "";
                                } else {
                                    echo $serial;
                                }
                                ; ?>">
                        </p>
                        <!-- <h6>SampleLab No</h6> -->
                        <p>
                            <input placeholder="Lab No" type="number" oninput="this.className = ''"
                                name="patient_sample" value="<?php if (!isset($sample)) {
                                    echo "";
                                } else {
                                    echo $sample;
                                }
                                ; ?>">
                        </p>
                        <p>
                            <input placeholder="Report Date" type="date" oninput="this.className = ''"
                                name="report_date" value="<?php if (!isset($date)) {
                                    echo "";
                                } else {
                                    echo $date;
                                }
                                ; ?>">
                        </p>
                        <p>
                            <input placeholder="Dr. Name" type="text" oninput="this.className = ''" name="dr_name"
                                value="<?php if (!isset($reffered)) {
                                    echo "";
                                } else {
                                    echo $reffered;
                                }
                                ; ?>">
                        </p>

                    </div>
                    <div class="tab">
                        <h4>Client Details</h4>
                        <p><input placeholder="Name" name="patient_name" value="<?php if (!isset($name)) {
                            echo "";
                        } else {
                            echo $name;
                        }
                        ; ?>"></p>
                        <div class="input-group mb-3">
                            <input placeholder="Age" class="form-control" name="_age" value="<?php if (!isset($_age)) {
                                echo "";
                            } else {
                                echo $_age;
                            }
                            ; ?>">
                            <span class="input-group-text">></span>
                            <select class="form-select" aria-label="Years/Months" name="Y_M">
                                <option value="<?php if (!isset($age_part)) {
                                    echo "";
                                } else {
                                    echo $age_part;
                                }
                                ; ?>">
                                    <?php if (!isset($age_part)) {
                                        echo "Choose Option";
                                    } else {
                                        echo $age_part;
                                    }
                                    ; ?>
                                </option>
                                <option value="Years">Years</option>
                                <option value="Months">Months</option>
                            </select>
                        </div>
                        <p>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Gender</span>
                            <select class="form-select" aria-label="Gender" name="patient_gender">
                                <option selected value="<?php if (empty($gender)) {
                                    echo "";
                                } else {
                                    echo $gender;
                                } ?>">
                                    <?php if (empty($gender)) {
                                        echo "Select Gender";
                                    } else {
                                        echo $gender . " (Default)";
                                    } ?>
                                </option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        </p>

                    </div>
                    <div class="tab">
                        <h6>TLC</h6>
                        <p><input placeholder="TLC" oninput="this.className = ''" name="tlc" value="<?php if (!isset($tlc)) {
                            echo "";
                        } else {
                            echo $tlc;
                        }
                        ; ?>"></p>
                        <h6>Neutrophil</h6>
                        <p><input placeholder="Neutrophil" oninput="this.className = ''" name="neu" value="<?php if (!isset($neu)) {
                            echo "";
                        } else {
                            echo $neu;
                        }
                        ; ?>"></p>
                        <h6>Lymphocyte</h6>
                        <p><input placeholder="Lymphocyte" oninput="this.className = ''" name="lym" value="<?php if (!isset($lym)) {
                            echo "";
                        } else {
                            echo $lym;
                        }
                        ; ?>"></p>
                        <h6>Monocyte</h6>
                        <p><input placeholder="Monocyte" oninput="this.className = ''" name="mono" value="<?php if (!isset($mono)) {
                            echo "";
                        } else {
                            echo $mono;
                        }
                        ; ?>"></p>
                        <h6>Eosinophil</h6>
                        <p><input placeholder="Monocyte" oninput="this.className = ''" name="eos" value="<?php if (!isset($eos)) {
                            echo "";
                        } else {
                            echo $eos;
                        }
                        ; ?>"></p>
                        <h6>Basophil</h6>
                        <p><input placeholder="Monocyte" oninput="this.className = ''" name="bas" value="<?php if (!isset($bas)) {
                            echo "";
                        } else {
                            echo $bas;
                        }
                        ; ?>"></p>
                        <h6>Hb(%)</h6>
                        <p><input placeholder="Monocyte" oninput="this.className = ''" name="hb" value="<?php if (!isset($hb)) {
                            echo "";
                        } else {
                            echo $hb;
                        }
                        ; ?>"></p>
                        <h6>PCV</h6>
                        <p><input placeholder="Monocyte" oninput="this.className = ''" name="pcv" value="<?php if (!isset($pcv)) {
                            echo "";
                        } else {
                            echo $pcv;
                        }
                        ; ?>"></p>
                        <h6>MCV</h6>
                        <p><input placeholder="Monocyte" oninput="this.className = ''" name="mcv" value="<?php if (!isset($mcv)) {
                            echo "";
                        } else {
                            echo $mcv;
                        }
                        ; ?>"></p>
                        <h6>MCH</h6>
                        <p><input placeholder="Monocyte" oninput="this.className = ''" name="mch" value="<?php if (!isset($mch)) {
                            echo "";
                        } else {
                            echo $mch;
                        }
                        ; ?>"></p>
                        <h6>MCHC</h6>
                        <p><input placeholder="Monocyte" oninput="this.className = ''" name="mchc" value="<?php if (!isset($mchc)) {
                            echo "";
                        } else {
                            echo $mchc;
                        }
                        ; ?>"></p>
                        <h6>RDW-CV</h6>
                        <p><input placeholder="Monocyte" oninput="this.className = ''" name="rdw" value="<?php if (!isset($rdw)) {
                            echo "";
                        } else {
                            echo $rdw;
                        }
                        ; ?>"></p>

                    </div>
                    <div class="tab">
                        <h6>Transaction ID (Updation Purpose)</h6>
                        <p><input placeholder="Transaction ID" oninput="this.className = ''" name="transaction_id"
                                value="<?php if (!isset($transaction)) {
                                    echo "";
                                } else {
                                    echo $transaction;
                                }
                                ; ?>"></p>
                        <input type="hidden" name="create" value="Here">
                    </div>

                    <div class="thanks-message text-center" id="text-message">
                        <img src="https://i.imgur.com/O18mJ1K.png" width="100" class="mb-4">
                        <h3>Loading Payment</h3> <span>Please be online, else everything need to be retyped!</span>

                        <!-- <button id="updateBtn" type="button" class="btn btn-primary">Update Existing</button>
                        <button id="newBtn" type="button" class="btn btn-primary">New Report</button> -->

                    </div>
                    <div style="overflow:auto;" id="nextprevious">
                        <div style="float:right;">
                            <button class="btnNextPrev" type="button" id="prevBtn" onclick="nextPrev(-1)"><i
                                    class="fa fa-angle-double-left"></i></button>
                            <button class="btnNextPrev" type="button" id="nextBtn" onclick="nextPrev(1)"><i
                                    class="fa fa-angle-double-right"></i></button>
                        </div>
                    </div>
                </form>
                <div id=""> </div>
            </div>
        </div>

        <!-- Modal -->

        <div class="modal fade" id="confirmForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Choose an option?</h5>
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button> -->
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

        <!-- Modal -->

        <script src="templates/js/report.js"></script>
        <script>
        const newReportBtn = document.getElementById('newBtn');
        newReportBtn.addEventListener('click', () => {
            document.getElementById('regForm').submit();
        });

        var currentTab = 0;
        document.addEventListener("DOMContentLoaded", function(event) {
            showTab(currentTab);
        });

        function showTab(n) {
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = '<i class="fa fa-angle-double-right"></i>';
            } else {
                document.getElementById("nextBtn").innerHTML = '<i class="fa fa-angle-double-right"></i>';
            }
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            var x = document.getElementsByClassName("tab");
            if (n == 1 && !validateForm()) return false;
            x[currentTab].style.display = "none";
            currentTab = currentTab + n;
            if (currentTab >= x.length) {

                document.getElementById("nextprevious").style.display = "none";
                document.getElementById("all-steps").style.display = "none";
                document.getElementById("register").style.display = "none";
                document.getElementById("text-message").style.display = "block";

                const myModal = new bootstrap.Modal('#confirmForm', {
                    keyboard: true
                })

                myModal.show();


            }
            showTab(currentTab);
        }

        function validateForm() {
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            for (i = 0; i < y.length; i++) {
                if (y[i].value == "") {
                    y[i].className += " invalid";
                    valid = false;
                }


            }
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return true;
        }

        function fixStepIndicator(n) {
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            x[n].className += " active";
        }
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>

</body>

</html>