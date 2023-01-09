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
            <form name="frmEditSportTime" id="frmEditSportTime" method="POST" style="padding:10px;"
                action="javascript:void(0);">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">ชื่อ กีฬา</label>
                            <select class="form-control" name="sptcode" id="sptcode" required>
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
                        <div class="form-group col-lg-6 col-12">
                            <label for="recipient-name" class="col-form-label">รอบแข่งขัน</label>
                            <select class="form-control" name="round" id="round">
                                <option value="1">รอบทั่วไป</option>
                                <option value="2">รอบชิงชนะเลิศ</option>
                                <option value="3">รอบชิงที่ 3</option>
                                <option value="4">รอบรองชนะเลิศ</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4 col-12">
                            <label for="recipient-name" class="col-form-label">วันที่แข่ง</label>
                            <input type="date" name="timedate" id="timedate" class="form-control">
                        </div>
                        <div class="form-group col-lg-4 col-12">
                            <label for="recipient-name" class="col-form-label">เวลาแข่ง</label>
                            <input type="time" name="timetime" id="timetime" class="form-control">
                        </div>
                        <div class="form-group col-lg-4 col-12">
                            <label for="recipient-name" class="col-form-label">สนามแข่ง</label>
                            <input type="text" name="area" id="area" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-3 col-12">
                            <label for="recipient-name" class="col-form-label">สีที่1</label>
                            <select class="form-control" name="colorcode1" id="colorcode1" required>
                                <option value=""></option>
                                <?php 
                                        	$sql = "SELECT * FROM `color`  ";
                                            $query = mysqli_query($conn,$sql);
                                        
                                            while($row = $query->fetch_assoc()) {
                                                echo '<option value="'.$row["colorcode"].'">'.$row["colorname"].'</option>';
                                            }
                                    ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-3 col-12">
                            <label for="recipient-name" class="col-form-label">สีที่2</label>
                            <select class="form-control" name="colorcode2" id="colorcode2" required>
                                <option value=""></option>
                                <?php 
                                        	$sql = "SELECT * FROM `color`  ";
                                            $query = mysqli_query($conn,$sql);
                                        
                                            while($row = $query->fetch_assoc()) {
                                                echo '<option value="'.$row["colorcode"].'">'.$row["colorname"].'</option>';
                                            }
                                    ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-3 col-12">
                            <label for="recipient-name" class="col-form-label">สีที่3</label>
                            <select class="form-control" name="colorcode3" id="colorcode3">
                                <option value=""></option>
                                <?php 
                                        	$sql = "SELECT * FROM `color`  ";
                                            $query = mysqli_query($conn,$sql);
                                        
                                            while($row = $query->fetch_assoc()) {
                                                echo '<option value="'.$row["colorcode"].'">'.$row["colorname"].'</option>';
                                            }
                                    ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-3 col-12">
                            <label for="recipient-name" class="col-form-label">สีที่4</label>
                            <select class="form-control" name="colorcode4" id="colorcode4">
                                <option value=""></option>
                                <?php 
                                        	$sql = "SELECT * FROM `color`  ";
                                            $query = mysqli_query($conn,$sql);
                                        
                                            while($row = $query->fetch_assoc()) {
                                                echo '<option value="'.$row["colorcode"].'">'.$row["colorname"].'</option>';
                                            }
                                    ?>
                            </select>
                        </div>
                        <input type="hidden" id="timecode" name="timecode">
                    </div>
                    <div class="modal-footer">
                        <div class="col text-center">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                            <button type="submit" id="btnEditSportTime" form="frmEditSportTime"
                                class="btn btn-primary">แก้ไข</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>