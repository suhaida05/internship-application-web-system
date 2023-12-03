<?php
header('Content-Type: application/json');

include "config.php";

$sql1= "SELECT COUNT(s_id) as total FROM student_details";
$result1= mysqli_query($con, $sql1);
$row1= mysqli_fetch_array ($result1);
$sqlQuery= "SELECT s.department, COUNT(s.s_id) as total FROM student_details s, coordinator_details c WHERE c.status='Approved' and s.applier_id=c.applier_id GROUP BY s.department";

$result = mysqli_query($con,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($con);

echo json_encode($data);
?>