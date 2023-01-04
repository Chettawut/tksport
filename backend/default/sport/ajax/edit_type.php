<?php
	header('Content-Type: application/json');
	include('../../../conn.php');
    
    date_default_timezone_set("Asia/Bangkok");


    $strSQL = "UPDATE sport_type SET ";
    $strSQL .= "level='".$_POST["level"]."',gender='".$_POST["gender"]."',score1='".$_POST["score1"]."' ";
    $strSQL .= ",score2='".$_POST["score2"]."',score3='".$_POST["score3"]."',score4='".$_POST["score4"]."' ";
    $strSQL .= "WHERE sptcode= '".$_POST["sptcode"]."' ";

    
	$query = mysqli_query($conn,$strSQL);
    
    // echo $strSQL;


        if($query) {
            echo json_encode(array('status' => '1','message'=> 'แก้ไข ประเภทนักกีฬา สำเร็จ'));
        }
        else
        {
            echo json_encode(array('status' => '0','message'=> 'Error insert data!'));
        }
    
        mysqli_close($conn);
?>