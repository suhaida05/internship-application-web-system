<?php
  include ('config.php');
  $applier_id = $_GET["applier_id"];

  $s_id = $_GET['s_id'];
  $c_id = $_GET['c_id'];

 $sql = "UPDATE student_details  
 INNER JOIN  
 coordinator_details  
 ON student_details.applier_id = coordinator_details.applier_id  
 SET status = 'Ditolak', department='-' WHERE student_details.applier_id='$applier_id' and student_details.s_id='$s_id' and coordinator_details.c_id='$c_id'";
  
  $result = mysqli_query($con, $sql);
      if ($result == TRUE){
        echo '<script language="javascript">';
        echo 'alert("Berjaya Ditolak");';
        echo 'window.location.href="manage_intern.php";';
        echo'</script>';
      } else {
        echo '<script language="javascript">';
        echo 'alert("Gagal Ditolak");';
        echo 'window.location.href="manage_intern.php";';
        echo'</script>';
      }
      mysqli_close($con);
  ?>