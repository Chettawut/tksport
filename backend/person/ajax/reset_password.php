<?php
	header('Content-Type: application/json');
	include('../../conn.php');
    
    date_default_timezone_set("Asia/Bangkok");

    $password = password_hash($_POST['editpassword'], PASSWORD_DEFAULT);

    $strSQL = "UPDATE person SET ";
    $strSQL .= "password='".$password."' ";    
    $strSQL .= "WHERE percode ='".$_POST["perresetcode"]."' ";

    
	$query = mysqli_query($conn,$strSQL);
    
    // echo $strSQL;


        if($query) {
            echo json_encode(array('status' => '1','message'=> 'รีเซ็ต Password สำเร็จ'));
        }
        else
        {
            echo json_encode(array('status' => '0','message'=> 'Error insert data!'));
        }
    
        mysqli_close($conn);
?>