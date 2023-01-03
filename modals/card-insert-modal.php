<!-- Card Insert Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: transparent; border: none">
            <!-- <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> -->
            <div class="modal-body" style="background-color:transparent;">
                <div class="form-style-3">
                    <form id="cardForm">
                        <fieldset>
                            <legend>Card details</legend>
                            <label for="field1"><span>Name <span class="required">*</span></span><input type="text"
                                    class="input-field" name="card_title" value="" input-fields /></label>
                            <label for="field2"><span>Price <span class="required">*</span></span><input type="text"
                                    class="input-field" name="card_price" value="" input-fields /></label>
                            <label for="field3"><span>Top Color <span class="required">*</span></span><input
                                    type="color" class="input-field" name="card_top_color" value=""
                                    input-fields /></label>
                            <label for="field3"><span>Bottom Color <span class="required">*</span></span><input
                                    type="color" class="input-field" name="card_bottom_color" value=""
                                    input-fields /></label>
                            <label for="field3"><span>Button Name <span class="required">*</span></span><input
                                    type="text" class="input-field" name="card_btn" value="" input-fields /></label>
                            <label for="field3"><span>URL <span class="required">*</span></span><input type="text"
                                    class="input-field" name="card_url" value="" input-fields /></label>
                            <label for="field4"><span>New Label<span class="required">*</span></span><select
                                    name="new_label" class="select-field">
                                    <option value="1">Show</option>
                                    <option value="0">Don't Show</option>
                                </select></label>
                        </fieldset>
                        <fieldset>
                            <legend>Optimization</legend>
                            <label for="field6"><span>Keywords <span class="required">*</span></span><textarea
                                    name="card_keywords" class="textarea-field" input-fields></textarea></label>

                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="modal-footer" style="display:flex; justify-content: center;">
                <button type="button" class="card-insert-btn" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="card-insert-btn" onclick="insertCard()">Submit</button>
            </div>
        </div>
    </div>
</div>

<script>
function submitForm(element) {
    element.submit;
}

function insertCard() {
    const inputFields = document.querySelectorAll('[input-fields]');
    let error = 0;
    inputFields.forEach(element => {
        if (element.value === '') {
            error = 1;
        }
    });
    if (error === 1) {
        alert("All input field are required.");
    } else {
        let options = {

            method: "post",
            body: new FormData(document.getElementById("cardForm"))

        }
        fetch('../core/api/insert-card.php', options).then(res => res.json()).then(data => {})
    }
}
</script>