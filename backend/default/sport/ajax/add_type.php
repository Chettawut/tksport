<?php
	header('Content-Type: application/json');
    include('../../../conn.php');
    date_default_timezone_set('Asia/Bangkok');
    
    $StrSQL = "INSERT INTO sport_type (spcode,`level`,`gender`,`score1`,`score2`,`score3`,`score4`) ";
    $StrSQL .= "VALUES (";
    $StrSQL .= "'".$_POST["add_spcode"]."','".$_POST["add_level"]."','".$_POST["add_gender"]."','".$_POST["add_score1"]."','".$_POST["add_score2"]."','".$_POST["add_score3"]."','".$_POST["add_score4"]."' ";
    $StrSQL .= ")";
    $query = mysqli_query($conn,$StrSQL);
    

    // echo $StrSQL;


        if($query) {
            echo json_encode(array('status' => '1','message'=> 'เพิ่มประเภทนักกีฬาสำเร็จ'));
        }
        else
        {
            echo json_encode(array('status' => '0','message'=> 'Error insert data!'));
        }
    
        mysqli_close($conn);
?>