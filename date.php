<?php
 include ('config.php');
 $sql = "SELECT a.* , s.*, i.* FROM applier a,student_details s, intern_details i WHERE  i.end_date < CURDATE() and s.status = 'Approved' and a.applier_id=s.applier_id and s.applier_id=i.applier_id";
 $x = 1;  

if($result = mysqli_query($con, $sql)){
     if(mysqli_num_rows($result) > 0){
         echo "<table>";
             echo "<tr>";
                 echo "<th>No.</th>";
                 echo "<th>Name</th>";
                 echo "<th>Image</th>";
                 echo "<th>Programme</th>";
                 echo "<th>Full Info</th>";
                 echo "<th>Confirmation Letter</th>";
                 echo "<th>Resume</th>";
                 echo "<th>Transcript</th>";
                 echo "<th>Status</th>";
             echo "</tr>";
         while($row = mysqli_fetch_array($result)){
             echo "<tr id='search'>";
                 echo"<td>" . $x++ ."</td>";
                 echo "<td class='info'>" . $row['name'] . "</td>";
                 echo "<td><a href='adminPic.php?applier_id=". $row['applier_id'] ."'>" . $row['pic'] . "</a></td>";
                 echo "<td><a href='adminPic.php?applier_id=". $row['applier_id'] ."'><img src='profile_pic/".$row['pic']."'></a></td>";  
                 echo "<td class='info'>" . $row['programme'] . "</td>";
                 echo "<td> <button type='button' id='view'><a href='view.php?applier_id=". $row['applier_id'] ."'>View</a></button> </td>";
                 echo "<td><a href='adminView.php?applier_id=". $row['applier_id'] ."'>" . $row['confirm_letter'] . "</a></td>";
                 echo "<td><a href='adminResume.php?applier_id=". $row['applier_id'] ."'>" . $row['resume'] . "</a>  </td>";
                 echo "<td><a href='adminTranscript.php?applier_id=". $row['applier_id'] ."'>" . $row['transcript'] . "</a>  </td>";
                 echo "<td> <button type='button' id='approve'><a href='approve.php?applier_id=". $row['applier_id'] ."'>Approve</a></button> 
                            <button class='reject' id='reject'><a href='reject.php?applier_id=". $row['applier_id'] ."'>Reject</a></button></td>";
             echo "</tr>";
         }
         echo "</table>";
         // Free result set
         mysqli_free_result($result);
     } else{
         echo "No records matching your query were found.";
     }
 } else{
     echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
 }
  

?>