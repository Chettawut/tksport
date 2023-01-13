<div class="modal fade bd-example-modal-xl" tabindex="-1" id="modal_add" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content w3-flat-turquoise">
            <div class="modal-header bg-gradient-secondary">
                <h5 class="modal-title">เพิ่ม Sport</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="frmAddSport" id="frmAddSport" method="POST" style="padding:10px;" action="javascript:void(0);">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-lg-8 col-12">
                            <label class="col-form-label">ชื่อ Sport</label>
                            <input type="text" class="form-control" name="add_spname" id="add_spname" required>
                        </div>
                        <div class="form-group col-lg-4 col-12">
                            <label for="recipient-name" class="col-form-label">หมวดประเภทกีฬา</label>
                            <select class="form-control" name="add_category" id="add_category">
                                <option value="1">กีฬาทั่วไป</option>
                                <option value="2">กรีฑา</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="col text-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        <button type="submit" id="btnAddSport" form="frmAddSport" class="btn btn-primary">ตกลง</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>