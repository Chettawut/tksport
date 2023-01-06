<?php
	header('Content-Type: application/json');
	include('../../../conn.php');
    
    date_default_timezone_set("Asia/Bangkok");

    $strSQL = "UPDATE sport_time SET ";
    $strSQL .= "sptcode='".$_POST["sptcode"]."',round='".$_POST["round"]."',colorcode1='".$_POST["colorcode1"]."',colorcode2='".$_POST["colorcode2"]."' ";
    $strSQL .= ",colorcode3='".$_POST["colorcode3"]."',colorcode4='".$_POST["colorcode4"]."',timedate='".$_POST["timedate"]."',timetime='".$_POST["timetime"]."' ";
    $strSQL .= ",area='".$_POST["area"]."' ";
    $strSQL .= "WHERE timecode= '".$_POST["timecode"]."' ";
    
    
	$query = mysqli_query($conn,$strSQL);
    
    // echo $strSQL;


        if($query) {
            echo json_encode(array('status' => '1','message'=> 'แก้ไข Sport '.$_POST["sptcode"].' สำเร็จ'));
        }
        else
        {
            echo json_encode(array('status' => '0','message'=> 'Error insert data!'));
        }
    
        mysqli_close($conn);
?>