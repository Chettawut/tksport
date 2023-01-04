<?php
	header('Content-Type: application/json');
	include('../../../conn.php');
	
	$strSQL = "SELECT * FROM sport_type  where spcode = '".$_POST['idcode']."'";
	$query = mysqli_query($conn,$strSQL);
	
	$json_result=array(
		"sptcode" => array(),
        "level" => array(),
		"gender" => array(),
        "score1" => array(),
		"score2" => array(),
        "score3" => array(),
		"score4" => array()
		
        );
        while($row = $query->fetch_assoc()) {
			array_push($json_result['sptcode'],$row["sptcode"]);
            array_push($json_result['level'],$row["level"]);
			array_push($json_result['gender'],$row["gender"]);
			array_push($json_result['score1'],$row["score1"]);
			array_push($json_result['score2'],$row["score2"]);
			array_push($json_result['score3'],$row["score3"]);
			array_push($json_result['score4'],$row["score4"]);
        }
        echo json_encode($json_result);



?>