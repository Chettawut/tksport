<script type="text/javascript">
$(function() {



    let d = new Date();
    $("#add_timedate").val(d.toISOString().substring(0, 10))
    d.setMinutes(d.getMinutes() - d.getTimezoneOffset());
    $("#add_timetime").val(d.toISOString().slice(11, 16))

    $.ajax({
        type: "POST",
        url: "ajax/get_sporttime.php",
        success: function(result) {

            for (count = 0; count < result.timecode.length; count++) {

                let match,round
                if (result.colorcode3[count] == null)
                match = result.colorcode1[count] + ' VS ' + result.colorcode2[count]
                else
                match = 'ทุกสี'
                    

                if(result.round[count] == '1')
                round= 'รอบทั่วไป'
                else if(result.round[count] == '2')
                round= 'รอบชิงชนะเลิศ'
                else if(result.round[count] == '3')
                round= 'รอบชิงที่ 3'
                else if(result.round[count] = '4')
                round= 'รอบรองชนะเลิศ'

                $('#tableSporttime').append(
                    '<tr data-toggle="modal" data-target="#modal_edit" id="' + result
                    .timecode[
                        count] + '" data-whatever="' + result.timecode[
                        count] + '"><td style="text-align:center">' + result.spname[count] +
                    ' ' + result.level[count] + ' ' + result.gender[count] +
                    '</td><td  style="text-align:center">' + result.timedate[count] +
                    '</td><td  style="text-align:center">' +
                    result.timetime[count] +
                    '</td><td  style="text-align:center">' + match +
                    '</td><td  style="text-align:center">' + round +
                    '</td></tr>');
            }

            var table = $('#tableSporttime').DataTable({
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

$('#modal_edit').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var recipient = button.data('whatever');
    var modal = $(this);

    $.ajax({
        type: "POST",
        url: "ajax/getsup_sporttime.php",
        data: "idcode=" + recipient,
        success: function(result) {
            modal.find('.modal-body #timecode').val(result.timecode);
            modal.find('.modal-body #sptcode').val(result.sptcode);
            modal.find('.modal-body #round').val(result.round);
            modal.find('.modal-body #timedate').val(result.timedate);
            modal.find('.modal-body #timetime').val(result.timetime);
            modal.find('.modal-body #area').val(result.area);
            modal.find('.modal-body #colorcode1').val(result.colorcode1);
            modal.find('.modal-body #colorcode2').val(result.colorcode2);
            modal.find('.modal-body #colorcode3').val(result.colorcode3);
            modal.find('.modal-body #colorcode4').val(result.colorcode4);
        }
    });

});

$("#btnRefresh").click(function() {
    window.location.reload();
});

//เพิ่ม SportTime
$("#frmAddSportTime").submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "ajax/add_sporttime.php",
        data: $("#frmAddSportTime").serialize(),
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

$("#frmEditSportTime").submit(function(e) {
    e.preventDefault();
    $(':disabled').each(function(e) {
        $(this).removeAttr('disabled');
    })
    $.ajax({
        type: "POST",
        url: "ajax/edit_sporttime.php",
        data: $("#frmEditSportTime").serialize(),
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