<?php
	header('Content-Type: application/json');
	include('../../../conn.php');
	
	$strSQL = "SELECT * FROM sport_type  where spcode = '".$_POST['idcode']."'";
	$query = mysqli_query($conn,$strSQL);
	
	$json_result=array(
		"sptcode" => array(),
        "level" => array(),
		"gender" => array()
		
        );
        while($row = $query->fetch_assoc()) {
			array_push($json_result['sptcode'],$row["sptcode"]);
            array_push($json_result['level'],$row["level"]);
			array_push($json_result['gender'],$row["gender"]);
        }
        echo json_encode($json_result);



?>