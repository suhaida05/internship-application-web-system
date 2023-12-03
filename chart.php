<?php
include "config.php";

$sql= "SELECT s.department, COUNT(*) as total FROM student_details s CROSS JOIN intern_details i, coordinator_details c WHERE s.s_id=i.s_id and i.i_id=c.i_id and c.status='Diluluskan' GROUP BY department;";
$result = mysqli_query($con, $sql) or die("Error in Selecting " . mysqli_error($con));

$data = array();
foreach ($result as $row) {
    $name[] = $row['department'];
	$data[] = $row['total'];
}?>
<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>

<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>
/*var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
var yValues = [55, 49, 44, 24, 15];*/
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: <?php echo json_encode($name); ?>,
    datasets: [{
      backgroundColor: barColors,
      data: <?php echo json_encode($data); ?>
    }]
  },
  options: {
    title: {
      display: true,
      text: "World Wide Wine Production 2018"
    }
  }
});
</script>

</body>
</html>
