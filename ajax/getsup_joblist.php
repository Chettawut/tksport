<?php
	header('Content-Type: application/json');
	include('../backend/conn.php');
	
	$strSQL = "SELECT a.actcode,b.firstname,b.lastname,b.titlename,c.jobname,e.spname ";
	$strSQL .= " FROM activity as a inner join person as b on(a.percode=b.percode) inner join job as c on(a.jobcode=c.jobcode)  ";
	$strSQL .= " left outer join sport_type as d on(a.sptcode=d.sptcode) left outer join sport as e on(d.spcode=e.spcode) ";
	$strSQL .= " where a.percode = '".$_POST['idcode']."' and a.status = 'Y' ";
	$query = mysqli_query($conn,$strSQL);
	
	$json_result=array(
        "actcode" => array(),
		"firstname" => array(),
		"lastname" => array(),
		"titlename" => array(),
		"spname" => array(),
		"jobname" => array()
		
		);
		
        while($row = $query->fetch_assoc()) {
            array_push($json_result['actcode'],$row["actcode"]);
			array_push($json_result['firstname'],$row["firstname"]);
			array_push($json_result['lastname'],$row["lastname"]);
			array_push($json_result['titlename'],$row["titlename"]);
			array_push($json_result['spname'],$row["spname"]);
			array_push($json_result['jobname'],$row["jobname"]);
			
			
        }
        echo json_encode($json_result);



?>