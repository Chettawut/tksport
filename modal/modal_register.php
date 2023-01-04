<div class="modal modal2 fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered size">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel2">Sign Up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form name="frmRegister" id="frmRegister" method="POST" style="padding:10px;" action="javascript:void(0);">
                <div class="modal-body">
                    <div class="space-t-64 ">
                        <div class="row space-t-32">
                            <div class="col ">
                                <input class=" form-size " type="text" name="add_percode" id="add_percode" minlength="5"
                                    maxlength="5" placeholder="รหัสนักเรียน" required>
                            </div>
                            <div class="col">
                                <select name="add_titlename" id="add_titlename" class="form form-size row-sm"
                                    aria-label=".form-select-lg example" required>
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                    <option value="ด.ช.">ด.ช.</option>
                                    <option value="ด.ญ.">ด.ญ.</option>
                                    <option value="ครู">ครู</option>
                                </select>
                            </div>
                            <div class="col">
                                <input class="FillUser space-t-0 row-sm" type="text" name="add_firstname"
                                    id="add_firstname" placeholder="ชื่อ" required>
                            </div>
                            <div class="col">
                                <input class="FillUser row-sm" type="text" name="add_lastname" id="add_lastname"
                                    placeholder="นามสกุล" required>
                            </div>
                        </div>


                        <div class="row space-t-32 ">
                            <div class="col  ">
                                <select name="add_level" id="add_level" class="form form-size2  "
                                    aria-label=".form-select-lg example" required>
                                    <option value="1">ม.1</option>
                                    <option value="2">ม.2</option>
                                    <option value="3">ม.3</option>
                                    <option value="4">ม.4</option>
                                    <option value="5">ม.5</option>
                                    <option value="6">ม.6</option>
                                </select>
                            </div>

                            <div class="col row-sm">
                                <select name="add_room" id="add_room" class="form form-size2 "
                                    aria-label=".form-select-lg example" required>
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

                            <div class="col row-sm">
                                <select name="add_colorcode" id="add_colorcode" class="form form-size2 "
                                    aria-label=".form-select-lg example" required>
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

                        <div class="row space-t-32 space-b-64">
                            <div class="col">
                                <label for="username">
                                    <i class="fas fa-user "></i>
                                </label>
                                <input class="FillUser" type="text" name="add_username" id="add_username"
                                    placeholder="Username" required>
                            </div>
                            <div class="col">
                                <label for="password">
                                    <i class="fas fa-lock"></i>
                                </label>
                                <input class="FillUser row-sm" type="password" name="add_password" id="add_password"
                                    placeholder="Password" required><br>
                            </div>
                        </div>

                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"
                            data-bs-dismiss="modal">Back to Login</button>
                        <button type="submit" id="btnRegister" form="frmRegister" class="btn btn-primary">Sign
                            Up</button>
                    </div>
            </form>
        </div>
    </div>
</div>