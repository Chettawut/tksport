<?php
    session_start();
    if (!isset($_SESSION['checklogin'])) {
        header('Location: ../');
        exit;
    }
    include_once('../../conn.php');
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sport Result</title>

    <?php 
    include_once('css.php'); 
    include_once('../../config.php');
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

        <?php include_once ROOT . '/menu_left.php'; ?>



        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">ผลการแข่งขัน</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Default</a></li>
                                <li class="breadcrumb-item">ผลการแข่งขัน</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="form-group col-lg-2 col-12">
                            <div data-role="fieldcontain">
                                <button type="button" class="btn btn-success form-control" data-toggle="modal"
                                    data-target="#modal_add"><i class="fa fa fa-tags" aria-hidden="true"></i>
                                    เพิ่ม ผลการแข่งขัน</button>

                            </div>
                        </div>
                        <div class="form-group col-lg-2 col-12">
                            <div data-role="fieldcontain">
                                <button type="button" id="btnRefresh" class="btn btn-primary form-control"><i
                                        class="fas fa-sync-alt" aria-hidden="true"></i> Refresh</button>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <table name="tableSporttime" id="tableSporttime" class="table table-bordered table-striped">
                                <thead style=" background-color:#D6EAF8;">
                                    <tr>
                                        <th width="30%" style="text-align:center">ชื่อกีฬา</th>
                                        <th width="10%" style="text-align:center">สีชนะเลิศ</th>
                                        <th width="15%" style="text-align:center">วันที่แข่ง</th>
                                        <th width="15%" style="text-align:center">เวลาแข่ง</th>
                                        <th width="15%" style="text-align:center">คู่แข่งขัน</th>
                                        <th width="15%" style="text-align:center">รอบการแข่ง</th>
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