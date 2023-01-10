<?php
	header('Content-Type: application/json');
	include('../backend/conn.php');
    date_default_timezone_set('Asia/Bangkok');

	$sql = "SELECT a.timedate,a.timetime,b.spcode,c.spname,b.level,b.gender,x.colorname as resultcolor,z.order_no,e.colorname as colorcode1,f.colorname as colorcode2,g.colorname as colorcode3,h.colorname as colorcode4 ";
	$sql .= "FROM `sport_time` as a INNER JOIN sport_type as b on(a.sptcode=b.sptcode) inner join sport as c on(b.spcode=c.spcode) LEFT OUTER JOIN result as d on (a.timecode=d.timecode) LEFT OUTER join result_detail as z on (d.resultcode = z.resultcode) ";   	
	$sql .= "left OUTER join color as e on (a.colorcode1=e.colorcode) ";
	$sql .= "left OUTER join color as f on (a.colorcode2=f.colorcode) ";
	$sql .= "left OUTER join color as g on (a.colorcode3=g.colorcode) ";
	$sql .= "left OUTER join color as h on (a.colorcode4=h.colorcode) ";	
	$sql .= "left OUTER join color as x on (x.colorcode=z.colorcode) ";	
	$sql .= "  WHERE order_no = '1' || order_no is null ";
	$sql .= " order by a.timedate,a.timetime ";

	$query = mysqli_query($conn,$sql);

	// echo $sql;

	$json_result=array(
        "timedate" => array(),
		"timetime" => array(),
		"spcode" => array(),
		"spname" => array(),
		"level" => array(),
		"gender" => array(),
		"resultcolor" => array(),
		"colorcode1" => array(),
		"colorcode2" => array(),
		"colorcode3" => array(),
		"colorcode4" => array()
		
		);
		
        while($row = $query->fetch_assoc()) {
            array_push($json_result['timedate'],$row["timedate"]);
			array_push($json_result['timetime'],$row["timetime"]);
			array_push($json_result['spcode'],$row["spcode"]);
			array_push($json_result['spname'],$row["spname"]);
			array_push($json_result['level'],$row["level"]);
			array_push($json_result['gender'],$row["gender"]);
			array_push($json_result['resultcolor'],$row["resultcolor"]);
			array_push($json_result['colorcode1'],$row["colorcode1"]);
			array_push($json_result['colorcode2'],$row["colorcode2"]);
			array_push($json_result['colorcode3'],$row["colorcode3"]);
			array_push($json_result['colorcode4'],$row["colorcode4"]);
        }
        echo json_encode($json_result);



?>