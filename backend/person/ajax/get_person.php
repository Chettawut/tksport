<?php
	header('Content-Type: application/json');
	include('../../conn.php');

	$sql = "SELECT percode,firstname,lastname,type ";
	$sql .= "FROM person  ";   

	$query = mysqli_query($conn,$sql);

	// echo $sql;

	$json_result=array(
        "percode" => array(),
		"firstname" => array(),
		"lastname" => array(),
		"type" => array()
		
		);
		
        while($row = $query->fetch_assoc()) {
            array_push($json_result['percode'],$row["percode"]);
			array_push($json_result['firstname'],$row["firstname"]);
			array_push($json_result['lastname'],$row["lastname"]);
			array_push($json_result['type'],$row["type"]);
			
        }
        echo json_encode($json_result);



?>