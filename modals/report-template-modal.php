<!-- Modal -->
<div class="modal fade" id="reportNewUpdate" tabindex="-1" role="dialog" aria-labelledby="ereportNewUpdate"
    aria-hidden="true">
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

<script>
const updateBtn = document.getElementById("updateBtn");
const newBtn = document.getElementById("newBtn");
const API = "core/api/update-existing.php";

updateBtn.setAttribute("data-dismiss", "modal");
newBtn.setAttribute("data-dismiss", "modal");

updateBtn.addEventListener("click", () => {
    // console.log("Clicked");
    // const xhr = new XMLHttpRequest();
    // xhr.open("POST", API, true);
    // xhr.getResponseHeader("Content-type", "application/x-www-form-urlencoded");

    // xhr.onload = function () {
    //   if (this.status === 200) {
    //     console.log(this.responseText);
    //     alert("Report Updated Successfully.");
    //     window.location = "dashboard.php";
    //     //   document.getElementById("loader").style.display = "none";
    //   } else {
    //     console.log("Error");
    //   }
    // };

    let formData = new FormData(document.getElementById("reportForm"));

    let options = {
        header: {
            "Content-type": "application/x-www-form-urlencoded",
        },
        method: "post",
        body: formData,
    };

    // document.getElementById("loader").style.display = "flex";
    // xhr.send(formData);
    fetch(BASE_URL + "/" + API, options)
        .then((res) => res.json())
        .then((data) => {
            console.log(data);
            // document.getElementById("loader").style.display = "none";
        });
});

newBtn.addEventListener("click", () => {
    let hash = "<?php echo $udf1 ?>";

    if (hash === "no_url") {
        alert("Enter details completely");
        return;
    }

    let payuForm = document.forms.payuForm;
    payuForm.submit();
});
</script>