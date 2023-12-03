<?php
    include "config.php";

    $sql1= "SELECT c.status, COUNT(s.department) as cntApplier FROM coordinator_details c, student_details s WHERE status = 'Approved'";
    $result1= mysqli_query($con, $sql1);
    $row1= mysqli_fetch_array ($result1);
    //$sqlQuery= "SELECT s.department, COUNT(c.c_id) as countApp FROM student_details s, coordinator_details c WHERE t.subject_id=s.subject_id AND c.course_id=s.course_id GROUP BY c.course_name";

    //$result = mysqli_query($conn,$sqlQuery);

    $data = array();
    foreach ($result1 as $row) {
        $data[] = $row;
    }

    mysqli_close($con);

    echo json_encode($data);
?>