<?php
	header('Content-Type: application/json');
	include('../../../conn.php');
    
    date_default_timezone_set("Asia/Bangkok");

    $strSQL = "UPDATE result SET ";
    $strSQL .= "timecode='".$_POST["timecode"]."',resultcolor1='".$_POST["resultcolor1"]."',resultcolor2='".$_POST["resultcolor2"]."' ";
    $strSQL .= ",resultcolor3='".$_POST["resultcolor3"]."',resultcolor4='".$_POST["resultcolor4"]."' ";    
    $strSQL .= "WHERE resultcode= '".$_POST["resultcode"]."' ";
    
    
	$query = mysqli_query($conn,$strSQL);
    
    // echo $strSQL;


        if($query) {
            echo json_encode(array('status' => '1','message'=> 'แก้ไขผลการแข่งสำเร็จ'));
        }
        else
        {
            echo json_encode(array('status' => '0','message'=> 'Error insert data!'));
        }
    
        mysqli_close($conn);
?>