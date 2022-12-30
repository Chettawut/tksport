<div class="modal fade bd-example-modal-xl" tabindex="-1" id="modal_edit" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content w3-flat-turquoise">
            <div class="modal-header bg-gradient-secondary">
                <h5 class="modal-title">แก้ไข Color</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="frmEditColor" id="frmEditColor" method="POST" style="padding:10px;" action="javascript:void(0);">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">ชื่อ Color</label>
                            <input type="text" class="form-control" name="colorname" id="colorname" required>
                        </div>
                    </div>
                    <input type="hidden" id="colorcode" name="colorcode">
                    <div class="modal-footer">
                        <div class="col text-center">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                            <button type="submit" id="btnEditColor" form="frmEditColor"
                                class="btn btn-primary">แก้ไข</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>