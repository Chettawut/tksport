<?php
	header('Content-Type: application/json');
	include('../backend/conn.php');
    date_default_timezone_set('Asia/Bangkok');

	$sql = "SELECT b.spcode,b.spname,a.level,a.gender ";
	$sql .= "FROM sport_type as a inner join sport as b on(a.spcode=b.spcode) ";   
	$sql .= " order by b.spcode,a.level,a.gender ";

	$query = mysqli_query($conn,$sql);

	// echo $sql;

	$json_result=array(
        "spcode" => array(),
		"spname" => array(),
		"level" => array(),
		"gender" => array()
		
		);
		
        while($row = $query->fetch_assoc()) {
            array_push($json_result['spcode'],$row["spcode"]);
			array_push($json_result['spname'],$row["spname"]);
			array_push($json_result['level'],$row["level"]);
			array_push($json_result['gender'],$row["gender"]);
        }
        echo json_encode($json_result);



?>