<script type="text/javascript">
$(function() {

    
    $.ajax({
        type: "POST",
        url: "ajax/get_job.php",        
        success: function(result) {

            for (count = 0; count < result.jobcode.length; count++) {

                let status
                if(result.status[count]=='Y')
                status = 'เปิดใช้งาน'
                else
                status = 'ปิดใช้งาน'

                $('#tableJob').append(
                    '<tr data-toggle="modal" data-target="#modal_edit" id="' + result
                    .jobcode[
                        count] + '" data-whatever="' + result.jobcode[
                        count] + '"><td style="text-align:center">' + result.jobcode[count] + '</td><td  style="text-align:center">' + result.jobname[count] + '</td><td  style="text-align:center">' + status + '</td></tr>');
            }

            var table = $('#tableJob').DataTable({
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


$('#modal_edit').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var recipient = button.data('whatever');
    var modal = $(this);

    $.ajax({
        type: "POST",
        url: "ajax/getsup_job.php",
        data: "idcode=" + recipient,
        success: function(result) {     
            modal.find('.modal-body #jobcode').val(result.jobcode);
            modal.find('.modal-body #jobname').val(result.jobname);
            modal.find('.modal-body #status').val(result.status);

        }
    });
});

$("#btnRefresh").click(function() {
    window.location.reload();
});

//เพิ่ม Job
$("#frmAddJob").submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "ajax/add_job.php",
        data: $("#frmAddJob").serialize(),
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

$("#frmEditJob").submit(function(e) {
    e.preventDefault();
    $(':disabled').each(function(e) {
        $(this).removeAttr('disabled');
    })
    $.ajax({
        type: "POST",
        url: "ajax/edit_job.php",
        data: $("#frmEditJob").serialize(),
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