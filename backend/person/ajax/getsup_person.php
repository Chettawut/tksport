<?php
	header('Content-Type: application/json');
	include('../../../conn.php');
	
	$strSQL = "SELECT * FROM color  where colorcode = '".$_POST['idcode']."'";
	$query = mysqli_query($conn,$strSQL);
	
	$json_result=array(
        "colorcode" => array(),
		"colorname" => array()
		
        );
        while($row = $query->fetch_assoc()) {
            array_push($json_result['colorcode'],$row["colorcode"]);
			array_push($json_result['colorname'],$row["colorname"]);
        }
        echo json_encode($json_result);



?>