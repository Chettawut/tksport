<?php
	header('Content-Type: application/json');
    include('../../conn.php');
    date_default_timezone_set('Asia/Bangkok');
    
    $StrSQL = "INSERT INTO person ( `percode`,`firstname`,`surname`,`type`) ";
    $StrSQL .= "VALUES (";
    $StrSQL .= "'".$_POST["add_percode"]."','".$_POST["add_firstname"]."','".$_POST["add_lastname"]."','".$_POST["add_type"]."' ";
    $StrSQL .= ")";
    $query = mysqli_query($conn,$StrSQL);
    

    // echo $StrSQL;


        if($query) {
            echo json_encode(array('status' => '1','message'=> 'เพิ่มบุคคล '.$_POST["add_firstname"].' สำเร็จ'));
        }
        else
        {
            echo json_encode(array('status' => '0','message'=> 'Error insert data!'));
        }
    
        mysqli_close($conn);
?>