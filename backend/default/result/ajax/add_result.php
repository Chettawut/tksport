<?php
	header('Content-Type: application/json');
    include('../../../conn.php');
    date_default_timezone_set('Asia/Bangkok');
    
    $sql = "SELECT * FROM result order by resultcode desc LIMIT 1";
	$query = mysqli_query($conn,$sql);

        while($row = $query->fetch_assoc()) {
            $code=((int)$row["resultcode"])+1;
        }        

    $StrSQL = "INSERT INTO result ( resultcode,`timecode`) ";
    $StrSQL .= "VALUES (";
    $StrSQL .= "'".$code."','".$_POST["add_timecode"]."' ";
    // $StrSQL .= ",'".$_POST["add_resultcolor1"]."','".$_POST["add_resultcolor2"]."' ";
    // $StrSQL .= ",'".$_POST["add_resultcolor3"]."','".$_POST["add_resultcolor4"]."' ";
    $StrSQL .= ")";
    $query = mysqli_query($conn,$StrSQL);

    if($_POST["add_resultcolor1"]!='')
    {
        $StrSQL = "INSERT INTO result_detail ( resultcode,`colorcode`,`order_no`) ";
        $StrSQL .= "VALUES (";
        $StrSQL .= "'".$code."','".$_POST["add_resultcolor1"]."','1' ";    
        $StrSQL .= ")";
        $query = mysqli_query($conn,$StrSQL);
    }
    if($_POST["add_resultcolor2"]!='')
    {
        $StrSQL = "INSERT INTO result_detail ( resultcode,`colorcode`,`order_no`) ";
        $StrSQL .= "VALUES (";
        $StrSQL .= "'".$code."','".$_POST["add_resultcolor2"]."','2' ";    
        $StrSQL .= ")";
        $query = mysqli_query($conn,$StrSQL);
    }
    if($_POST["add_resultcolor3"]!='')
    {
        $StrSQL = "INSERT INTO result_detail ( resultcode,`colorcode`,`order_no`) ";
        $StrSQL .= "VALUES (";
        $StrSQL .= "'".$code."','".$_POST["add_resultcolor3"]."','3' ";    
        $StrSQL .= ")";
        $query = mysqli_query($conn,$StrSQL);
    }
    if($_POST["add_resultcolor4"]!='')
    {
        $StrSQL = "INSERT INTO result_detail ( resultcode,`colorcode`,`order_no`) ";
        $StrSQL .= "VALUES (";
        $StrSQL .= "'".$code."','".$_POST["add_resultcolor4"]."','4' ";    
        $StrSQL .= ")";
        $query = mysqli_query($conn,$StrSQL);
    }
    
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