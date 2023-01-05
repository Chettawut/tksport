<?php
	header('Content-Type: application/json');
	include('../../conn.php');
    
    date_default_timezone_set("Asia/Bangkok");

    $strSQL = "UPDATE activity SET ";
    $strSQL .= "status='Y' ";    
    $strSQL .= "WHERE actcode ='".$_POST["actcode"]."' ";

    
	$query = mysqli_query($conn,$strSQL);
    
    // echo $strSQL;


        if($query) {
            echo json_encode(array('status' => '1','message'=> 'อนุมัติ สำเร็จ'));
        }
        else
        {
            echo json_encode(array('status' => '0','message'=> 'Error insert data!'));
        }
    
        mysqli_close($conn);
?>