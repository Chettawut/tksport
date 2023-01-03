<div class="modal fade bd-example-modal-xl" tabindex="-1" id="modal_edittype" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content w3-flat-turquoise">
            <div class="modal-header bg-gradient-secondary">
                <h5 class="modal-title">เพิ่ม ประเภทนักกีฬา</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="frmEditType" id="frmEditType" method="POST" style="padding:10px;" action="javascript:void(0);">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">ระดับชั้น</label>
                            <select class="form-control" name="level" id="level" required>
                                <option value="ม.ต้น">ม.ต้น</option>
                                <option value="ม.ปลาย">ม.ปลาย</option>
                                <option value="รวม">รวม</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">เพศ</label>
                            <select class="form-control" name="gender" id="gender" required>
                                <option value="ชาย">ชาย</option>
                                <option value="หญิง">หญิง</option>
                                <option value="รวม">รวม</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-3 col-6">
                            <label class="col-form-label">คะแนนอันดับ1</label>
                            <input type="number" class="form-control" name="score1" id="score1" required>
                        </div>
                        <div class="form-group col-lg-3 col-6">
                            <label class="col-form-label">คะแนนอันดับ2</label>
                            <input type="number" class="form-control" name="score2" id="score2" required>
                        </div>
                        <div class="form-group col-lg-3 col-6">
                            <label class="col-form-label">คะแนนอันดับ3</label>
                            <input type="number" class="form-control" name="score3" id="score3" required>
                        </div>
                        <div class="form-group col-lg-3 col-6">
                            <label class="col-form-label">คะแนนอันดับ4</label>
                            <input type="number" class="form-control" name="score4" id="score4" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col text-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        <button type="submit" id="btnEditType" form="frmEditType" class="btn btn-primary">เพิ่ม</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>