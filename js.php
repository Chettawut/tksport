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

$('#modal_joblist').on('show.bs.modal', function (event) {
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
    url: "ajax/get_listred.php",
    success: function(result) {

        for (count = 0; count < result.percode.length; count++) {

            $('#tableRed').append(
                '<tr data-toggle="modal" data-target="#modal_joblist" data-whatever="' + result.percode[
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
    url: "ajax/get_listblue.php",
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
    url: "ajax/get_listgreen.php",
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
    url: "ajax/get_listyellow.php",
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
</script>