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
                                <option value="AdminColor">Admin ประจำสี</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-5 col-12">
                            <label class="col-form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" required>
                        </div>
                        <div class="form-group col-lg-5 col-12">
                            <label class="col-form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" required disabled>
                        </div>
                        <div class="form-group col-lg-2 col-12">
                            <label class="col-form-label">รีเซ็ต Password</label>
                            <button type="button" class="btn btn-secondary form-control" data-toggle="modal"
                                data-target="#modal_reset" data-dismiss="modal">Reset</button>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="form-group col-lg-2 col-12">
                            <label class="col-form-label">คำนำหน้า</label>
                            <select class="form-control" name="titlename" id="titlename" required>
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
                            <select class="form-control" name="level" id="level" required>
                                <option value="1">ม.1</option>
                                <option value="2">ม.2</option>
                                <option value="3">ม.3</option>
                                <option value="4">ม.4</option>
                                <option value="5">ม.5</option>
                                <option value="6">ม.6</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4 col-12">
                            <label class="col-form-label">ห้อง</label>
                            <select class="form-control" name="room" id="room" required>
                                <option value="1">ห้อง 1</option>
                                <option value="2">ห้อง 2</option>
                                <option value="3">ห้อง 3</option>
                                <option value="4">ห้อง 4</option>
                                <option value="5">ห้อง 5</option>
                                <option value="6">ห้อง 6</option>
                                <option value="7">ห้อง 7</option>
                                <option value="8">ห้อง 8</option>
                                <option value="9">ห้อง 9</option>
                            </select>
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
                                <option value="">ไม่มีสี</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">กลุ่มสาระ</label>
                            <input type="text" class="form-control" name="pergroup" id="pergroup">
                        </div>
                        <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control" name="telephone" id="telephone">
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