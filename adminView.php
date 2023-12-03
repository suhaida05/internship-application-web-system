<?php
  include ('config.php');
?>
<html>
<head>
  <title>Internship Website</title>
</head>
<?php
$applier_id = $_GET['applier_id'];
$i_id = $_GET['i_id'];

$sql= "SELECT confirm_letter FROM intern_details WHERE applier_id = '$applier_id' and i_id = '$i_id'";
$result= mysqli_query($con, $sql);
while ($row= mysqli_fetch_array ($result))
{
  $pdf=$row['confirm_letter'];
  $pdf_src="file/".$pdf;
?>
  <iframe src="<?php echo $pdf_src; ?>" width="100%" height="629px">
</iframe>
<?php
}
?>


<?php
mysqli_close($con);
?>
</body>
</html>