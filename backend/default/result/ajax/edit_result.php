<?php
	header('Content-Type: application/json');
	include('../../../conn.php');
    
    date_default_timezone_set("Asia/Bangkok");

    $strSQL = "UPDATE result SET ";
    $strSQL .= "timecode='".$_POST["timecode"]."' ";    
    $strSQL .= "WHERE resultcode= '".$_POST["resultcode"]."' ";
    $query = mysqli_query($conn,$strSQL);

    if($_POST["resultcolor1"]!='')
    {
        $strSQL = "UPDATE result_detail SET ";
        $strSQL .= "colorcode='".$_POST["resultcolor1"]."' ";        
        $strSQL .= "WHERE detailcode= '".$_POST["detailcode1"]."' ";
        $query = mysqli_query($conn,$strSQL);
    }
    if($_POST["resultcolor2"]!='')
    {
        $strSQL = "UPDATE result_detail SET ";
        $strSQL .= "colorcode='".$_POST["resultcolor2"]."' ";        
        $strSQL .= "WHERE detailcode= '".$_POST["detailcode2"]."' ";
        $query = mysqli_query($conn,$strSQL);
    }
    if($_POST["resultcolor3"]!='')
    {
        $strSQL = "UPDATE result_detail SET ";
        $strSQL .= "colorcode='".$_POST["resultcolor3"]."' ";        
        $strSQL .= "WHERE detailcode= '".$_POST["detailcode3"]."' ";
        $query = mysqli_query($conn,$strSQL);
    }
    if($_POST["resultcolor4"]!='')
    {
        $strSQL = "UPDATE result_detail SET ";
        $strSQL .= "colorcode='".$_POST["resultcolor4"]."' ";        
        $strSQL .= "WHERE detailcode= '".$_POST["detailcode4"]."' ";
        $query = mysqli_query($conn,$strSQL);
    }
    
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