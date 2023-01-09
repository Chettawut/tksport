<?php
	header('Content-Type: application/json');
	include('../backend/conn.php');

	$sql = "SELECT ROW_NUMBER() OVER (ORDER BY score desc) as num,colorname,IFNULL(sum(b.score), 0 ) as score ";
	$sql .= "FROM `color` as y LEFT OUTER join  ";   
	$sql .= "(SELECT colorcode,sptcode,spname,rank,CASE  ";   
	$sql .= "WHEN count_result=0 THEN 0 WHEN rank = '1' THEN score1 WHEN rank = '2' THEN score2 WHEN rank = '3' THEN   ";   
	$sql .= "score3 WHEN rank = '4' THEN score4 END score from (select colorcode,sptcode,spname,sum(score)   ";   
	$sql .= "score,dense_rank() over(PARTITION BY sptcode order by score desc) as   ";   
	$sql .= "'Rank',score1,score2,score3,score4,sum(count_result) as count_result from  ";   
	$sql .= "(SELECT b.sptcode,a.timecode,c.spname,b.level,b.gender,b.score1,b.score2,b.score3,b.score4,a.round,x.colorcode, x.order_no,  ";   
	$sql .= "CASE WHEN x.order_no = '1' THEN '3' WHEN x.order_no = '2' THEN '2' WHEN x.order_no = '3' THEN '1' WHEN x.order_no = '4' THEN '0' end as score ,CASE WHEN round=2 THEN 1 WHEN round=3 THEN 1 ELSE 0 END as count_result  ";   
	$sql .= "FROM result as z inner join result_detail as x on (z.resultcode=x.resultcode) inner join sport_time as a on (z.timecode=a.timecode) inner join sport_type as b on(a.sptcode=b.sptcode) inner join sport as c on(b.spcode=c.spcode)) as ab  ";   
	$sql .= "GROUP by colorcode,sptcode ,spname ) as abc) as b on (y.colorcode=b.colorcode) GROUP by y.colorcode  ";   
	$sql .= "ORDER by score desc ";   
	

	$query = mysqli_query($conn,$sql);

	// echo $sql;

	$json_result=array(
		"num" => array(),
        "colorname" => array(),
		"score" => array()
		
		);
		
        while($row = $query->fetch_assoc()) {
			array_push($json_result['num'],$row["num"]);
            array_push($json_result['colorname'],$row["colorname"]);
			array_push($json_result['score'],$row["score"]);
			
        }
        echo json_encode($json_result);



?>