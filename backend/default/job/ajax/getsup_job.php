<?php
	header('Content-Type: application/json');
	include('../../../conn.php');
	
	$strSQL = "SELECT * FROM job  where jobcode = '".$_POST['idcode']."'";
	$query = mysqli_query($conn,$strSQL);
	
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