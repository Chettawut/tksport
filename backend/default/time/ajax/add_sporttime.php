<?php
	header('Content-Type: application/json');
    include('../../../conn.php');
    date_default_timezone_set('Asia/Bangkok');
    
    $StrSQL = "INSERT INTO sport_time ( `sptcode`,`round`,`colorcode1`,`colorcode2`,`colorcode3`,`colorcode4`,`timedate`,`timetime`,area) ";
    $StrSQL .= "VALUES (";
    $StrSQL .= "'".$_POST["add_sptcode"]."','".$_POST["add_round"]."' ";
    $StrSQL .= ",'".$_POST["add_colorcode1"]."','".$_POST["add_colorcode2"]."' ";
    $StrSQL .= ",'".$_POST["add_colorcode3"]."','".$_POST["add_colorcode4"]."' ";
    $StrSQL .= ",'".$_POST["add_timedate"]."','".$_POST["add_timetime"]."' ";
    $StrSQL .= ",'".$_POST["add_area"]."' ";
    $StrSQL .= ")";
    $query = mysqli_query($conn,$StrSQL);
    

    // echo $StrSQL;


        if($query) {
            echo json_encode(array('status' => '1','message'=> 'เพิ่มเวลาแข่งกีฬา สำเร็จ'));
        }
        else
        {
            echo json_encode(array('status' => '0','message'=> 'Error insert data!'));
        }
    
        mysqli_close($conn);
?>