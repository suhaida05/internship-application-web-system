<?php
  include ('config.php');
?>
<html>  
<head>
    <style>
        img{
            margin-left:38%;
            margin-top: 7.5%;
            cursor: pointer;
        }

        img.icon{
          margin-left:97%;
          margin-top: 1%
        }
    </style>
  <title>Internship Website</title>
</head>

<?php
$applier_id = $_GET['applier_id'];
$s_id = $_GET['s_id'];

$sql= "SELECT pic FROM student_details WHERE applier_id = '$applier_id' and s_id = '$s_id'";
$result= mysqli_query($con, $sql);
while ($row= mysqli_fetch_array ($result))
{
  $image=$row['pic'];
  $img_src="profile_pic/".$image;
?>
  <div onclick="history.back()">
    <img class="icon" src="icon/letter-x.png" width='2%' height='4%'>
    <img src="<?php echo $img_src; ?>" width='25%' height='60%'>
    
  </div>
<?php
}
?>


<?php
mysqli_close($con);
?>
</body>
</html>