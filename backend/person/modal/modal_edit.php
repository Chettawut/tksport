<div class="modal fade bd-example-modal-xl" tabindex="-1" id="modal_edit" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content w3-flat-turquoise">
            <div class="modal-header bg-gradient-secondary">
                <h5 class="modal-title">แก้ไขบุคคล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="frmEditPerson" id="frmEditPerson" method="POST" style="padding:10px;"
                action="javascript:void(0);">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">รหัสบุคคล</label>
                            <input type="text" class="form-control" name="percode" id="percode" required disabled>
                        </div>
                        <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">ประเภท</label>
                            <select class="form-control" name="type" id="type" required>
                                <option value="นักเรียน">นักเรียน</option>
                                <option value="คุณครู">คุณครู</option>
                                <option value="admin">admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-2 col-12">
                            <label class="col-form-label">คำนำหน้า</label>
                            <select class="form-control" name="titlename" id="titlename" required>
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-5 col-12">
                            <label class="col-form-label">ชื่อจริง</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" required>
                        </div>
                        <div class="form-group col-lg-5 col-12">
                            <label class="col-form-label">นามสกุล</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4 col-12">
                            <label class="col-form-label">ระดับชั้น</label>
                            <input type="text" class="form-control" name="level" id="level" required>
                        </div>
                        <div class="form-group col-lg-4 col-12">
                            <label class="col-form-label">ห้อง</label>
                            <input type="text" class="form-control" name="room" id="room" required>
                        </div>
                        <div class="form-group col-lg-4 col-12">
                            <label class="col-form-label">สีที่อยู่</label>
                            <select class="form-control" name="colorcode" id="colorcode" required>
                                    <?php 
                                            include('../conn.php');
                                        	$sql = "SELECT * FROM `color`  ";
                                            $query = mysqli_query($conn,$sql);
                                        
                                            while($row = $query->fetch_assoc()) {
                                                echo '<option value="'.$row["colorcode"].'">'.$row["colorname"].'</option>';
                                            }
                                    ?>
                                </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">กลุ่มสาระ</label>
                            <input type="text" class="form-control" name="pergroup" id="pergroup" required>
                        </div>
                        <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control" name="telephone" id="telephone" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col text-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        <button type="submit" id="btnEditPerson" form="frmEditPerson"
                            class="btn btn-primary">แก้ไข</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>