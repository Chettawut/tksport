<?php
	header('Content-Type: application/json');
	include('../backend/conn.php');

	$sql = "SELECT percode,firstname,lastname,titlename,type ";
	$sql .= "FROM person  ";   
    $sql .= " where colorcode = '3'  ";   

	$query = mysqli_query($conn,$sql);

	// echo $sql;

	$json_result=array(
        "percode" => array(),
		"firstname" => array(),
		"lastname" => array(),
		"titlename" => array(),
		"type" => array()
		
		);
		
        while($row = $query->fetch_assoc()) {
            array_push($json_result['percode'],$row["percode"]);
			array_push($json_result['firstname'],$row["firstname"]);
			array_push($json_result['lastname'],$row["lastname"]);
			array_push($json_result['titlename'],$row["titlename"]);
			array_push($json_result['type'],$row["type"]);
			
        }
        echo json_encode($json_result);



?>