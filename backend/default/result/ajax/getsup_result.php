<?php
	header('Content-Type: application/json');
	include('../../../conn.php');

	   
	$sql = "SELECT z.resultcode,a.timecode ";
	$sql .= ",z.resultcolor1,z.resultcolor2,z.resultcolor3,z.resultcolor4,a.round  ";   
	$sql .= "FROM result as z inner join sport_time as a on (z.timecode=a.timecode) inner join sport_type as b on(a.sptcode=b.sptcode) inner join sport as c on(b.spcode=c.spcode) ";	
	$sql .= " where z.resultcode = '".$_POST['idcode']."' ";
	

	$query = mysqli_query($conn,$sql);

	// echo $sql;

	$json_result=array(
		"resultcode" => array(),
        "timecode" => array(),
		"resultcolor1" => array(),
		"resultcolor2" => array(),
		"resultcolor3" => array(),
		"resultcolor4" => array(),
		"round" => array()
		);
		
        while($row = $query->fetch_assoc()) {
			array_push($json_result['resultcode'],$row["resultcode"]);			
            array_push($json_result['timecode'],$row["timecode"]);			
			array_push($json_result['resultcolor1'],$row["resultcolor1"]);
			array_push($json_result['resultcolor2'],$row["resultcolor2"]);
			array_push($json_result['resultcolor3'],$row["resultcolor3"]);
			array_push($json_result['resultcolor4'],$row["resultcolor4"]);
			array_push($json_result['round'],$row["round"]);
        }
        echo json_encode($json_result);



?>