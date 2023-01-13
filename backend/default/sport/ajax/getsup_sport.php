<?php
	header('Content-Type: application/json');
	include('../../../conn.php');
	
	$strSQL = "SELECT * FROM sport  where spcode = '".$_POST['idcode']."'";
	$query = mysqli_query($conn,$strSQL);
	
	$json_result=array(
        "spcode" => array(),
		"category" => array(),
		"spname" => array()
		
        );
        while($row = $query->fetch_assoc()) {
            array_push($json_result['spcode'],$row["spcode"]);
			array_push($json_result['category'],$row["category"]);
			array_push($json_result['spname'],$row["spname"]);
        }
        echo json_encode($json_result);



?>