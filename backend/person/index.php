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
    <title>Person</title>

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

        <?php include_once ROOT . '/menu_left.php'; ?>



        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Person</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Default</a></li>
                                <li class="breadcrumb-item">Person</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-6">
                            <form data-ajax="false" target="_blank" method="post">
                                <div data-role="fieldcontain">
                                    <div class="btn-group" id="btnAdd" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#modal_add"><i class="fa fa fa-tags" aria-hidden="true"></i>
                                            เพิ่ม Person</button>
                                        <button type="button" id="btnRefresh" class="btn btn-primary"><i
                                                class="fas fa-sync-alt" aria-hidden="true"></i> Refresh</button>
                                    </div>
                                    <div class="btn-group" id="btnBack" style="display:none;" role="group"
                                        aria-label="Basic example">
                                        <button type="button" class="btn btn-success"><i class="fa fa fa-tags"
                                                aria-hidden="true"></i>
                                            ย้อนกลับ</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <table name="tablePerson" id="tablePerson" class="table table-bordered table-striped">
                                <thead style=" background-color:#D6EAF8;">
                                    <tr>
                                        <th width="20%" style="text-align:center">รหัสประจำตัว</th>
                                        <th width="60%" style="text-align:center">ชื่อ นามสกุล</th>
                                        <th width="20%" style="text-align:center">ประเภท</th>
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
        <?php include_once('modal/modal_reset.php');?>

    </div>

    <?php
    include_once ROOT . '/import_js.php';
    

    include_once('js.php'); 
    ?>

</body>

</html>