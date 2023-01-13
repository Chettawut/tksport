<?php
	header('Content-Type: application/json');
	include('../backend/conn.php');

	$sql = "SELECT colorcode,sptcode,spname,level,gender,rank,CASE  WHEN count_result=0 THEN 0 WHEN rank = '1' THEN ";
	$sql .= "score1 WHEN rank = '2' THEN score2 WHEN rank = '3' THEN   score3 WHEN rank = '4' THEN score4 END score ";   
	$sql .= "FROM (select colorcode,sptcode,spname,level,gender,sum(score)   score,dense_rank() over(PARTITION BY ";   
	$sql .= "sptcode order by score desc) as   'Rank',score1,score2,score3,score4,sum(count_result) as count_result ";   
	$sql .= "from  (SELECT b.sptcode,a.timecode,c.spname,b.level,b.gender,b.score1,b.score2,b.score3,b.score4, ";   
	$sql .= "a.round,x.colorcode, x.order_no,  CASE WHEN x.order_no = '1' THEN '3' WHEN x.order_no = '2' THEN '2' ";   
	$sql .= "WHEN x.order_no = '3' THEN '1' WHEN x.order_no = '4' THEN '0' end as score ,CASE WHEN round=2 ";   
	$sql .= "THEN 1 WHEN round=3 THEN 1 ELSE 0 END as count_result  FROM result as z inner join result_detail as x on ";   
	$sql .= "(z.resultcode=x.resultcode) inner join sport_time as a on (z.timecode=a.timecode) inner join ";   
	$sql .= "sport_type as b on(a.sptcode=b.sptcode) inner join sport as c on(b.spcode=c.spcode) where b.gender = 'ชาย') as ab  GROUP by ";   
	$sql .= "colorcode,sptcode ,spname ) as abc ";   
	$sql .= "WHERE colorcode = '".$_POST['idcode']."' and count_result = '1' ";   
	

	$query = mysqli_query($conn,$sql);

	// echo $sql;

	$json_result=array(				
		"spname" => array(),
        "level" => array(),
		"gender" => array(),
		"rank" => array(),
		"score" => array()
		
		);
		
        while($row = $query->fetch_assoc()) {
			array_push($json_result['spname'],$row["spname"]);
			array_push($json_result['level'],$row["level"]);
            array_push($json_result['gender'],$row["gender"]);
			array_push($json_result['rank'],$row["rank"]);
			array_push($json_result['score'],$row["score"]);
        }
        echo json_encode($json_result);



?>