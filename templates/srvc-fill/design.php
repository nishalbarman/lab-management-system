<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Design</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
    .form-container {
        background-color: #fff;
        font-family: 'Titillium Web', sans-serif;
        font-size: 0;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 0 25px -15px rgba(0, 0, 0, 0.3);
    }

    .form-container .title {
        color: #000;
        font-size: 25px;
        font-weight: 600;
        text-transform: capitalize;
        margin: 0 0 25px;
    }

    .form-container .title:after {
        content: '';
        background-color: #00A9EF;
        height: 3px;
        width: 60px;
        margin: 10px 0 0;
        display: block;
        clear: both;
    }

    .form-container .sub-title {
        color: #333;
        font-size: 18px;
        font-weight: 600;
        text-align: center;
        text-transform: uppercase;
        margin: 0 0 20px;
    }

    .form-container .form-horizontal {
        font-size: 0;
    }

    .form-container .form-horizontal .form-group {
        color: #333;
        width: 50%;
        padding: 0 8px;
        margin: 0 0 15px;
        display: inline-block;
    }

    .form-container .form-horizontal .form-group:nth-child(4) {
        margin-bottom: 30px;
    }

    .form-container .form-horizontal .form-group label {
        font-size: 17px;
        font-weight: 600;
    }

    .form-container .form-horizontal .form-control {
        color: #888;
        background: #fff;
        font-weight: 400;
        letter-spacing: 1px;
        height: 40px;
        padding: 6px 12px;
        border-radius: 10px;
        border: 2px solid #e7e7e7;
        box-shadow: none;
    }

    .form-container .form-horizontal .form-control:focus {
        box-shadow: 0 0 5px #dcdcdc;
    }

    .form-container .form-horizontal .check-terms {
        padding: 0 8px;
        margin: 0 0 25px;
    }

    .form-container .form-horizontal .check-terms .check-label {
        color: #333;
        font-size: 14px;
        font-weight: 500;
        font-style: italic;
        vertical-align: top;
        display: inline-block;
    }

    .form-container .form-horizontal .check-terms .checkbox {
        height: 17px;
        width: 17px;
        min-height: auto;
        margin: 2px 8px 0 0;
        border: 2px solid #d9d9d9;
        border-radius: 2px;
        cursor: pointer;
        display: inline-block;
        position: relative;
        appearance: none;
        -moz-appearance: none;
        -webkit-appearance: none;
        transition: all 0.3s ease 0s;
    }

    .form-container .form-horizontal .check-terms .checkbox:before {
        content: '';
        height: 5px;
        width: 9px;
        border-bottom: 2px solid #00A9EF;
        border-left: 2px solid #00A9EF;
        transform: rotate(-45deg);
        position: absolute;
        left: 2px;
        top: 2.5px;
        transition: all 0.3s ease;
    }

    .form-container .form-horizontal .check-terms .checkbox:checked:before {
        opacity: 1;
    }

    .form-container .form-horizontal .check-terms .checkbox:not(:checked):before {
        opacity: 0;
    }

    .form-container .form-horizontal .check-terms .checkbox:focus {
        outline: none;
    }

    .form-container .signin-link {
        color: #333;
        font-size: 14px;
        width: calc(100% - 190px);
        margin-right: 30px;
        display: inline-block;
        vertical-align: top;
    }

    .form-container .signin-link a {
        color: #00A9EF;
        font-weight: 600;
        transition: all 0.3s ease 0s;
    }

    .form-container .signin-link a:hover {
        text-decoration: underline;
    }

    .form-container .form-horizontal .signup {
        color: #fff;
        background: #00A9EF;
        font-size: 15px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        width: 160px;
        padding: 8px 15px 9px;
        border-radius: 10px;
        transition: all 0.3s ease 0s;
    }

    .form-container .form-horizontal .btn:hover,
    .form-container .form-horizontal .btn:focus {
        text-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        box-shadow: 3px 3px rgba(0, 0, 0, 0.15), 5px 5px rgba(0, 0, 0, 0.1);
        outline: none;
    }

    @media only screen and (max-width:479px) {
        .form-container .form-horizontal .form-group {
            width: 100%;
        }

        .form-container .signin-link {
            width: 100%;
            margin: 0 10px 15px;
        }
    }
    </style>
</head>

<body>
    <div class="form-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <div class="form-container">
                        <h3 class="title">Complete Blood Count</h3>
                        <form class="form-horizontal" action="<?php echo $action; ?>" method="POST" name="payuForm"
                            id="reportForm">

                            <!-- Hidden Values -->

                            <input type="hidden" name="key" value="CY4YAH" />
                            <input type="hidden" name="hash" value="" />
                            <input type="hidden" name="txnid"
                                value="<?php echo substr(hash('sha256', mt_rand() . microtime()), 0, 20); ?>" />
                            <input type="hidden" name="amount" value="22" />
                            <input type="hidden" name="firstname" id="firstname" value="<?php echo $name; ?>" />
                            <input type="hidden" name="email" id="email" value="<?php $_SESSION['phone']; ?>" />
                            <input type="hidden" name="phone" value="<?php $_SESSION['phone']; ?>" />
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

                            <!-- Hidden Ends Here -->

                            <!-- Patient Details Starts Here -->

                            <div class="form-group">
                                <label>Serial No</label>
                                <input type="number" class="form-control" placeholder="########"
                                    value="<?php echo $serial; ?>" name="p_serial">
                            </div>
                            <div class="form-group">
                                <label>Samle No</label>
                                <input type="number" class="form-control" placeholder="########"
                                    value="<?php echo $sample; ?>" name="patient_sample">
                            </div>
                            <div class="form-group">
                                <label>Date </label>
                                <input type="date" onfocus="this.showPicker()" class="form-control"
                                    placeholder="01-01-2001" value="<?php echo $date; ?>" name="report_date">
                            </div>
                            <div class="form-group">
                                <label>Dr. Name</label>
                                <input type="text" class="form-control" placeholder="Dr name"
                                    value="<?php echo $reffered; ?>" name="dr_name">
                            </div>
                            <h4 class="sub-title">Patient Information</h4>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Patient"
                                    value="<?php echo $name; ?>" name="patient_name">
                            </div>
                            <div class="form-group">
                                <label>Age</label>
                                <input id="age" type="hidden" value="<?php echo $age; ?>" name="patient_age" />

                                <input type="number" class="form-control" placeholder="Age" value="<?php echo $name; ?>"
                                    name="patient_name" value="<?php echo $_age; ?>" required name="_age">
                            </div>

                            <div class="form-group">
                                <label>Years/Months</label>

                                <select class="form-control" name="Y_M" required>
                                    <option value="Years">Years</option>
                                    <option value="Months">Months</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control" name="patient_gender" value="<?php echo $gender; ?>"
                                    required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <h4 class="sub-title">Report Details</h4>

                            <div class="form-group">
                                <label>TLC</label>
                                <input type="number" class="form-control" placeholder="Enter TLC"
                                    value="<?php echo $tlc; ?>" name="tlc">
                            </div>

                            <div class="form-group">
                                <label>Neutrophil</label>
                                <input type="number" class="form-control" placeholder="Enter Neutrophil"
                                    value="<?php echo $neu; ?>" name="neu">
                            </div>

                            <div class="form-group">
                                <label>Lymphocyte</label>
                                <input type="text" class="form-control" placeholder="Enter LYMPHOCYTE"
                                    value="<?php echo $lym; ?>" name="lym">
                            </div>

                            <div class="form-group">
                                <label>Monocyte</label>
                                <input type="text" class="form-control" placeholder="Enter MONOCYTE"
                                    value="<?php echo $mono; ?>" name="mono">
                            </div>

                            <div class="form-group">
                                <label>Eosinophil</label>
                                <input type="text" class="form-control" placeholder="Enter EOSINOPHIL"
                                    value="<?php echo $eos; ?>" name="eos">
                            </div>
                            <div class="form-group">
                                <label>Basophil</label>
                                <input type="text" class="form-control" placeholder="Enter BASOPHIl"
                                    value="<?php echo $bas; ?>" name="bas">
                            </div>
                            <div class="form-group">
                                <label>Hb(%)</label>
                                <input type="number" step="any" min="0" class="form-control" placeholder="Enter HB"
                                    value="<?php echo $hb; ?>" name="hb">
                            </div>
                            <div class="form-group">
                                <label>Platelet Count</label>
                                <input type="number" step="any" min="0" class="form-control"
                                    placeholder="Enter PLATELET" value="<?php echo $plc; ?>" name="plc">
                            </div>
                            <div class="form-group">
                                <label>RBC Count</label>
                                <input type="number" step="any" min="0" class="form-control" placeholder="Enter RBC"
                                    value="<?php echo $rbc; ?>" name="rbc">
                            </div>
                            <div class="form-group">
                                <label>PCV</label>
                                <input type="number" step="any" min="0" class="form-control" placeholder="Enter PCV"
                                    value="<?php echo $pcv; ?>" name="pcv">
                            </div>
                            <div class="form-group">
                                <label>MCV</label>
                                <input type="number" step="any" min="0" class="form-control" placeholder="Enter MCV"
                                    value="<?php echo $mcv; ?>" name="mcv">
                            </div>
                            <div class="form-group">
                                <label>MCH</label>
                                <input type="number" step="any" min="0" class="form-control" placeholder="Enter MCH"
                                    value="<?php echo $mch; ?>" name="mch">
                            </div>
                            <div class="form-group">
                                <label>MCHC</label>
                                <input type="number" step="any" min="0" class="form-control" placeholder="Enter MCHC"
                                    value="<?php echo $mchc; ?>" name="mchc">
                            </div>
                            <div class="form-group">
                                <label>RDW-CV</label>
                                <input type="number" step="any" min="0" class="form-control" placeholder="Enter RDW-CV"
                                    value="<?php echo $rdw; ?>" name="rdw">
                            </div>

                            <div class="form-group">
                                <label>Transaction ID (For updation of report only)</label>
                                <input type="text" class="form-control" placeholder="Enter TXN ID"
                                    value="<?php echo $transaction; ?>" name="transaction_id">
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <input class="btn signup" type="submit" name="create" class="button" submit-old />

                            </div>
                            <div class="form-group">
                                <button class="btn signup" type="button" class="button" data-toggle="modal"
                                    data-target="#exampleModalCenter" style="display:none" submit-new>Submit</button>
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
                                            <button id="updateBtn" type="button" class="btn btn-primary">Update
                                                Existing</button>
                                            <button id="newBtn" type="button" class="btn btn-primary">New
                                                Report</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <button >Create Account</button> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/report.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>