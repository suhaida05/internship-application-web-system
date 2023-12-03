<?php
  include ('config.php');
  //$applier_id = $_GET["applier_id"];
  //$sql = "SELECT a.* , s.*, i.*, c.* FROM applier a,student_details s, intern_details i, coordinator_details c WHERE a.applier_id='$applier_id' and a.applier_id=s.applier_id and s.applier_id=i.applier_id and s.applier_id=c.applier_id";
  $applier_id = $_GET['applier_id'];
  $s_id = $_GET['s_id'];
  $i_id = $_GET['i_id'];
  $c_id = $_GET['c_id'];
 /* $sql = "DELETE FROM student_details WHERE s_id='$s_id';
          DELETE FROM intern_details WHERE i_id='$i_id';
          DELETE FROM coordinator_details WHERE c_id='$c_id';";*/
      $delete = "DELETE FROM coordinator_details WHERE c_id='$c_id'";

      
      if (mysqli_query($con, $delete)){
        echo '<script language="javascript">';
        echo 'alert("Data Berjaya Dipadamkan");';
        echo 'window.location.href="intern.php";';
        echo'</script>';
      } else {
        echo '<script language="javascript">';
        echo 'alert("Data Gagal Dipadamkan");';
        echo 'window.location.href="intern.php";';
        echo'</script>';
      }    
      
      $query = "DELETE FROM intern_details WHERE i_id='$i_id'";

      if (mysqli_query($con, $query)){
        //echo '<script language="javascript">';
        //echo 'alert("Delete Data Success");';
        /*echo 'window.location.href="intern.php";';
        echo'</script>';*/
     } else {
        echo '<script language="javascript">';
        echo 'alert("Delete Data Fail");';
        echo 'window.location.href="intern.php";';
        echo'</script>';
      }
  $sql = "DELETE FROM student_details WHERE s_id='$s_id'";

  //$sql = "UPDATE applier SET status='Approve' WHERE applier_id = '".$applier_id."'";
  //$result = mysqli_query($con, $sql);
      if (mysqli_query($con, $sql)){
        /*echo '<script language="javascript">';
        echo 'alert("Delete Data Success");';
        //echo 'window.location.href="intern.php";';
        echo'</script>';*/
      } else {
        echo '<script language="javascript">';
        echo 'alert("Delete Data Fail");';
        echo 'window.location.href="intern.php";';
        echo'</script>';
      }

  


      mysqli_close($con);
  ?>