<div class="modal fade" id="deleteConfirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Are U Sure?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label>
                    Continue to delete the record from sql database.
                </label>
                <input id="modal-id" type="hidden" />
                <input id="modal-reset" type="hidden" />
                <input id="modal-table" type="hidden" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="finalCommand()" data-bs-dismiss="modal">Yes,
                    Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
function queryRun(id, reset, table) {
    document.getElementById('modal-id').value = id;
    document.getElementById('modal-reset').value = reset;
    document.getElementById('modal-table').value = table;
}

function finalCommand() {
    let id = document.getElementById('modal-id').value;
    let reset = document.getElementById('modal-reset').value;
    let table = document.getElementById('modal-table').value;

    let query = "DELETE FROM `" + table + "` WHERE id=" + id;
    const formData = new FormData();
    formData.append("query", query);
    formData.append("reset", reset);

    let options = {
        method: "POST",
        body: formData,
    };

    fetch('../core/api/query-run.php', options).then(res => res.json()).then(data => {
        console.log(data);
        if (data.success === 'true') {
            alert('Record Deleted Successfuly, Kindly Refresh The Page!');
        } else {
            alert('Record Deletion Failed!');
        }
    });
}
</script>