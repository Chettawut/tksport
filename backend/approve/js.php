<script type="text/javascript">
$(function() {

    
    $.ajax({
        type: "POST",
        url: "ajax/get_activity.php",
        data: "colorcode=" + $('#colorcode').val(),
        success: function(result) {

            for (count = 0; count < result.actcode.length; count++) {

                $('#tableApprove').append(
                    '<tr ><td data-toggle="modal" data-target="#modal_edit" id="' + result
                    .actcode[
                        count] + '" data-whatever="' + result.actcode[
                        count] + '" style="text-align:center">' + result.titlename[count] +
                    ' ' + result.firstname[count] + ' ' + result.lastname[count] +
                    '</td><td data-toggle="modal" data-target="#modal_edit" id="' + result
                    .actcode[
                        count] + '" data-whatever="' + result.actcode[
                        count] + '" style="text-align:center">' + result.jobname[count] +
                    '</td><td data-toggle="modal" data-target="#modal_edit" id="' + result
                    .actcode[
                        count] + '" data-whatever="' + result.actcode[
                        count] + '" style="text-align:center">' + result.spname[count] +
                    ' ' + result.level[count] + ' ' + result.gender[count] +
                    '</td><td><button type="button" onClick="onApprove(\'' +
                    result.actcode[
                        count] +
                    '\')"; class="btn btn-success form-control" ><i class="fa fa fa-check" aria-hidden="true"></i class=></button></td></tr>'
                );
                // '.$row["spname"].' '.$row["level"].$row["gender"].'
            }

            var table = $('#tableApprove').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "responsive": true,
            });

            $(".dataTables_filter input[type='search']").attr({
                size: 60,
                maxlength: 60
            });



        }
    });


})


function onApprove(actcode) {
    //   alert(actcode)
    $.ajax({
        type: "POST",
        url: "ajax/approve_activity.php",
        data: "actcode=" + $('#actcode').val(),
        success: function(result) {
            if (result.status == 1) // Success
            {
                alert(result.message);
                window.location.reload();
                // console.log(result.message);
            } else {
                alert('รหัสประจำตัวซ้ำ');
            }
        }
    });

}


$('#modal_edit').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var recipient = button.data('whatever');
    var modal = $(this);

    $.ajax({
        type: "POST",
        url: "ajax/getsup_activity.php",
        data: "idcode=" + recipient,
        success: function(result) {
            modal.find('.modal-body #firstname').val(result.titlename + ' ' + result.firstname +
                ' ' + result.lastname);
            modal.find('.modal-body #actdetail').val(result.actdetail);
            modal.find('.modal-body #jobname').val(result.jobname);
            modal.find('.modal-body #spname').val(result.spname + ' ' + result.level +
                ' ' + result.gender);
            modal.find('.modal-body #actcode').val(result.actcode);

        }
    });
});

$("#btnRefresh").click(function() {
    window.location.reload();
});

//เพิ่ม Activity
$("#frmAddActivity").submit(function(e) {
    e.preventDefault();
    // alert($("#frmAddPerson").serialize())
    $.ajax({
        type: "POST",
        url: "ajax/add_activity.php",
        data: $("#frmAddPerson").serialize(),
        success: function(result) {
            if (result.status == 1) // Success
            {
                alert(result.message);
                window.location.reload();
                // console.log(result.message);
            } else {
                alert('รหัสประจำตัวซ้ำ');
            }
        }
    });


});

//อนุมัติ Activity
$("#frmEditActivity").submit(function(e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: "ajax/approve_activity.php",
        data: "actcode=" + $('#actcode').val(),
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

//ไม่อนุมัติ Activity
$("#btnCancleApprove").click(function() {

    $.ajax({
        type: "POST",
        url: "ajax/cancle_activity.php",
        data: "actcode=" + $('#actcode').val(),
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