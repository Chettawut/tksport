<div class="modal fade bd-example-modal-xl" tabindex="-1" id="modal_add" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content w3-flat-turquoise">
            <div class="modal-header bg-gradient-secondary">
                <h5 class="modal-title">เพิ่มบุคคล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="frmAddPerson" id="frmAddPerson" method="POST" style="padding:10px;" action="javascript:void(0);">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">รหัสบุคคล</label>
                            <input type="text" class="form-control" name="add_percode" id="add_percode" required>
                        </div>
                        <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">ประเภท</label>
                            <input type="text" class="form-control" name="add_type" id="add_type" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">ชื่อจริง</label>
                            <input type="text" class="form-control" name="add_firstname" id="add_firstname" required>
                        </div>
                        <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">นามสกุล</label>
                            <input type="text" class="form-control" name="add_lastname" id="add_lastname" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col text-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        <button type="submit" id="btnAddPerson" form="frmAddPerson" class="btn btn-primary">ตกลง</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>