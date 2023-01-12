<?php
    session_start();
    if (!isset($_SESSION['checklogin'])) {
        header('Location: ../');
        exit;
    }
    include_once('conn.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <?php include_once('import_css.php'); ?>
</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php echo PATH; ?>/img/logo.png" alt="AdminLTELogo" height="80"
                width="90">
        </div>

        <?php include_once('menu_head.php'); ?>

        <?php include_once('menu_left.php'); ?>




        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
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
            </section>
        </div>


    </div>
    <?php include_once('import_js.php'); ?>

    <?php include_once('modal/modal_scorelist.php');?>

</body>

</html>

<script>
$.ajax({
    type: "POST",
    url: "../ajax/get_score.php",
    success: function(result) {

        for (count = 0; count < result.num.length; count++) {

            $('#tableScore').append(
                '<tr data-toggle="modal" data-target="#modal_scorelist" data-whatever="' + result
                .colorcode[
                    count] + '"><td style="text-align:center">' + result.num[count] +
                '</td><td  style="text-align:center">' + result.colorname[count] +
                '</td><td  style="text-align:center">' + result.score[count] +
                '</td></tr>');
        }
    }
});

$('#modal_scorelist').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var recipient = button.data('whatever')
    var modal = $(this)

    $("#tableScorelist tbody").empty();
    $("#tableScorelist tfoot").empty();

    $.ajax({
        type: "POST",
        url: "../ajax/getsup_score.php",
        data: "idcode=" + recipient,
        success: function(result) {

            let sum = 0

            for (count = 0; count < result.spname.length; count++) {

                sum+=parseInt(result.score[count])

                $('#tableScorelist tbody').append(
                    '<tr ><td style="text-align:center">' + (count+1) +
                    '</td><td style="text-align:left">' + result.spname[count]+ ' ' + result.level[count]+ ' ' + result.gender[count] +
                    '</td><td  style="text-align:center">' + result.rank[count] +
                    '</td><td  style="text-align:center">' + result.score[count] +
                    '</td></tr>');

            }

            $('#tableScorelist tfoot').append(
                    '<tr ><td style="text-align:right" colspan="3">คะแนนรวม</td><td  style="text-align:center">' + sum +
                    '</td></tr>');
        }
    });
})
</script>