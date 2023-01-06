<script>
$(function() {






})


$("#add_jobcode").change(function() {

    if ($("#add_jobcode").val() == 1)
        $("#divsptcode").show()
    else {
        $("#divsptcode").hide()
        $("#add_sptcode").val('')
    }
});

$('#modal_activity').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var recipient = button.data('whatever')
    var modal = $(this)

    $("#tableActivity tbody").empty();

    $.ajax({
        type: "POST",
        url: "ajax/getsup_activity.php",
        data: "percode=" + $('#act_percode').val(),
        success: function(result) {
            $("#spanpername").text($("#loginname").text())

            for (count = 0; count < result.actcode.length; count++) {
                var status;

                if (result.status[count] == 'N')
                    status = 'รออนุมัติ'
                else if (result.status[count] == 'Y')
                    status = 'อนุมัติแล้ว'
                else if (result.status[count] == 'C')
                    status = 'ไม่อนุมัติ'

                $('#tableActivity').append(
                    '<tr><td style="text-align:center">' +
                    result.jobname[count] +
                    '</td><td  style="text-align:center">' +
                    result.actdetail[count] +
                    '</td><td  style="text-align:center">' +
                    result.spname[count] +
                    '</td><td  style="text-align:center">' +
                    status +
                    '</td></tr>');
            }
        }
    });
})

$('#modal_joblist').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var recipient = button.data('whatever')
    var modal = $(this)

    $("#tableJoblist tbody").empty();

    $.ajax({
        type: "POST",
        url: "ajax/getsup_joblist.php",
        data: "idcode=" + recipient,
        success: function(result) {

            for (count = 0; count < result.actcode.length; count++) {
                $('#tableJoblist').append(
                    '<tr><td style="text-align:center">' + result.titlename[count] + ' ' +
                    result
                    .firstname[count] + ' ' + result.lastname[count] +
                    '</td><td  style="text-align:center">' + result.jobname[count] +
                    '</td></tr>');
            }
        }
    });
})


//เพิ่ม Person
$("#frmRegister").submit(function(e) {
    e.preventDefault();
    // alert($("#frmRegister").serialize())
    $.ajax({
        type: "POST",
        url: "ajax/add_person.php",
        data: $("#frmRegister").serialize(),
        success: function(result) {
            if (result.status == 1) // Success
            {
                alert(result.message);
                window.location.reload();
                // console.log(result.message);
            } else {
                alert('รหัสนักเรียนซ้ำ');
            }
        }
    });


});

//เพิ่ม Activity
$("#frmAddActivity").submit(function(e) {
    e.preventDefault();
    // alert($("#frmRegister").serialize())
    $.ajax({
        type: "POST",
        url: "ajax/add_activity.php",
        data: $("#frmAddActivity").serialize(),
        success: function(result) {
            if (result.status == 1) // Success
            {
                alert(result.message);
                window.location.reload();
                // console.log(result.message);
            } else {
                alert('รหัสนักเรียนซ้ำ');
            }
        }
    });


});

$.ajax({
    type: "POST",
    url: "ajax/get_sport.php",
    success: function(result) {

        for (count = 0; count < result.spcode.length; count++) {

            $('#tablesport').append(
                '<tr data-toggle="modal" data-target="#modal_sport" data-whatever="' + result
                .spcode[
                    count] + '"><td style="text-align:center">' + result.spname[count] +
                '</td><td  style="text-align:center">' + result.level[count] +
                '</td><td  style="text-align:center">' + result.gender[count] +
                '</td></tr>');
        }
    }
});

$.ajax({
    type: "POST",
    url: "ajax/get_stulistred.php",
    success: function(result) {

        for (count = 0; count < result.percode.length; count++) {

            $('#tableRed').append(
                '<tr data-toggle="modal" data-target="#modal_joblist" data-whatever="' + result
                .percode[
                    count] + '"><td style="text-align:center">' + result.percode[count] +
                '</td><td  style="text-align:center">' + result.titlename[count] + ' ' + result
                .firstname[count] + ' ' + result.lastname[count] +
                '</td><td  style="text-align:center">' + result.count[count] +
                '</td></tr>');
        }
    }
});

$.ajax({
    type: "POST",
    url: "ajax/get_stulistblue.php",
    success: function(result) {

        for (count = 0; count < result.percode.length; count++) {

            $('#tableBlue').append(
                '<tr data-toggle="modal" data-target="#modal_joblist" id="' + result
                .percode[
                    count] + '" data-whatever="' + result.percode[
                    count] + '"><td style="text-align:center">' + result.percode[count] +
                '</td><td  style="text-align:center">' + result.titlename[count] + ' ' + result
                .firstname[count] + ' ' + result.lastname[count] +
                '</td><td  style="text-align:center">' + result.count[count] +
                '</td></tr>');
        }
    }
});

$.ajax({
    type: "POST",
    url: "ajax/get_stulistgreen.php",
    success: function(result) {

        for (count = 0; count < result.percode.length; count++) {

            $('#tableGreen').append(
                '<tr data-toggle="modal" data-target="#modal_joblist" id="' + result
                .percode[
                    count] + '" data-whatever="' + result.percode[
                    count] + '"><td style="text-align:center">' + result.percode[count] +
                '</td><td  style="text-align:center">' + result.titlename[count] + ' ' + result
                .firstname[count] + ' ' + result.lastname[count] +
                '</td><td  style="text-align:center">' + result.count[count] +
                '</td></tr>');
        }
    }
});

$.ajax({
    type: "POST",
    url: "ajax/get_stulistyellow.php",
    success: function(result) {

        for (count = 0; count < result.percode.length; count++) {

            $('#tableYellow').append(
                '<tr data-toggle="modal" data-target="#modal_joblist" id="' + result
                .percode[
                    count] + '" data-whatever="' + result.percode[
                    count] + '"><td style="text-align:center">' + result.percode[count] +
                '</td><td  style="text-align:center">' + result.titlename[count] + ' ' + result
                .firstname[count] + ' ' + result.lastname[count] +
                '</td><td  style="text-align:center">' + result.count[count] +
                '</td></tr>');
        }
    }
});

$.ajax({
    type: "POST",
    url: "ajax/get_tclistred.php",
    success: function(result) {

        for (count = 0; count < result.percode.length; count++) {

            $('#tableRedTC').append(
                '<tr data-toggle="modal" data-target="#modal_joblist" data-whatever="' + result
                .percode[
                    count] + '"><td style="text-align:center">' + result.percode[count] +
                '</td><td  style="text-align:center">' + result.titlename[count] + ' ' + result
                .firstname[count] + ' ' + result.lastname[count] +
                '</td><td  style="text-align:center">' + result.count[count] +
                '</td></tr>');
        }
    }
});

$.ajax({
    type: "POST",
    url: "ajax/get_tclistblue.php",
    success: function(result) {

        for (count = 0; count < result.percode.length; count++) {

            $('#tableBlueTC').append(
                '<tr data-toggle="modal" data-target="#modal_joblist" id="' + result
                .percode[
                    count] + '" data-whatever="' + result.percode[
                    count] + '"><td style="text-align:center">' + result.percode[count] +
                '</td><td  style="text-align:center">' + result.titlename[count] + ' ' + result
                .firstname[count] + ' ' + result.lastname[count] +
                '</td><td  style="text-align:center">' + result.count[count] +
                '</td></tr>');
        }
    }
});

$.ajax({
    type: "POST",
    url: "ajax/get_tclistgreen.php",
    success: function(result) {

        for (count = 0; count < result.percode.length; count++) {

            $('#tableGreenTC').append(
                '<tr data-toggle="modal" data-target="#modal_joblist" id="' + result
                .percode[
                    count] + '" data-whatever="' + result.percode[
                    count] + '"><td style="text-align:center">' + result.percode[count] +
                '</td><td  style="text-align:center">' + result.titlename[count] + ' ' + result
                .firstname[count] + ' ' + result.lastname[count] +
                '</td><td  style="text-align:center">' + result.count[count] +
                '</td></tr>');
        }
    }
});

$.ajax({
    type: "POST",
    url: "ajax/get_tclistyellow.php",
    success: function(result) {

        for (count = 0; count < result.percode.length; count++) {

            $('#tableYellowTC').append(
                '<tr data-toggle="modal" data-target="#modal_joblist" id="' + result
                .percode[
                    count] + '" data-whatever="' + result.percode[
                    count] + '"><td style="text-align:center">' + result.percode[count] +
                '</td><td  style="text-align:center">' + result.titlename[count] + ' ' + result
                .firstname[count] + ' ' + result.lastname[count] +
                '</td><td  style="text-align:center">' + result.count[count] +
                '</td></tr>');
        }
    }
});
</script>