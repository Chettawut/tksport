<?php
	header('Content-Type: application/json');
    include('../../conn.php');
    date_default_timezone_set('Asia/Bangkok');

    $password = password_hash($_POST['add_password'], PASSWORD_DEFAULT);
    
    $StrSQL = "INSERT INTO person ( `percode`,`titlename`,`firstname`,`lastname`,`type`,`username`,`password`,`level`,`room`,`colorcode`,`pergroup`,`telephone`) ";
    $StrSQL .= "VALUES (";
    $StrSQL .= "'".$_POST["add_percode"]."','".$_POST["add_titlename"]."','".$_POST["add_firstname"]."','".$_POST["add_lastname"]."','".$_POST["add_type"]."' ";
    $StrSQL .= ",'".$_POST["add_username"]."','".$password."' ";
    $StrSQL .= ",'".$_POST["add_level"]."','".$_POST["add_room"]."','".$_POST["add_colorcode"]."','".$_POST["add_pergroup"]."','".$_POST["add_telephone"]."' ";
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