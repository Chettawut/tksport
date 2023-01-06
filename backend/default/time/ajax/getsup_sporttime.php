<?php
	header('Content-Type: application/json');
	include('../../../conn.php');

	   
	$sql = "SELECT a.timecode,b.sptcode,c.spname,b.level,b.gender,a.timedate,a.timetime, ";
	$sql .= "a.colorcode1,a.colorcode2,a.colorcode3,a.colorcode4,a.round,a.area  ";   
	$sql .= "FROM sport_time as a inner join sport_type as b on(a.sptcode=b.sptcode) inner join sport as c on(b.spcode=c.spcode) ";	
	$sql .= " where timecode = '".$_POST['idcode']."' ";
	

	$query = mysqli_query($conn,$sql);

	// echo $sql;

	$json_result=array(
        "timecode" => array(),
		"sptcode" => array(),
		"spname" => array(),
		"level" => array(),
		"gender" => array(),
		"timedate" => array(),
		"timetime" => array(),
		"colorcode1" => array(),
		"colorcode2" => array(),
		"colorcode3" => array(),
		"colorcode4" => array(),
		"round" => array(),
		"area" => array()
		);
		
        while($row = $query->fetch_assoc()) {
            array_push($json_result['timecode'],$row["timecode"]);
			array_push($json_result['sptcode'],$row["sptcode"]);
			array_push($json_result['spname'],$row["spname"]);
			array_push($json_result['level'],$row["level"]);
			array_push($json_result['gender'],$row["gender"]);
			array_push($json_result['timedate'],$row["timedate"]);
			array_push($json_result['timetime'],$row["timetime"]);
			array_push($json_result['colorcode1'],$row["colorcode1"]);
			array_push($json_result['colorcode2'],$row["colorcode2"]);
			array_push($json_result['colorcode3'],$row["colorcode3"]);
			array_push($json_result['colorcode4'],$row["colorcode4"]);
			array_push($json_result['round'],$row["round"]);
			array_push($json_result['area'],$row["area"]);
        }
        echo json_encode($json_result);



?>