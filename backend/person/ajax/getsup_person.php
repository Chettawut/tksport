<?php
	header('Content-Type: application/json');
	include('../../conn.php');
	
	$strSQL = "SELECT * FROM person  where percode = '".$_POST['idcode']."' ";
	$query = mysqli_query($conn,$strSQL);
	
	$json_result=array(
        "percode" => array(),
		"firstname" => array(),
		"lastname" => array(),
		"type" => array(),
		"level" => array(),
		"room" => array(),
		"colorcode" => array(),
		"pergroup" => array(),
		"telephone" => array()
		
		);
		
        while($row = $query->fetch_assoc()) {
            array_push($json_result['percode'],$row["percode"]);
			array_push($json_result['firstname'],$row["firstname"]);
			array_push($json_result['lastname'],$row["lastname"]);
			array_push($json_result['type'],$row["type"]);
			array_push($json_result['level'],$row["level"]);
			array_push($json_result['room'],$row["room"]);
			array_push($json_result['colorcode'],$row["colorcode"]);
			array_push($json_result['pergroup'],$row["pergroup"]);
			array_push($json_result['telephone'],$row["telephone"]);
			
        }
        echo json_encode($json_result);



?>