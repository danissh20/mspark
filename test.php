<?php
$sql_plans = "SELECT plan_name FROM mspark_plans LIMIT 1";
//$result_plans = $db->query($sql_plans) ;
if ($result_plans->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo $row[plan_name] ;
	}
}
?>