<script type="text/javascript">
$(function() {


    $.ajax({
        type: "POST",
        url: "ajax/get_sport.php",
        success: function(result) {

            for (count = 0; count < result.spcode.length; count++) {

                let status
                if (result.status[count] == 'Y')
                    status = 'เปิดใช้งาน'
                else
                    status = 'ปิดใช้งาน'

                $('#tableSport').append(
                    '<tr data-toggle="modal" data-target="#modal_edit" id="' + result
                    .spcode[
                        count] + '" data-whatever="' + result.spcode[
                        count] + '"><td style="text-align:center">' + result.spcode[count] +
                    '</td><td  style="text-align:center">' + result.spname[count] +
                    '</td><td  style="text-align:center">' + status + '</td></tr>');
            }

            var table = $('#tableSport').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "responsive": true,
            });

            $(".dataTables_filter input[type='search']").attr({
                size: 35,
                maxlength: 60
            });



        }
    });


})

$('#modal_edittype').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var recipient = button.data('whatever');
    var modal = $(this);

    $.ajax({
        type: "POST",
        url: "ajax/getsup_type.php",
        data: "idcode=" + recipient,
        success: function(result) {
            
            modal.find('.modal-body #sptcode').val(result.sptcode);
            modal.find('.modal-body #level').val(result.level);
            modal.find('.modal-body #gender').val(result.gender);
            modal.find('.modal-body #score1').val(result.score1);
            modal.find('.modal-body #score2').val(result.score2);
            modal.find('.modal-body #score3').val(result.score3);
            modal.find('.modal-body #score4').val(result.score4);


        }
    });
});

$('#modal_edit').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var recipient = button.data('whatever');
    var modal = $(this);
    $("#tableEdittypeplayer tbody").empty();

    $.ajax({
        type: "POST",
        url: "ajax/getsup_sport.php",
        data: "idcode=" + recipient,
        success: function(result) {
            modal.find('.modal-body #spcode').val(result.spcode);
            modal.find('.modal-body #spname').val(result.spname);
            modal.find('.modal-body #category').val(result.category);
            
        }
    });

    $.ajax({
        type: "POST",
        url: "ajax/get_type.php",
        data: "idcode=" + recipient,
        success: function(result) {
            for (count = 0; count < result.level.length; count++) {

                $('#tableEdittypeplayer').append(
                    '<tr data-toggle="modal" data-target="#modal_edittype" id="' + result
                    .sptcode[
                        count] + '" data-whatever="' + result.sptcode[
                        count] + '"><td style="text-align:center">' + (count + 1) +
                    '</td><td  style="text-align:center">' + result.level[count] +
                    '</td><td  style="text-align:center">' + result.gender[count] +
                    '</td><td  style="text-align:center">' + result.score1[count] +
                    '</td><td  style="text-align:center">' + result.score2[count] +
                    '</td><td  style="text-align:center">' + result.score3[count] +
                    '</td><td  style="text-align:center">' + result.score4[count] + '</td></tr>'
                    );
            }


        }
    });
});

$("#btnRefresh").click(function() {
    window.location.reload();
});

//เพิ่ม Type
$("#frmAddType").submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "ajax/add_type.php",
        data: $("#frmAddType").serialize() + "&add_spcode=" + $("#spcode").val(),
        success: function(result) {
            if (result.status == 1) // Success
            {
                alert(result.message);
                window.location.reload();
                // console.log(result.message);
            } else {
                alert('รหัสซ้ำ');
            }
        }
    });


});

//เพิ่ม Sport
$("#frmAddSport").submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "ajax/add_sport.php",
        data: $("#frmAddSport").serialize(),
        success: function(result) {
            if (result.status == 1) // Success
            {
                alert(result.message);
                window.location.reload();
                // console.log(result.message);
            } else {
                alert('รหัสซ้ำ');
            }
        }
    });


});

$("#frmEditType").submit(function(e) {
    e.preventDefault();
    $(':disabled').each(function(e) {
        $(this).removeAttr('disabled');
    })
    $.ajax({
        type: "POST",
        url: "ajax/edit_type.php",
        data: $("#frmEditType").serialize(),
        success: function(result) {

            if (result.status == 1) // Success
            {
                alert(result.message);
                window.location.reload();
                // console.log(result.message);
            }
        }
    });

});

$("#frmEditSport").submit(function(e) {
    e.preventDefault();
    $(':disabled').each(function(e) {
        $(this).removeAttr('disabled');
    })
    $.ajax({
        type: "POST",
        url: "ajax/edit_sport.php",
        data: $("#frmEditSport").serialize(),
        success: function(result) {

            if (result.status == 1) // Success
            {
                alert(result.message);
                window.location.reload();
                // console.log(result.message);
            }
        }
    });

});
</script>