<?php
	header('Content-Type: application/json');
	include('../../conn.php');
    
    date_default_timezone_set("Asia/Bangkok");

    $strSQL = "UPDATE person SET ";
    $strSQL .= "firstname='".$_POST["firstname"]."',lastname='".$_POST["lastname"]."',titlename='".$_POST["titlename"]."' ";
    $strSQL .= ",username='".$_POST["username"]."',type='".$_POST["type"]."' ";
    $strSQL .= ",level='".$_POST["level"]."',room='".$_POST["room"]."' ";
    $strSQL .= ",colorcode='".$_POST["colorcode"]."',pergroup='".$_POST["pergroup"]."',telephone='".$_POST["telephone"]."' ";
    $strSQL .= "WHERE percode ='".$_POST["percode"]."' ";

    
	$query = mysqli_query($conn,$strSQL);
    
    // echo $strSQL;


        if($query) {
            echo json_encode(array('status' => '1','message'=> 'แก้ไขรหัสบุคคล '.$_POST["percode"].' สำเร็จ'));
        }
        else
        {
            echo json_encode(array('status' => '0','message'=> 'Error insert data!'));
        }
    
        mysqli_close($conn);
?>