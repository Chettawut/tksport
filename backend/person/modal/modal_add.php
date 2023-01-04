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
            <form name="frmAddPerson" id="frmAddPerson" method="POST" style="padding:10px;"
                action="javascript:void(0);">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">รหัสบุคคล</label>
                            <input type="text" class="form-control" name="add_percode" id="add_percode" required>
                        </div>
                        <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">ประเภท</label>
                            <select class="form-control" name="add_type" id="add_type" required>
                                <option value="นักเรียน">นักเรียน</option>
                                <option value="คุณครู">คุณครู</option>
                                <option value="AdminColor">Admin ประจำสี</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">Username</label>
                            <input type="text" class="form-control" name="add_username" id="add_username" required>
                        </div>
                        <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">Password</label>
                            <input type="password" class="form-control" name="add_password" id="add_password" required>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="form-group col-lg-2 col-12">
                            <label class="col-form-label">คำนำหน้า</label>
                            <select class="form-control" name="add_titlename" id="add_titlename" required>
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                                <option value="ด.ช.">ด.ช.</option>
                                <option value="ด.ญ.">ด.ญ.</option>
                                <option value="ครู">ครู</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-5 col-12">
                            <label class="col-form-label">ชื่อจริง</label>
                            <input type="text" class="form-control" name="add_firstname" id="add_firstname" required>
                        </div>
                        <div class="form-group col-lg-5 col-12">
                            <label class="col-form-label">นามสกุล</label>
                            <input type="text" class="form-control" name="add_lastname" id="add_lastname" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4 col-12">
                            <label class="col-form-label">ระดับชั้น</label>
                            <input type="text" class="form-control" name="add_level" id="add_level" >
                        </div>
                        <div class="form-group col-lg-4 col-12">
                            <label class="col-form-label">ห้อง</label>
                            <input type="text" class="form-control" name="add_room" id="add_room" >
                        </div>
                        <div class="form-group col-lg-4 col-12">
                            <label class="col-form-label">สีที่อยู่</label>
                            <select class="form-control" name="add_colorcode" id="add_colorcode" required>
                                <?php 
                                            include('../conn.php');
                                        	$sql = "SELECT * FROM `color`  ";
                                            $query = mysqli_query($conn,$sql);
                                        
                                            while($row = $query->fetch_assoc()) {
                                                echo '<option value="'.$row["colorcode"].'">'.$row["colorname"].'</option>';
                                            }
                                    ?>
                                    <option value="">ไม่มีสี</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">กลุ่มสาระ</label>
                            <input type="text" class="form-control" name="add_pergroup" id="add_pergroup" >
                        </div>
                        <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control" name="add_telephone" id="add_telephone" >
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col text-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        <button type="submit" id="btnAddPerson" form="frmAddPerson"
                            class="btn btn-primary">ตกลง</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>