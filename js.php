<script>
$(function() {


    
    


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

$.ajax({
    type: "POST",
    url: "ajax/get_listred.php",        
    success: function(result) {
    
        for (count = 0; count < result.percode.length; count++) {

            $('#tableRed').append(
                '<tr data-toggle="modal" data-target="#modal_edit" id="' + result
                .percode[
                    count] + '" data-whatever="' + result.percode[
                    count] + '"><td style="text-align:center">' + result.percode[count] + '</td><td  style="text-align:center">'+ result.titlename[count] + ' '  + result.firstname[count] + ' ' + result.lastname[count] + '</td><td  style="text-align:center">0</td></tr>');
        }
    }
});

$.ajax({
    type: "POST",
    url: "ajax/get_listblue.php",        
    success: function(result) {
    
        for (count = 0; count < result.percode.length; count++) {

            $('#tableBlue').append(
                '<tr data-toggle="modal" data-target="#modal_edit" id="' + result
                .percode[
                    count] + '" data-whatever="' + result.percode[
                    count] + '"><td style="text-align:center">' + result.percode[count] + '</td><td  style="text-align:center">'+ result.titlename[count] + ' ' + result.firstname[count] + ' ' + result.lastname[count] + '</td><td  style="text-align:center">0</td></tr>');
        }
    }
});

$.ajax({
    type: "POST",
    url: "ajax/get_listgreen.php",        
    success: function(result) {
    
        for (count = 0; count < result.percode.length; count++) {

            $('#tableGreen').append(
                '<tr data-toggle="modal" data-target="#modal_edit" id="' + result
                .percode[
                    count] + '" data-whatever="' + result.percode[
                    count] + '"><td style="text-align:center">' + result.percode[count] + '</td><td  style="text-align:center">'+ result.titlename[count] + ' '  + result.firstname[count] + ' ' + result.lastname[count] + '</td><td  style="text-align:center">0</td></tr>');
        }
    }
});

$.ajax({
    type: "POST",
    url: "ajax/get_listyellow.php",        
    success: function(result) {
    
        for (count = 0; count < result.percode.length; count++) {

            $('#tableYellow').append(
                '<tr data-toggle="modal" data-target="#modal_edit" id="' + result
                .percode[
                    count] + '" data-whatever="' + result.percode[
                    count] + '"><td style="text-align:center">' + result.percode[count] + '</td><td  style="text-align:center">'+ result.titlename[count] + ' '  + result.firstname[count] + ' ' + result.lastname[count] + '</td><td  style="text-align:center">0</td></tr>');
        }
    }
});
</script>