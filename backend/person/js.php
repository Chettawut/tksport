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
            modal.find('.modal-body #username').val(result.username);            
            modal.find('.modal-body #password').val(result.password);            
            modal.find('.modal-body #firstname').val(result.firstname);
            modal.find('.modal-body #lastname').val(result.lastname);
            modal.find('.modal-body #titlename').val(result.titlename);            
            modal.find('.modal-body #type').val(result.type);
            modal.find('.modal-body #level').val(result.level);
            modal.find('.modal-body #room').val(result.room);
            modal.find('.modal-body #colorcode').val(result.colorcode);
            modal.find('.modal-body #pergroup').val(result.pergroup);
            modal.find('.modal-body #telephone').val(result.telephone);

            $('#perresetcode').val(result.percode);            
            $('#resetfirstname').val(result.firstname);
            $('#resetlastname').val(result.lastname);
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
                alert('รหัสประจำตัวซ้ำ');
            }
        }
    });


});

$("#frmEditPerson").submit(function(e) {
    e.preventDefault();
    $(':disabled').each(function(e) {
        $(this).removeAttr('disabled');
    })
    $.ajax({
        type: "POST",
        url: "ajax/edit_person.php",
        data: $("#frmEditPerson").serialize(),
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

$("#frmReset").submit(function(e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: "ajax/reset_password.php",
        data: $("#frmReset").serialize(),
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