<?php
	header('Content-Type: application/json');
	include('../../../conn.php');
    
    date_default_timezone_set("Asia/Bangkok");

    $strSQL = "UPDATE color SET ";
    $strSQL .= "colorname='".$_POST["colorname"]."' ";
    $strSQL .= "WHERE colorcode= '".$_POST["colorcode"]."' ";

    
	$query = mysqli_query($conn,$strSQL);
    
    // echo $strSQL;


        if($query) {
            echo json_encode(array('status' => '1','message'=> 'แก้ไข Color '.$_POST["colorname"].' สำเร็จ'));
        }
        else
        {
            echo json_encode(array('status' => '0','message'=> 'Error insert data!'));
        }
    
        mysqli_close($conn);
?>