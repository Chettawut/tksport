<script type="text/javascript">
$(function() {

    
    $.ajax({
        type: "POST",
        url: "ajax/get_person.php",        
        success: function(result) {

            for (count = 0; count < result.percode.length; count++) {

                $('#tablePerson').append(
                    '<tr data-toggle="modal" data-target="#modal_edit" id="' + result
                    .percode[
                        count] + '" data-whatever="' + result.percode[
                        count] + '"><td style="text-align:center">' + result.percode[count] + '</td><td  style="text-align:center">' + result.firstname[count] + ' ' + result.lastname[count] + '</td><td  style="text-align:center">' + result.type[count] + '</td></tr>');
            }

            var table = $('#tablePerson').DataTable({
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
        url: "ajax/getsup_person.php",
        data: "idcode=" + recipient,
        success: function(result) {     
            modal.find('.modal-body #percode').val(result.percode);
            modal.find('.modal-body #firstname').val(result.firstname);


        }
    });
});

$("#btnRefresh").click(function() {
    window.location.reload();
});

//เพิ่ม Person
$("#frmAddPerson").submit(function(e) {
    e.preventDefault();
    // alert($("#frmAddPerson").serialize())
    $.ajax({
        type: "POST",
        url: "ajax/add_person.php",
        data: $("#frmAddPerson").serialize(),
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