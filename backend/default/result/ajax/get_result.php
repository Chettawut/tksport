<?php
	header('Content-Type: application/json');
	include('../../../conn.php');

	   
	$sql = "SELECT z.resultcode,a.timecode,b.sptcode,c.spname,b.level,b.gender,a.timedate,a.timetime, ";
	$sql .= "d.colorname as colorcode1,e.colorname as colorcode2,f.colorname as colorcode3,g.colorname as colorcode4,a.round,a.area,h.colorname as resultcolor1  ";   
	$sql .= "FROM result as z inner join sport_time as a on (z.timecode=a.timecode) inner join sport_type as b on(a.sptcode=b.sptcode) inner join sport as c on(b.spcode=c.spcode) ";
	$sql .= "left OUTER join color as d on (a.colorcode1=d.colorcode) ";
	$sql .= "left OUTER join color as e on (a.colorcode2=e.colorcode) ";
	$sql .= "left OUTER join color as f on (a.colorcode3=f.colorcode) ";
	$sql .= "left OUTER join color as g on (a.colorcode4=g.colorcode) ";
	$sql .= "left OUTER join color as h on (z.resultcolor1=h.colorcode) ";

	$query = mysqli_query($conn,$sql);

	// echo $sql;

	$json_result=array(
		"resultcode" => array(),
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
		"resultcolor1" => array(),
		"round" => array(),
		"area" => array()
		);
		
        while($row = $query->fetch_assoc()) {
			array_push($json_result['resultcode'],$row["resultcode"]);
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
			array_push($json_result['resultcolor1'],$row["resultcolor1"]);
			array_push($json_result['round'],$row["round"]);
			array_push($json_result['area'],$row["area"]);
        }
        echo json_encode($json_result);



?>