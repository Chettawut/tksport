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
            let spname
            for (count = 0; count < result.actcode.length; count++) {
                if (result.spname[count] == null)
                    spname = '-'
                else
                    spname = result.spname[count]

                $('#tableJoblist').append(
                    '<tr><td style="text-align:center">' + result.titlename[count] + ' ' +
                    result
                    .firstname[count] + ' ' + result.lastname[count] +
                    '</td><td  style="text-align:center">' + result.jobname[count] +
                    '</td><td  style="text-align:center">' + spname +
                    '</td></tr>');
            }
        }
    });
})

$('#modal_scorelist').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var recipient = button.data('whatever')
    var modal = $(this)

    $("#tableScorelist tbody").empty();
    $("#tableScorelist tfoot").empty();

    $.ajax({
        type: "POST",
        url: "ajax/getsup_score.php",
        data: "idcode=" + recipient,
        success: function(result) {

            let sum = 0

            for (count = 0; count < result.spname.length; count++) {

                sum+=parseInt(result.score[count])

                $('#tableScorelist tbody').append(
                    '<tr ><td style="text-align:center">' + (count+1) +
                    '</td><td style="text-align:left">' + result.spname[count]+ ' ' + result.level[count]+ ' ' + result.gender[count] +
                    '</td><td  style="text-align:center">' + result.rank[count] +
                    '</td><td  style="text-align:center">' + result.score[count] +
                    '</td></tr>');

            }

            $('#tableScorelist tfoot').append(
                    '<tr ><td style="text-align:right" colspan="3">คะแนนรวม</td><td  style="text-align:center">' + sum +
                    '</td></tr>');
        }
    });
})

$('#modal_scorelistboy').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var recipient = button.data('whatever')
    var modal = $(this)

    $("#tableScorelistboy tbody").empty();
    $("#tableScorelistboy tfoot").empty();

    $.ajax({
        type: "POST",
        url: "ajax/getsup_scoreboy.php",
        data: "idcode=" + recipient,
        success: function(result) {

            let sum = 0

            for (count = 0; count < result.spname.length; count++) {

                sum+=parseInt(result.score[count])

                $('#tableScorelistboy tbody').append(
                    '<tr ><td style="text-align:center">' + (count+1) +
                    '</td><td style="text-align:left">' + result.spname[count]+ ' ' + result.level[count]+ ' ' + result.gender[count] +
                    '</td><td  style="text-align:center">' + result.rank[count] +
                    '</td><td  style="text-align:center">' + result.score[count] +
                    '</td></tr>');

            }

            $('#tableScorelistboy tfoot').append(
                    '<tr ><td style="text-align:right" colspan="3">คะแนนรวม</td><td  style="text-align:center">' + sum +
                    '</td></tr>');
        }
    });
})

$('#modal_scorelistgirl').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var recipient = button.data('whatever')
    var modal = $(this)

    $("#tableScorelistgirl tbody").empty();
    $("#tableScorelistgirl tfoot").empty();

    $.ajax({
        type: "POST",
        url: "ajax/getsup_scoregirl.php",
        data: "idcode=" + recipient,
        success: function(result) {

            let sum = 0

            for (count = 0; count < result.spname.length; count++) {

                sum+=parseInt(result.score[count])

                $('#tableScorelistgirl tbody').append(
                    '<tr ><td style="text-align:center">' + (count+1) +
                    '</td><td style="text-align:left">' + result.spname[count]+ ' ' + result.level[count]+ ' ' + result.gender[count] +
                    '</td><td  style="text-align:center">' + result.rank[count] +
                    '</td><td  style="text-align:center">' + result.score[count] +
                    '</td></tr>');

            }

            $('#tableScorelistgirl tfoot').append(
                    '<tr ><td style="text-align:right" colspan="3">คะแนนรวม</td><td  style="text-align:center">' + sum +
                    '</td></tr>');
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
    url: "ajax/get_score.php",
    success: function(result) {

        for (count = 0; count < result.num.length; count++) {

            $('#tableScore').append(
                '<tr data-toggle="modal" data-target="#modal_scorelist" data-whatever="' + result
                .colorcode[
                    count] + '"><td style="text-align:center">' + result.num[count] +
                '</td><td  style="text-align:center">' + result.colorname[count] +
                '</td><td  style="text-align:center">' + result.score[count] +
                '</td></tr>');
        }
    }
});

$.ajax({
    type: "POST",
    url: "ajax/get_scoreboy.php",
    success: function(result) {

        for (count = 0; count < result.num.length; count++) {

            $('#tableScoreBoy').append(
                '<tr data-toggle="modal" data-target="#modal_scorelistboy" data-whatever="' + result
                .colorcode[
                    count] + '"><td style="text-align:center">' + result.num[count] +
                '</td><td  style="text-align:center">' + result.colorname[count] +
                '</td><td  style="text-align:center">' + result.score[count] +
                '</td></tr>');
        }
    }
});

$.ajax({
    type: "POST",
    url: "ajax/get_scoregirl.php",
    success: function(result) {

        for (count = 0; count < result.num.length; count++) {

            $('#tableScoreGirl').append(
                '<tr data-toggle="modal" data-target="#modal_scorelistgirl" data-whatever="' + result
                .colorcode[
                    count] + '"><td style="text-align:center">' + result.num[count] +
                '</td><td  style="text-align:center">' + result.colorname[count] +
                '</td><td  style="text-align:center">' + result.score[count] +
                '</td></tr>');
        }
    }
});


$.ajax({
    type: "POST",
    url: "ajax/get_program.php",
    success: function(result) {

        let odddate, match, resultcolor
        let color = ['', 'สีแดง', 'สีฟ้า', 'สีเขียว', 'สีเหลือง']
        for (count = 0; count < result.spcode.length; count++) {
            if (odddate != result.timedate[count]) {

                const date = new Date(parseInt(result.timedate[count].substring(0, 4)), parseInt(result
                    .timedate[count].substring(5, 7)) - 1, parseInt(result.timedate[count]
                    .substring(8, 10)))
                // alert(result.resultcolor[count])
                const resultdate = date.toLocaleDateString('th-TH', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    weekday: 'long',
                })

                $('#tableprogram').append(
                    '<tr style="font-weight: bold;" ><td style="text-align:center" colspan="4">' +
                    resultdate +
                    '</td></tr>');
            }
            if (result.colorcode3[count] == null)
                match = result.colorcode1[count] + ' VS ' + result.colorcode2[count]
            else
                match = 'ทุกสี'

            if (result.resultcolor[count] == null)
                resultcolor = '-'
            else
                resultcolor = result.resultcolor[count]

            $('#tableprogram').append(
                '<tr data-toggle="modal" data-target="#modal_sport" data-whatever="' + result
                .spcode[
                    count] + '"><td style="text-align:center">' + result.timetime[count] +
                '</td><td  style="text-align:center">' + result.spname[count] + ' ' + result.level[
                    count] + ' ' + result.gender[count] +
                '</td><td  style="text-align:center">' + match +
                '</td><td  style="text-align:center">' + resultcolor +
                '</td></tr>');

            odddate = result.timedate[count]
        }
    }
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
                '</td><td  style="text-align:center">' + result.level[count] + '/' + result.room[
                    count] +
                '</td><td  style="text-align:center">' + result.count[count] +
                '</td></tr>');


        }
        var table = $('#tableRed').DataTable({
            "paging": true,
            "pageLength": 30,
            "order": [
                [3, 'desc']
            ],
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

$.ajax({
    type: "POST",
    url: "ajax/get_stulistblue.php",
    success: function(result) {

        for (count = 0; count < result.percode.length; count++) {

            $('#tableBlue').append(
                '<tr data-toggle="modal" data-target="#modal_joblist" data-whatever="' + result
                .percode[
                    count] + '"><td style="text-align:center">' + result.percode[count] +
                '</td><td  style="text-align:center">' + result.titlename[count] + ' ' + result
                .firstname[count] + ' ' + result.lastname[count] +
                '</td><td  style="text-align:center">' + result.level[count] + '/' + result.room[
                    count] +
                '</td><td  style="text-align:center">' + result.count[count] +
                '</td></tr>');
        }
        var table = $('#tableBlue').DataTable({
            "paging": true,
            "pageLength": 30,
            "order": [
                [3, 'desc']
            ],
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

$.ajax({
    type: "POST",
    url: "ajax/get_stulistgreen.php",
    success: function(result) {

        for (count = 0; count < result.percode.length; count++) {

            $('#tableGreen').append(
                '<tr data-toggle="modal" data-target="#modal_joblist" data-whatever="' + result
                .percode[
                    count] + '"><td style="text-align:center">' + result.percode[count] +
                '</td><td  style="text-align:center">' + result.titlename[count] + ' ' + result
                .firstname[count] + ' ' + result.lastname[count] +
                '</td><td  style="text-align:center">' + result.level[count] + '/' + result.room[
                    count] +
                '</td><td  style="text-align:center">' + result.count[count] +
                '</td></tr>');
        }
        var table = $('#tableGreen').DataTable({
            "paging": true,
            "pageLength": 30,
            "order": [
                [3, 'desc']
            ],
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

$.ajax({
    type: "POST",
    url: "ajax/get_stulistyellow.php",
    success: function(result) {

        for (count = 0; count < result.percode.length; count++) {

            $('#tableYellow').append(
                '<tr data-toggle="modal" data-target="#modal_joblist" data-whatever="' + result
                .percode[
                    count] + '"><td style="text-align:center">' + result.percode[count] +
                '</td><td  style="text-align:center">' + result.titlename[count] + ' ' + result
                .firstname[count] + ' ' + result.lastname[count] +
                '</td><td  style="text-align:center">' + result.level[count] + '/' + result.room[
                    count] +
                '</td><td  style="text-align:center">' + result.count[count] +
                '</td></tr>');
        }
        var table = $('#tableYellow').DataTable({
            "paging": true,
            "pageLength": 30,
            "order": [
                [3, 'desc']
            ],
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
                '</td><td  style="text-align:center">' + result.level[count] + '/' + result.room[
                    count] +
                '</td><td  style="text-align:center">' + result.count[count] +
                '</td></tr>');
        }
        var table = $('#tableRedTC').DataTable({
            "paging": true,
            "pageLength": 30,
            "order": [
                [3, 'desc']
            ],
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

$.ajax({
    type: "POST",
    url: "ajax/get_tclistblue.php",
    success: function(result) {

        for (count = 0; count < result.percode.length; count++) {

            $('#tableBlueTC').append(
                '<tr data-toggle="modal" data-target="#modal_joblist" data-whatever="' + result
                .percode[
                    count] + '"><td style="text-align:center">' + result.percode[count] +
                '</td><td  style="text-align:center">' + result.titlename[count] + ' ' + result
                .firstname[count] + ' ' + result.lastname[count] +
                '</td><td  style="text-align:center">' + result.level[count] + '/' + result.room[
                    count] +
                '</td><td  style="text-align:center">' + result.count[count] +
                '</td></tr>');
        }
        var table = $('#tableBlueTC').DataTable({
            "paging": true,
            "pageLength": 30,
            "order": [
                [3, 'desc']
            ],
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

$.ajax({
    type: "POST",
    url: "ajax/get_tclistgreen.php",
    success: function(result) {

        for (count = 0; count < result.percode.length; count++) {

            $('#tableGreenTC').append(
                '<tr data-toggle="modal" data-target="#modal_joblist" data-whatever="' + result
                .percode[
                    count] + '"><td style="text-align:center">' + result.percode[count] +
                '</td><td  style="text-align:center">' + result.titlename[count] + ' ' + result
                .firstname[count] + ' ' + result.lastname[count] +
                '</td><td  style="text-align:center">' + result.level[count] + '/' + result.room[
                    count] +
                '</td><td  style="text-align:center">' + result.count[count] +
                '</td></tr>');
        }
        var table = $('#tableGreenTC').DataTable({
            "paging": true,
            "pageLength": 30,
            "order": [
                [3, 'desc']
            ],
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

$.ajax({
    type: "POST",
    url: "ajax/get_tclistyellow.php",
    success: function(result) {

        for (count = 0; count < result.percode.length; count++) {

            $('#tableYellowTC').append(
                '<tr data-toggle="modal" data-target="#modal_joblist" data-whatever="' + result
                .percode[
                    count] + '"><td style="text-align:center">' + result.percode[count] +
                '</td><td  style="text-align:center">' + result.titlename[count] + ' ' + result
                .firstname[count] + ' ' + result.lastname[count] +
                '</td><td  style="text-align:center">' + result.level[count] + '/' + result.room[
                    count] +
                '</td><td  style="text-align:center">' + result.count[count] +
                '</td></tr>');
        }
        var table = $('#tableYellowTC').DataTable({
            "paging": true,
            "pageLength": 30,
            "order": [
                [3, 'desc']
            ],
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
</script>