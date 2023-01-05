<div class="modal fade bd-example-modal-xl" tabindex="-1" id="modal_edit" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content w3-flat-turquoise">
            <div class="modal-header bg-gradient-secondary">
                <h5 class="modal-title">กิจกรรม</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="frmEditActivity" id="frmEditActivity" method="POST" style="padding:10px;"
                action="javascript:void(0);">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">ชื่อผู้ทำกิจกรรม</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" required disabled>
                        </div>
                        <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">รายละเอียดกิจกรรม</label>
                            <input type="text" class="form-control" name="actdetail" id="actdetail" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">กิจกรรม</label>
                            <input type="text" class="form-control" name="jobname" id="jobname" required disabled>
                        </div>
                        <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">กีฬา</label>
                            <input type="text" class="form-control" name="spname" id="spname" required disabled>
                        </div>
                    </div>
                    <input type="hidden" name="actcode" id="actcode">
                </div>                
                <div class="modal-footer">
                    <div class="col text-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        <button type="button" id="btnCancleApprove" class="btn btn-danger">ไม่อนุมัติ</button>
                        <button type="submit" id="btnEditApprove" form="frmEditActivity"
                            class="btn btn-success">อนุมัติ</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>