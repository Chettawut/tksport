<?php
	header('Content-Type: application/json');
	include('../../../conn.php');

	   
	$sql = "SELECT z.resultcode,x.detailcode,a.timecode,x.colorcode,a.round  ";	
	$sql .= "FROM result as z inner join result_detail as x on (z.resultcode=x.resultcode) inner join sport_time as a on (z.timecode=a.timecode) inner join sport_type as b on(a.sptcode=b.sptcode) inner join sport as c on(b.spcode=c.spcode) ";	
	$sql .= " where z.resultcode = '".$_POST['idcode']."' ";
	

	$query = mysqli_query($conn,$sql);

	// echo $sql;

	$json_result=array(
		"detailcode" => array(),
		"resultcode" => array(),
        "timecode" => array(),
		"colorcode" => array(),
		"round" => array()
		);
		
        while($row = $query->fetch_assoc()) {
			array_push($json_result['detailcode'],$row["detailcode"]);			
			array_push($json_result['resultcode'],$row["resultcode"]);			
            array_push($json_result['timecode'],$row["timecode"]);			
			array_push($json_result['colorcode'],$row["colorcode"]);
			array_push($json_result['round'],$row["round"]);
        }
        echo json_encode($json_result);



?>