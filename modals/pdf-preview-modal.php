<style>
#pdf-preview .modal-dialog,
#pdf-preview .modal-content {
    /* 80% of window height */
    height: 95%;
}

#pdf-preview .modal-body {
    /* 100% = dialog height, 120px = header + footer */
    max-height: calc(100% - 50px);
    overflow-y: scroll;
}

#pdf-preview {
    --bs-modal-width: 80%;
}
</style>

<div class="modal fade" id="pdf-preview" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="pdfPreview" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="pdfPreview">Preview</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="preview-frame" style='width: 100%; height:100%;'></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
function initIframe(file_path) {
    const frame = document.getElementById('preview-frame');
    let url = BASE_URL + "/uploads/reports/" + file_path;
    frame.innerHTML = "<iframe style='width: 100%; height:100%;' src='" + url + "' ></iframe>";
    // document.getElementById('iframe-pdf').src = 
}
</script>