<?php
	header('Content-Type: application/json');
    include('../backend/conn.php');
    date_default_timezone_set('Asia/Bangkok');

    $password = password_hash($_POST['add_password'], PASSWORD_DEFAULT);
    
    $StrSQL = "INSERT INTO person ( `percode`,`titlename`,`firstname`,`lastname`,`type`,`username`,`password`,`level`,`room`,`colorcode`) ";
    $StrSQL .= "VALUES (";
    $StrSQL .= "'".$_POST["add_percode"]."','".$_POST["add_titlename"]."','".$_POST["add_firstname"]."','".$_POST["add_lastname"]."','นักเรียน' ";
    $StrSQL .= ",'".$_POST["add_username"]."','".$password."' ";
    $StrSQL .= ",'".$_POST["add_level"]."','".$_POST["add_room"]."','".$_POST["add_colorcode"]."' ";
    $StrSQL .= ")";
    $query = mysqli_query($conn,$StrSQL);
    
    // echo $StrSQL;


        if($query) {
            echo json_encode(array('status' => '1','message'=> 'สมัครสมาชิกรหัสนักเรียน '.$_POST["add_percode"].' สำเร็จ'));
        }
        else
        {
            echo json_encode(array('status' => '0','message'=> 'Error insert data!'));
        }
    
        mysqli_close($conn);
?>