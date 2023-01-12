<?php
session_start();
include_once('backend/conn.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>



    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T">
    <!-- <link rel="stylesheet" href="css/stu_make.css"> -->
    <link rel="stylesheet" href="stu_make.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
    <?php include_once('css.php');?>
</head>

<body>

    <?php 
    if(isset($_GET['log']))
    {
        if($_GET['log']=='username')
        $message = "Username ไม่ถูกต้อง";
        else if($_GET['log']=='password')
        $message = "Password ไม่ถูกต้อง";
        echo "<script type='text/javascript'>alert('$message');</script>";
        // header( "Location: index.php");
        echo "<script type='text/javascript'>window.location.replace('..');</script>";

    }
    ?>
    <!-- -------------------------------------------- header start -------------------------------------------- -->

    <header class="p-3 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <img src="http://www.thaischool.in.th/_files_school/23100163/data/23100163_0_20210413-133844.png"
                        alt="" width="100" height="80">
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <!-- <li><a href="index.php" class="nav-link px-2 text-white">Home</a></li>
                    <li><a href="#" class="nav-link px-2 text-white" onclick="show()">ข้อมูลการแข่งขัน</a>
                        <div class="dropdown-hidden" id="dropdown">
                            <ul
                                class="dropdown-menu dropdown-menu-dark d-grid gap-1 p-2 rounded-3 mx-0 border-0 shadow w-220px">
                                <li><a class="dropdown-item rounded-2"
                                        href="โปรแกรมการแข่งขัน.pdf">โปรแกรมการแข่งขัน</a></li>
                                <li><a class="dropdown-item rounded-2" href="#">กำหนดการกีฬาสี</a></li>
                                <li><a class="dropdown-item rounded-2" href="#">ผลการแข่งขัน</a></li>
                            </ul>
                        </div>
                    </li> -->
                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#modal_admin"
                            class="nav-link px-2 text-white">คณะผู้จัดทำ</a></li>
                    <?php
                    if(isset($_SESSION['checklogin']))
                    {
                            if($_SESSION['type']=='Admin')
                            {
                                echo '<li><a href="backend/approve" class="btn btn-primary" style="background-color: #008CBA;">กลับไปอนุมัติ &nbsp;<i class="fa fa-arrow-right"></i></a></li>';
                                echo '<li><a href="backend" class="btn btn-primary" style="background-color: #008CBA;">กลับหลังบ้าน &nbsp;<i class="fa fa-arrow-right"></i></a></li>';
                            }                            
                            else if($_SESSION['type']=='AdminColor')
                            echo '<li><a href="backend/approve" class="btn btn-primary" style="background-color: #008CBA;">กลับไปอนุมัติ &nbsp;<i class="fa fa-arrow-right"></i></a></li>';
                        
                    }

                    ?>
                </ul>



                <?php

                if (!isset($_SESSION['checklogin'])) 
                  {
                  ?>
                <!-- <form class="col-7 col-lg-auto mb-3 mb-lg-0 me-lg-3 search" role="search">
                    <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..."
                        aria-label="Search">
                </form> -->
                <div class="text-end relative icon pointer ">
                    <button type="button" class="btn btn-outline-light me-2 " data-bs-toggle="modal"
                        data-bs-target="#exampleModalToggle"><img class="icon-change"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAA6klEQVR4nO2SvQ7BYBiFq4vJQmJRG4bubsFmcyusXERvQppOSETchMUiNiOJn43hkS85RKIt4hNLn+RdTs57Ttu3jpNhA8ADQuCoiYC6zfAdzxitYqMgVODIBGrG0oY2Co4Kuz8tUJW2t1FwUJj3q4JIYWPdw8xEWmijoAFsE45c+7rAoMMO9bkOOryd8IxEABdoAgNgDiyBk2YprS+P+0lwHugBm5g/Jwnj7ZrdV+FlYPGwuAYCoA34QEHjSwvkuWF2y2kFMxnNJ2i9+cY5oAOstDtNM19kKr4T/ghQ0u45zWQF528FGU4MV3Z+ORoPzBgyAAAAAElFTkSuQmCC"
                            width="21" height="22" viewBox="0 0 21 22" fill="none" class="block" data-v-13416097=""> Login
                    </button>
                </div>
                <?php
                  }
                else
                   {                    
                    ?>
                <h4 id="loginname" style="margin-right:20px;">
                    <?php echo $_SESSION['titlename'].' '.$_SESSION['firstname'].' '.$_SESSION['lastname'];?>
                </h4>
                <button type="button" class="btn btn-outline-light me-2 " data-bs-toggle="modal"
                    data-bs-target="#modal_addactivity"><i class="fas fa-plus"></i> เพิ่มกิจกรรมที่ทำ
                </button>
                <button type="button" class="btn btn-outline-light me-2 " data-bs-toggle="modal"
                    data-bs-target="#modal_activity"><i class="fas fa-edit"></i> เช็คสถานะกิจกรรม
                </button>
                <a href="logout.php" class="btn btn-outline-light me-2">Logout</a>
                <?php
                    }
                    ?>
            </div>
        </div>
    </header>

    <div class="content">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                    aria-controls="nav-home" aria-selected="true">หน้าข่าวสาร</a>
                <a class="nav-item nav-link" id="nav-studentlist-tab" data-toggle="tab" href="#nav-studentlist"
                    role="tab" aria-controls="nav-studentlist" aria-selected="false">รายชื่อนักเรียน</a>
                <a class="nav-item nav-link" id="nav-teacherlist-tab" data-toggle="tab" href="#nav-teacherlist"
                    role="tab" aria-controls="nav-teacherlist" aria-selected="false">รายชื่อคุณครู</a>
                <a class="nav-item nav-link" id="nav-sportlist-tab" data-toggle="tab" href="#nav-sportlist" role="tab"
                    aria-controls="nav-sportlist" aria-selected="false">กีฬาที่จัดแข่ง</a>
                <a class="nav-item nav-link" id="nav-programtlist-tab" data-toggle="tab" href="#nav-programlist"
                    role="tab" aria-controls="nav-programlist" aria-selected="false">โปรแกรมการแข่งขัน</a>
            </div>
        </nav>

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div id="carouselExampleIndicators" style="margin-top:0px;" class="carousel slide space-t-32"
                    data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="backend/img/TK_Sport.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="backend/img/TK_Sport.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="backend/img/TK_Sport.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <div class="news">

                    <div class="all-card">

                        <div class="web">
                            <button type="button" class="btn space-p-0 " data-bs-toggle="modal"
                                data-bs-target="#exampleModalToggle">
                                <div class="card">
                                    <img src="img/ลงทะเบียน.png" alt="">
                                </div>
                            </button>
                        </div>
                        <div class="web">
                            <a href="กำหนดการกีฬาสี.html" class="text-white">
                                <div class="card">
                                    <img src="img/กำหนดการแข่งขัน.png" alt="">
                                </div>
                            </a>
                        </div>
                        <div class="web ">
                            <!-- <a id="nav-programtlist-tab" data-toggle="tab"  href="#nav-programlist"
                                role="tab" aria-controls="nav-programlist" aria-selected="false">
                                <div class="card">
                                    <img src="img/โปรแกรมการแข่งขัน.png" alt="">
                                </div>
                            </a> -->
                            <a href="">
                                <div class="card">
                                    <img src="img/โปรแกรมการแข่งขัน.png" alt="">
                                </div>
                            </a>
                        </div>
                        <div class="web ">
                            <a href="#" class="text-white">
                                <div class="card">
                                    <img src="img/กีฬาที่จัดแข่ง.png" alt="">
                                </div>
                            </a>
                        </div>

                    </div>
                    <div class="row table-s-p">
                        <div class="pic-sportdays">
                            <div class="text-score"><h2>ภาพกิจกรรม</h2></div>
                            <div class="all-pic-sportdays">
                                <div class="post">
                                    <div class="post-content">
                                        <img src="img/พิธีเปิดและขบวน/ภาพปก.JPG" alt="">
                                        <p style="text-align:center">บรรยากาศพิธีเปิดและขบวนกีฬาสี</p>
                                    </div>

                                    <div class="post-content">
                                        <img src="img\พิธีเปิดและขบวน\พิธีเปิด-3.JPG" alt="">
                                        <p style="text-align:center">บรรยากาศพิธีเปิดและขบวนกีฬาสี</p>
                                    </div>

                                    <div class="post-content">
                                        <img src="img\พิธีเปิดและขบวน\เขียว_เทพี.jpg" alt="">
                                        <p style="text-align:center">บรรยากาศพิธีเปิดและขบวนกีฬาสี</p>
                                    </div>
                                    
                                </div>
                                
                                
                            </div>
                        </div>
                        <div class="table-score">
                            <div class="text-score"><h2>รายงานผลคะแนน</h2></div>
                            <div class="form-group col-lg-12 col-12 size space-t-32">
                                <table name="tableScore" id="tableScore" class="table table-bordered table-striped ">
                                    <thead style=" background-color:#D6EAF8;">
                                        <tr>
                                            <th style="text-align:center">อันดับ</th>
                                            <th style="text-align:center">ชื่อสี</th>
                                            <th style="text-align:center">คะแนน</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>

                    
                </div>
            </div>
            <div class="tab-pane fade" id="nav-studentlist" role="tabpanel" aria-labelledby="nav-studentlist-tab">
                <br>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-red-tab" data-toggle="pill" href="#pills-red" role="tab"
                            aria-controls="pills-red" aria-selected="true">สีแดง</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-blue-tab" data-toggle="pill" href="#pills-blue" role="tab"
                            aria-controls="pills-blue" aria-selected="false">สีฟ้า</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-green-tab" data-toggle="pill" href="#pills-green" role="tab"
                            aria-controls="pills-green" aria-selected="false">สีเขียว</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-yellow-tab" data-toggle="pill" href="#pills-yellow" role="tab"
                            aria-controls="pills-yellow" aria-selected="false">สีเหลือง</a>
                    </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-red" role="tabpanel"
                        aria-labelledby="pills-red-tab">
                        <table name="tableRed" id="tableRed" class="table table-bordered table-striped table-hover">
                            <thead style=" background-color:#D6EAF8;">
                                <tr>
                                    <th width="15%" style="text-align:center">รหัสประจำตัว</th>
                                    <th width="55%" style="text-align:center">ชื่อ นามสกุล</th>
                                    <th width="15%" style="text-align:center">ห้อง</th>
                                    <th width="15%" style="text-align:center">จำนวนกิจกรรมที่ทำ</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="pills-blue" role="tabpanel" aria-labelledby="pills-blue-tab">
                        <table name="tableBlue" id="tableBlue" class="table table-bordered table-striped table-hover">
                            <thead style=" background-color:#D6EAF8;">
                                <tr>
                                    <th width="15%" style="text-align:center">รหัสประจำตัว</th>
                                    <th width="55%" style="text-align:center">ชื่อ นามสกุล</th>
                                    <th width="15%" style="text-align:center">ห้อง</th>
                                    <th width="15%" style="text-align:center">จำนวนกิจกรรมที่ทำ</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="pills-green" role="tabpanel" aria-labelledby="pills-green-tab">
                        <table name="tableGreen" id="tableGreen" class="table table-bordered table-striped table-hover">
                            <thead style=" background-color:#D6EAF8;">
                                <tr>
                                    <th width="15%" style="text-align:center">รหัสประจำตัว</th>
                                    <th width="55%" style="text-align:center">ชื่อ นามสกุล</th>
                                    <th width="15%" style="text-align:center">ห้อง</th>
                                    <th width="15%" style="text-align:center">จำนวนกิจกรรมที่ทำ</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="pills-yellow" role="tabpanel" aria-labelledby="pills-yellow-tab">
                        <table name="tableYellow" id="tableYellow"
                            class="table table-bordered table-striped table-hover">
                            <thead style=" background-color:#D6EAF8;">
                                <tr>
                                    <th width="15%" style="text-align:center">รหัสประจำตัว</th>
                                    <th width="55%" style="text-align:center">ชื่อ นามสกุล</th>
                                    <th width="15%" style="text-align:center">ห้อง</th>
                                    <th width="15%" style="text-align:center">จำนวนกิจกรรมที่ทำ</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="nav-teacherlist" role="tabpanel" aria-labelledby="nav-teacherlist-tab">
                <br>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-red-tab" data-toggle="pill" href="#pills-red-tc" role="tab"
                            aria-controls="pills-red" aria-selected="true">สีแดง</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-blue-tab" data-toggle="pill" href="#pills-blue-tc" role="tab"
                            aria-controls="pills-blue" aria-selected="false">สีฟ้า</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-green-tab" data-toggle="pill" href="#pills-green-tc" role="tab"
                            aria-controls="pills-green" aria-selected="false">สีเขียว</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-yellow-tab" data-toggle="pill" href="#pills-yellow-tc" role="tab"
                            aria-controls="pills-yellow" aria-selected="false">สีเหลือง</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-red-tc" role="tabpanel"
                        aria-labelledby="pills-red-tab">
                        <table name="tableRedTC" id="tableRedTC" class="table table-bordered table-striped table-hover">
                            <thead style=" background-color:#D6EAF8;">
                                <tr>
                                    <th width="15%" style="text-align:center">รหัสประจำตัว</th>
                                    <th width="55%" style="text-align:center">ชื่อ นามสกุล</th>
                                    <th width="15%" style="text-align:center">ห้อง</th>
                                    <th width="15%" style="text-align:center">จำนวนกิจกรรมที่ทำ</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="pills-blue-tc" role="tabpanel" aria-labelledby="pills-blue-tab">
                        <table name="tableBlueTC" id="tableBlueTC"
                            class="table table-bordered table-striped table-hover">
                            <thead style=" background-color:#D6EAF8;">
                                <tr>
                                    <th width="15%" style="text-align:center">รหัสประจำตัว</th>
                                    <th width="55%" style="text-align:center">ชื่อ นามสกุล</th>
                                    <th width="15%" style="text-align:center">ห้อง</th>
                                    <th width="15%" style="text-align:center">จำนวนกิจกรรมที่ทำ</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="pills-green-tc" role="tabpanel" aria-labelledby="pills-green-tab">
                        <table name="tableGreenTC" id="tableGreenTC"
                            class="table table-bordered table-striped table-hover">
                            <thead style=" background-color:#D6EAF8;">
                                <tr>
                                    <th width="15%" style="text-align:center">รหัสประจำตัว</th>
                                    <th width="55%" style="text-align:center">ชื่อ นามสกุล</th>
                                    <th width="15%" style="text-align:center">ห้อง</th>
                                    <th width="15%" style="text-align:center">จำนวนกิจกรรมที่ทำ</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="pills-yellow-tc" role="tabpanel" aria-labelledby="pills-yellow-tab">
                        <table name="tableYellowTC" id="tableYellowTC"
                            class="table table-bordered table-striped table-hover">
                            <thead style=" background-color:#D6EAF8;">
                                <tr>
                                    <th width="15%" style="text-align:center">รหัสประจำตัว</th>
                                    <th width="55%" style="text-align:center">ชื่อ นามสกุล</th>
                                    <th width="15%" style="text-align:center">ห้อง</th>
                                    <th width="15%" style="text-align:center">จำนวนกิจกรรมที่ทำ</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="nav-sportlist" role="tabpanel" aria-labelledby="nav-teacherlist-tab">
                <table name="tablesport" id="tablesport" class="table table-bordered table-striped table-hover">
                    <thead style=" background-color:#D6EAF8;">
                        <tr>
                            <th width="40%" style="text-align:center">ชื่อกีฬา</th>
                            <th width="30%" style="text-align:center">ระดับชั้น</th>
                            <th width="30%" style="text-align:center">เพศ</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="nav-programlist" role="tabpanel" aria-labelledby="nav-teacherlist-tab">
                <table name="tableprogram" id="tableprogram" class="table table-bordered table-striped table-hover">
                    <thead style=" background-color:#D6EAF8;">
                        <tr>
                            <th width="10%" style="text-align:center">เวลา</th>
                            <th width="50%" style="text-align:center">โปรแกรมการแข่งขัน</th>
                            <th width="20%" style="text-align:center">คู่แข่งขัน</th>
                            <th width="20%" style="text-align:center">ผลการแข่งขัน</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <footer class=" p-5  text-bg-dark">
        <div class="text-center">
            <div>
                <span><img class="space-b-32"
                        src="http://www.thaischool.in.th/_files_school/23100163/data/23100163_0_20210413-133844.png"
                        alt="" width="150" height="120"></span>
                <p>โรงเรียนตราษตระการคุณ <br> 494 หมู่ 8 ถนนเนินตาแมว ตำบลวังกระแจะ อำเภอเมืองตราด <br> จังหวัดตราด
                    23000</p>
            </div>
            <div class="copyright ">
                <p class="space-t-32">Copyright © 2022 Trattrakrankhun school </p>
            </div>
        </div>
    </footer>
    <?php include_once('modal/modal_joblist.php');?>
    <?php include_once('modal/modal_scorelist.php');?>
    <?php include_once('modal/modal_activity.php');?>
    <?php include_once('modal/modal_addactivity.php');?>
    <?php include_once('modal/modal_admin.php');?>
    <?php include_once('modal/modal_login.php');?>
    <?php include_once('modal/modal_register.php');?>




    <script src="js/stu_make.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <?php include_once('js.php');?>
</body>

</html>