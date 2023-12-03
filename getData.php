<?php 
$sql= "SELECT s.department, COUNT(*) as total FROM student_details s CROSS JOIN intern_details i, coordinator_details c WHERE s.s_id=i.s_id and i.i_id=c.i_id and c.status='Diluluskan' GROUP BY department;";
$pie = mysqli_query($con, $sql) or die("Error in Selecting " . mysqli_error($con));

$data = array();
foreach ($pie as $row) {
    $department[] = $row['department'];
	$total[] = $row['total'];
}
?>