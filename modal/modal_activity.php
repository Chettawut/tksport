<div class="modal modal2 fade" id="modal_activity" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">เพิ่มกิจกรรมที่ทำ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form name="frmAddActivity" id="frmAddActivity" method="POST" style="padding:10px;"
                action="javascript:void(0);">
                <div class="modal-body" style="padding:20px;text-align:left;">
                    <div class="row">
                        <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">กิจกรรมที่ทำ</label>
                            <select class="form-control" name="add_jobcode" id="add_jobcode" required>
                            <option value="">โปรดเลือก</option>
                                <?php 
                                $sql = "SELECT * FROM `job` where status = 'Y'  ";
                                $query = mysqli_query($conn,$sql);
                                        
                                while($row = $query->fetch_assoc()) {
                                   echo '<option value="'.$row["jobcode"].'">'.$row["jobname"].'</option>';
                                }
                            ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">รายละเอียดการทำงาน</label>
                            <input type="text" class="form-control" name="add_actdetail" id="add_actdetail" required>
                        </div>
                    </div>
                    <div id="divsptcode" class="row" style="display:none;">
                        <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">กีฬาที่เล่น</label>
                            <select class="form-control" name="add_sptcode" id="add_sptcode" >
                            <option value="">โปรดเลือก</option>
                                <?php 
                                $sql = "SELECT * FROM `sport_type` as a inner join sport as b on (a.spcode=b.spcode) ";
                                $query = mysqli_query($conn,$sql);
                                        
                                while($row = $query->fetch_assoc()) {
                                   echo '<option value="'.$row["sptcode"].'">'.$row["spname"].' '.$row["level"].$row["gender"].'</option>';
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                <input type="hidden" name="add_percode" id="add_percode" value="<?php echo $_SESSION['percode'];?>">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="btnAddActivity" form="frmAddActivity" class="btn btn-primary">ตกลง</button>

                </div>
            </form>

        </div>
    </div>
</div>