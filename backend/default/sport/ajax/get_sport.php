<?php
	header('Content-Type: application/json');
	include('../../../conn.php');

	$sql = "SELECT spcode,spname,status ";
	$sql .= "FROM sport  ";   

	$query = mysqli_query($conn,$sql);

	// echo $sql;

	$json_result=array(
        "spcode" => array(),
		"spname" => array(),
		"status" => array()
		
		);
		
        while($row = $query->fetch_assoc()) {
            array_push($json_result['spcode'],$row["spcode"]);
			array_push($json_result['spname'],$row["spname"]);
			array_push($json_result['status'],$row["status"]);
        }
        echo json_encode($json_result);



?>