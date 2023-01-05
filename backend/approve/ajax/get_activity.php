<?php
	header('Content-Type: application/json');
	include('../../conn.php');

	$sql = "SELECT a.actcode,b.titlename,b.firstname,b.lastname,d.spname,c.level,c.gender,e.jobname,a.status,a.actdetail  ";	
	$sql .= "FROM activity as a  ";   
	$sql .= "inner join person as b on (a.percode = b.percode)  ";   
	$sql .= "LEFT OUTER JOIN sport_type as c on (a.sptcode = c.sptcode)  ";   
	$sql .= "LEFT OUTER JOIN sport as d on (c.spcode = d.spcode)  ";   
	$sql .= "inner join job as e on (a.jobcode = e.jobcode)  ";  
	$sql .= "where a.status = 'N'  ";   

	$query = mysqli_query($conn,$sql);

	// echo $sql;
	$json_result=array(
        "actcode" => array(),
		"titlename" => array(),
		"firstname" => array(),
		"lastname" => array(),
		"spname" => array(),
		"level" => array(),
		"gender" => array(),
		"jobname" => array(),
		"status" => array(),
		"actdetail" => array()
		
		);
		
        while($row = $query->fetch_assoc()) {
            array_push($json_result['actcode'],$row["actcode"]);
			array_push($json_result['titlename'],$row["titlename"]);
			array_push($json_result['firstname'],$row["firstname"]);
			array_push($json_result['lastname'],$row["lastname"]);
			array_push($json_result['spname'],$row["spname"]);
			array_push($json_result['level'],$row["level"]);
			array_push($json_result['gender'],$row["gender"]);
			array_push($json_result['jobname'],$row["jobname"]);
			array_push($json_result['status'],$row["status"]);
			array_push($json_result['actdetail'],$row["actdetail"]);
			
        }
        echo json_encode($json_result);



?>