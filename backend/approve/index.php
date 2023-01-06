<?php
    session_start();
    if (!isset($_SESSION['checklogin'])) {
        header('Location: ../');
        exit;
    }
    include_once('../conn.php');
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>อนุมัติ Approve</title>

    <?php 
    include_once('css.php'); 
    include_once('../config.php');
    include_once ROOT .'/func.php';
    include_once ROOT .'/import_css.php';    
    ?>
</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php echo PATH; ?>/img/logo.png" alt="AdminLTELogo" height="80"
                width="90">
        </div>

        <?php include_once ROOT . '/menu_head.php'; ?>

        <?php include_once 'menu_left.php'; ?>



        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">อนุมัติ Approve</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">                                
                                <li class="breadcrumb-item">Approve</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <input type="hidden" id="colorcode" name="colorcode" value="<?php  echo $_SESSION['colorcode'];?>">
                
                    <form data-ajax="false" target="_blank" method="post">
                        <div class="row">
                            <div class="form-group col-lg-2 col-12">
                                <div data-role="fieldcontain">
                                    <button type="button" class="btn btn-success form-control" data-toggle="modal"
                                        data-target="#modal_add"><i class="fa fa fa-tags" aria-hidden="true"></i>
                                        เพิ่ม Job</button>

                                </div>
                            </div>
                            <div class="form-group col-lg-2 col-12">
                                <div data-role="fieldcontain">
                                    <button type="button" id="btnRefresh" class="btn btn-primary form-control"><i
                                            class="fas fa-sync-alt" aria-hidden="true"></i> Refresh</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <table name="tableApprove" id="tableApprove" class="table table-bordered table-striped">
                                <thead style=" background-color:#D6EAF8;">
                                    <tr>
                                        <th width="30%" style="text-align:center">ชื่อ นามสกุล</th>
                                        <th width="30%" style="text-align:center">กิจกรรม</th>
                                        <th width="35%" style="text-align:center">กีฬา</th>                                        
                                        <th width="5%" style="text-align:center">อนุมัติ</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </section>
        </div>


        <?php include_once('modal/modal_add.php');?>
        <?php include_once('modal/modal_edit.php');?>

    </div>

    <?php
    include_once ROOT . '/import_js.php';
    

    include_once('js.php'); 
    ?>

</body>

</html>