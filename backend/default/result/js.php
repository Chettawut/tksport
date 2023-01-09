<script type="text/javascript">
$(function() {


    $.ajax({
        type: "POST",
        url: "ajax/get_result.php",
        success: function(result) {

            for (count = 0; count < result.timecode.length; count++) {

                let match, round
                if (result.colorcode3[count] == null)
                    match = result.colorcode1[count] + ' VS ' + result.colorcode2[count]
                else
                    match = 'ทุกสี'

                if (result.round[count] == '1')
                    round = 'รอบทั่วไป'
                else if (result.round[count] == '2')
                    round = 'รอบชิงชนะเลิศ'
                else if (result.round[count] == '3')
                    round = 'รอบชิงที่ 3'
                else if (result.round[count] == '4')
                    round = 'รอบรองชนะเลิศ'

                $('#tableSporttime').append(
                    '<tr data-toggle="modal" data-target="#modal_edit" id="' + result
                    .resultcode[
                        count] + '" data-whatever="' + result.resultcode[
                        count] + '"><td style="text-align:center">' + result.spname[count] +
                    ' ' + result.level[count] + ' ' + result.gender[count] +
                    '</td><td  style="text-align:center">' +
                    result.resultcolor1[count] +
                    '</td><td  style="text-align:center">' + result.timedate[count] +
                    '</td><td  style="text-align:center">' +
                    result.timetime[count] +
                    '</td><td  style="text-align:center">' +
                    match +
                    '</td><td  style="text-align:center">' +
                    round +
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
        url: "ajax/getsup_result.php",
        data: "idcode=" + recipient,
        success: function(result) {
            modal.find('.modal-body #resultcode').val(result.resultcode[0]);
            modal.find('.modal-body #timecode').val(result.timecode[0]);
            modal.find('.modal-body #round').val(result.round[0]);

            if (result.resultcode.length < '3') {
                $('#div3').hide()
                $('#div4').hide()
                modal.find('.modal-body #resultcolor3').val('');
                modal.find('.modal-body #detailcode3').val('');
                modal.find('.modal-body #resultcolor4').val('');
                modal.find('.modal-body #detailcode4').val('');
            } else {
                $('#div3').show()
                $('#div4').show()
            }

            for (count = 0; count < result.resultcode.length; count++) {
                modal.find('.modal-body #resultcolor'+(count+1)).val(result.colorcode[count]);
                modal.find('.modal-body #detailcode'+(count+1)).val(result.detailcode[count]);
            }
        }
    });

});

$("#btnRefresh").click(function() {
    window.location.reload();
});

//เพิ่ม Result
$("#frmAddResult").submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "ajax/add_result.php",
        data: $("#frmAddResult").serialize(),
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

$("#frmEditResult").submit(function(e) {
    e.preventDefault();
    $(':disabled').each(function(e) {
        $(this).removeAttr('disabled');
    })
    // alert($("#frmEditResult").serialize())
    $.ajax({
        type: "POST",
        url: "ajax/edit_result.php",
        data: $("#frmEditResult").serialize(),
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