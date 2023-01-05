<?php
	header('Content-Type: application/json');
	include('../backend/conn.php');

	$sql = "SELECT percode,firstname,lastname,titlename,count(actcode) as count from ( ";
	$sql .= "SELECT a.percode,a.firstname,a.lastname,a.titlename,b.actcode FROM person as a left outer join activity as b on(a.percode=b.percode) ";   
    $sql .= "where colorcode = '4' and type = 'นักเรียน') as c ";   
	$sql .= "GROUP by percode ORDER by count desc ";   

	$query = mysqli_query($conn,$sql);

	// echo $sql;

	$json_result=array(
        "percode" => array(),
		"firstname" => array(),
		"lastname" => array(),
		"titlename" => array(),
		"count" => array()
		
		);
		
        while($row = $query->fetch_assoc()) {
            array_push($json_result['percode'],$row["percode"]);
			array_push($json_result['firstname'],$row["firstname"]);
			array_push($json_result['lastname'],$row["lastname"]);
			array_push($json_result['titlename'],$row["titlename"]);
			array_push($json_result['count'],$row["count"]);
			
        }
        echo json_encode($json_result);



?>