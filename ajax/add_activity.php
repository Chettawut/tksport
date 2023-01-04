<?php
	header('Content-Type: application/json');
    include('../backend/conn.php');
    date_default_timezone_set('Asia/Bangkok');

    $StrSQL = "INSERT INTO activity ( `percode`,`sptcode`,`jobcode`,`actdetail`,`status`) ";
    $StrSQL .= "VALUES (";
    $StrSQL .= "'".$_POST["act_percode"]."','".$_POST["add_sptcode"]."','".$_POST["add_jobcode"]."','".$_POST["add_actdetail"]."','N' ";    
    $StrSQL .= ")";
    $query = mysqli_query($conn,$StrSQL);
    
    // echo $StrSQL;


        if($query) {
            echo json_encode(array('status' => '1','message'=> 'เพิ่มกิจกรรมสำเร็จ กรุณารอ Admin สีอนุมัติอีกครั้ง'));
        }
        else
        {
            echo json_encode(array('status' => '0','message'=> 'Error insert data!'));
        }
    
        mysqli_close($conn);
?>