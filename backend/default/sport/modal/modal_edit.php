<div class="modal fade bd-example-modal-xl" tabindex="-1" id="modal_edit" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content w3-flat-turquoise">
            <div class="modal-header bg-gradient-secondary">
                <h5 class="modal-title">แก้ไข Sport</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="frmEditSport" id="frmEditSport" method="POST" style="padding:10px;" action="javascript:void(0);">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-lg-8 col-12">
                            <label class="col-form-label">ชื่อ Sport</label>
                            <input type="text" class="form-control" name="spname" id="spname" required>
                        </div>
                        <div class="form-group col-lg-4 col-12">
                            <label for="recipient-name" class="col-form-label">สถานะการใช้งาน</label>
                            <select class="form-control" name="status" id="status">
                                <option value="Y">เปิดการใช้งาน</option>
                                <option value="N">ปิดการใช้งาน</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" id="spcode" name="spcode">

                    <div class="form-group col-md-12">

                                    <button type="button" id="btnAddtypeplayer" class="btn btn-success"
                                        data-toggle="modal" data-target="#modal_typeplayer"><i class="fa fa fa-tags"
                                            aria-hidden="true"></i>
                                        เพิ่มประเภทนักกีฬา</button>
                                    

                                </div>

                                <div style="border: 1px solid #FAEBD7;">
                                    <br>

                                    <table name="tableEditSODetail" id="tableEditSODetail"
                                        class="table table-bordered table-striped">
                                        <thead style="background-color:#D6EAF8;">
                                            <tr>
                                                <th style="width:5%;text-align:center">ลำดับ</th>
                                                <th style="width:10%;text-align:center">รหัสสินค้า</th>
                                                <th style="width:20%;text-align:center">รายการสินค้า</th>
                                                <th style="width:7%;text-align:center">จำนวน</th>
                                                <th style="width:15%;text-align:center">หน่วย</th>
                                                <th style="width:9%;text-align:center">ราคาขาย</th>
                                                <th style="width:10%;text-align:center">ส่วนลด</th>
                                                <th style="width:10%;text-align:center">จำนวนเงิน</th>
                                                <th style="width:15%;text-align:center">คลังสินค้า</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                        </tbody>
                                    </table>
                    <div class="modal-footer">
                        <div class="col text-center">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                            <button type="submit" id="btnEditSport" form="frmEditSport"
                                class="btn btn-primary">แก้ไข</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>