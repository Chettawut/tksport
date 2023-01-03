<?php
	header('Content-Type: application/json');
	include('../conn.php');

	$sql = "SELECT colorcode,colorname ";
	$sql .= "FROM color  ";   

	$query = mysqli_query($conn,$sql);

	// echo $sql;

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