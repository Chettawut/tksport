<div class="modal fade bd-example-modal-xl" tabindex="-1" id="modal_add" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content w3-flat-turquoise">
            <div class="modal-header bg-gradient-secondary">
                <h5 class="modal-title">เพิ่มผลการแข่งขัน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="frmAddResult" id="frmAddResult" method="POST" style="padding:10px;"
                action="javascript:void(0);">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-lg-12 col-12">
                            <label class="col-form-label">การแข่งขัน</label>
                            <select class="form-control" name="add_timecode" id="add_timecode" required>
                                <option value="">โปรดเลือก</option>
                                <?php 
                                $sql = "SELECT timecode,spname,level,gender,timedate,timetime,colorcode3,d.colorname as colorname1,e.colorname as colorname2  ";
                                $sql .= " FROM `sport_time` as a inner join sport_type as b on (a.sptcode=b.sptcode) inner join sport as c on (b.spcode=c.spcode)  ";
                                $sql .= "left OUTER join color as d on (a.colorcode1=d.colorcode) ";
	                            $sql .= "left OUTER join color as e on (a.colorcode2=e.colorcode) ";
                                $sql .= " where result_out = 'N' ";
                                $query = mysqli_query($conn,$sql);
                                        
                                while($row = $query->fetch_assoc()) {
                                    if($row["colorcode3"]!='')
                                    echo '<option value="'.$row["timecode"].'">'.$row["spname"].' '.$row["level"].' '.$row["gender"].' '.$row["timedate"].' '.$row["timetime"].' แข่งทุกสี</option>';
                                    else
                                    echo '<option value="'.$row["timecode"].'">'.$row["spname"].' '.$row["level"].' '.$row["gender"].' '.$row["timedate"].' '.$row["timetime"].' '.$row["colorname1"].' เจอกับ '.$row["colorname2"].'</option>';
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-3 col-12">
                            <label for="recipient-name" class="col-form-label">ได้ที่1</label>
                            <select class="form-control" name="add_resultcolor1" id="add_resultcolor1" required>
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
                            <label for="recipient-name" class="col-form-label">ได้ที่2</label>
                            <select class="form-control" name="add_resultcolor2" id="add_resultcolor2" required>
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
                            <label for="recipient-name" class="col-form-label">ได้ที่3</label>
                            <select class="form-control" name="add_resultcolor3" id="add_resultcolor3">
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
                            <label for="recipient-name" class="col-form-label">ได้ที่4</label>
                            <select class="form-control" name="add_resultcolor4" id="add_resultcolor4">
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
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col text-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        <button type="submit" id="btnAddResult" form="frmAddResult"
                            class="btn btn-primary">ตกลง</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>