<?php
	header('Content-Type: application/json');
    include('../../../conn.php');
    date_default_timezone_set('Asia/Bangkok');
    
    $StrSQL = "INSERT INTO result ( `timecode`,`resultcolor1`,`resultcolor2`,`resultcolor3`,`resultcolor4`) ";
    $StrSQL .= "VALUES (";
    $StrSQL .= "'".$_POST["add_timecode"]."' ";
    $StrSQL .= ",'".$_POST["add_resultcolor1"]."','".$_POST["add_resultcolor2"]."' ";
    $StrSQL .= ",'".$_POST["add_resultcolor3"]."','".$_POST["add_resultcolor4"]."' ";
    $StrSQL .= ")";
    $query = mysqli_query($conn,$StrSQL);
    
    if($query) {
    $strSQL = "UPDATE sport_time SET ";
    $strSQL .= "result_out='Y' ";    
    $strSQL .= "WHERE timecode= '".$_POST["add_timecode"]."' ";
    
    
	$query2 = mysqli_query($conn,$strSQL);
    }
    else
        {
            echo json_encode(array('status' => '0','message'=> 'Error insert data!'));
        }
    // echo $StrSQL;


        if($query2) {
            echo json_encode(array('status' => '1','message'=> 'เพิ่มผลการแข่งกีฬา สำเร็จ'));
        }
        else
        {
            echo json_encode(array('status' => '0','message'=> 'Error insert data!'));
        }
    
        mysqli_close($conn);
?>