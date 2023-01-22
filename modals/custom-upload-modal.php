<!-- Add User Modal -->

<div class="modal fade" id="upload-report-manually" tabindex="-1" aria-labelledby="Mannual Upload" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="manualadd">Upload Report Manually</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div style="padding: 15px 20px 0px 20px">
                    <div class="main">

                        <form id="manual-report-upload"
                            action="<?php $BASE_URL . "/core/api/manual-upload-report.php"; ?>" class="registration"
                            method="post" id="manual-upload-form">

                            <div class="mb-3">
                                <label class="pure-material-textfield-outlined">
                                    <input type="number" class="form-control" aria-label="Serial"
                                        aria-describedby="inputGroup-sizing-lg" placeholder="Serial No" name="serial_no"
                                        value="">
                                </label>

                                <label class="pure-material-textfield-outlined">
                                    <input type="text" class="form-control" aria-label="Name"
                                        aria-describedby="inputGroup-sizing-lg" placeholder="Name" name="patient_name"
                                        value="" manual-upload-fields>
                                </label>
                            </div>

                            <div class=" input-group mb-3">
                                <label class="pure-material-textfield-outlined">
                                    <input type="number" class="form-control" aria-label="Age"
                                        aria-describedby="inputGroup-sizing-lg" placeholder="Age" name="age" value=""
                                        manual-upload-fields>
                                </label>
                                <label class="input-group-text" for="inputGroupSelect01">-></label>
                                <select name="age_back" class="form-select" id="inputGroupSelect01"
                                    manual-upload-fields>
                                    <option value="" selected>Choose...</option>
                                    <option value="Years">Years</option>
                                    <option value="Months">Months</option>
                                </select>

                            </div>



                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Gender
                                </label>
                                <select name="gender" class="form-select" id="inputGroupSelect01" manual-upload-fields>
                                    <option value="" selected>Choose...</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Other</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Select Report</label>
                                <input name="report_pdf" class="form-control" type="file" id="formFile"
                                    accept="application/pdf" value="" manual-upload-fields>
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control disabled" placeholder=""
                                    aria-label="Phone Number" aria-describedby="basic-addon1" name="technician"
                                    value="<?php echo $_SESSION['name']; ?>" readonly disabled manual-upload-fields>
                            </div>

                            <!-- <label class="pure-material-textfield-outlined">
                                <input type="password" class="form-control" aria-label="Password"
                                    aria-describedby="inputGroup-sizing-lg" id="inputPassword" placeholder="Password"
                                    name="password">
                            </label>

                            <label class="pure-material-textfield-outlined">
                                <input type="password" class="form-control" aria-label="Password"
                                    aria-describedby="inputGroup-sizing-lg" id="inputPassword"
                                    placeholder="Confirm Password" name="cpassword">
                            </label> -->
                            <!-- <center>
                                <br>
                                <div class="mb-3">

                                    <input id="button" name="submit" type="submit" style="width: 70%"
                                        class="btn btn-outline-success btn-lg" value="Upload Report">
                                </div>
                            </center> -->
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal-footer" style="display:flex; justify-content: center; padding: 20px;">
                <button id="manual-upload-btn" type="submit" style="width: 70%" class="btn btn-outline-success btn-lg"
                    manual-upload-button>Submit</button>
            </div>

        </div>
    </div>
</div>

<script>
const manualUploadBtn = document.getElementById("manual-upload-btn");
manualUploadBtn.addEventListener("click", () => {
    console.log('clicked');
    const manualInputFields = document.querySelectorAll('[manual-upload-fields]');
    let errorManual = 0;
    manualInputFields.forEach(element => {
        if (element.value === "") {
            errorManual = 1;
        }
    });
    if (errorManual === 1) {
        alert("All input field are required.");
    } else {
        // document.getElementById("manual-report-upload").submit();
        let options = {
            // header: {
            //     "Content-Type": "application/x-www-form-urlencoded"
            // }
            method: "post",
            body: new FormData(document.getElementById("manual-report-upload"))
        }

        // alert('success');
        fetch(BASE_URL + '/core/api/manual-upload-report.php', options).then(res => res.json()).then(data => {
            console.log(data);
            if (data.success === true) {
                alert('Report Uploaded Successfuly, Kindly Refresh.');
            } else {
                alert('Report Upload Failed, Please Try Again.');
            }
        })
    }

});
</script>