<?php
	header('Content-Type: application/json');
	include('../../../conn.php');

	$sql = "SELECT jobcode,jobname,status ";
	$sql .= "FROM job  ";   

	$query = mysqli_query($conn,$sql);

	// echo $sql;

	$json_result=array(
        "jobcode" => array(),
		"jobname" => array(),
		"status" => array()
		
		);
		
        while($row = $query->fetch_assoc()) {
            array_push($json_result['jobcode'],$row["jobcode"]);
			array_push($json_result['jobname'],$row["jobname"]);
			array_push($json_result['status'],$row["status"]);
			
        }
        echo json_encode($json_result);



?>