<script type="text/javascript">
$(function() {

    
    $.ajax({
        type: "POST",
        url: "ajax/get_color.php",        
        success: function(result) {

            for (count = 0; count < result.colorcode.length; count++) {

                $('#tableColor').append(
                    '<tr data-toggle="modal" data-target="#modal_edit" id="' + result
                    .colorcode[
                        count] + '" data-whatever="' + result.colorcode[
                        count] + '"><td style="text-align:center">' + result.colorcode[count] + '</td><td  style="text-align:center">' + result.colorname[count] + '</td></tr>');
            }

            var table = $('#tableColor').DataTable({
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
        url: "ajax/getsup_color.php",
        data: "idcode=" + recipient,
        success: function(result) {     
            modal.find('.modal-body #colorcode').val(result.colorcode);
            modal.find('.modal-body #colorname').val(result.colorname);


        }
    });
});

$("#btnRefresh").click(function() {
    window.location.reload();
});

//เพิ่ม Color
$("#frmAddColor").submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "ajax/add_color.php",
        data: $("#frmAddColor").serialize(),
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

$("#frmEditColor").submit(function(e) {
    e.preventDefault();
    $(':disabled').each(function(e) {
        $(this).removeAttr('disabled');
    })
    $.ajax({
        type: "POST",
        url: "ajax/edit_color.php",
        data: $("#frmEditColor").serialize(),
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