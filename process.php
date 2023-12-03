<?php
include "config.php";
$message = '';

//$_SESSION['email'] = (!$_SESSION['email']) ? 1 : $_SESSION['email'];

//$_SESSION['num'] = (!$_SESSION['num']) ? 1 : $_SESSION['num'];

if(isset($_POST['submit']))
{
 //sleep(5);
  $matric_no = $_POST['id'];
  $programme = $_POST['programme'];
  $marital = $_POST['status'];
  $address = $_POST['address'];
  $address2 = $_POST['address2'];
  $address3 = $_POST['address3'];
  $postcode = $_POST['postcode'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $beneficiary = $_POST['beneficiary'];
  $b_phone = $_POST['b_phone'];
  $s_id   = ($_POST['s_id']);


  $image_name = $_FILES['file']['name'];
      $target_dir = "profile_pic/";
      $target_file = $target_dir . basename($_FILES["file"]["name"]);

      // Select file type
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      // Valid file extensions
      $extensions_arr = array("jpg","jpeg","png","gif");

      // Check extension
      if( in_array($imageFileType,$extensions_arr) ){
         // Upload file
         if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$image_name)){
            // Insert record
            
        

  $registration="INSERT INTO student_details (s_id, applier_id, matric_no, programme, marital, address, address2, address3, postcode, city, state, beneficiary, b_phone, pic) 
             VALUES('$s_id', (SELECT applier_id FROM applier WHERE email='$_SESSION[email]'),  '$matric_no', '$programme', '$marital', '$address', '$address2', '$address3', '$postcode', '$city', '$state', '$beneficiary', '$b_phone', '$image_name')";
//$ID = mysql_insert_id();
 if(mysqli_query($con, $registration)){
         $message = '
         <div class="alert alert-success">
         Student details Completed Successfully
         </div>
         ';
        }
        else
        {
         $message = '
         <div class="alert alert-success">
         There is an error in Student details
         </div>
         ';
        }
    }


    

  $start = $_POST['sdate'];
  $end = $_POST['edate'];
  //$i_id = $_SESSION['email']++;

  $files = array_filter($_FILES['letter']['name']); //Use something similar before processing files.
  // Count the number of uploaded files in array
  $total_count = count($_FILES['letter']['name']);
  // Loop through every file
  for( $i=0 ; $i < $total_count ; $i++ ) {
      //The temp file path is obtained
      $tmpFilePath = $_FILES['letter']['tmp_name'][$i];
      //A file path needs to be present
      if ($tmpFilePath != ""){
        //Setup our new file path
        $newFilePath = "file/" . $_FILES['letter']['name'][$i];
        //File is uploaded to temp dir
      }     
      
      if(move_uploaded_file($tmpFilePath, $newFilePath)) {
        $letter_name = $_FILES['letter']['name'][0];
        $resume_name = $_FILES['letter']['name'][1];
        $transcript_name = $_FILES['letter']['name'][2];
                  
      }
  
}

 /* $i_id =  $_SESSION['num']+1;
  $_SESSION['num'] =  $i_id; */

  $query1 = "INSERT INTO intern_details (s_id, applier_id, start_date, end_date, confirm_letter, resume, transcript) 
                     VALUES('$s_id', (SELECT applier_id FROM applier WHERE email='$_SESSION[email]'), '$start', '$end', '$letter_name', '$resume_name', '$transcript_name')" ;
  
 if(mysqli_query($con, $query1)){
     $message = '
     <div class="alert alert-success">
     Intern details Completed Successfully
     </div>
     ';
 }
 else
 {
     $message = '
     <div class="alert alert-success">
     There is an error in Intern details
     </div>
     ';
 }




    $nameC = $_POST['nameC'];
    $addressC = $_POST['addressC'];
    $address2C = $_POST['address2C'];
    $address3C = $_POST['address3C'];
    $emailC = $_POST['emailC'];
    $phoneC = $_POST['phoneC'];
    $ophone = $_POST['ophone'];
    $cityC = $_POST['cityC'];
    $stateC = $_POST['stateC'];
    $postcodeC = $_POST['postcodeC'];

    $query= "INSERT INTO coordinator_details (i_id, applier_id, c_name, c_email, c_phone, office_phone, c_address, c_address2, c_address3, c_postcode, c_city, c_state, status) 
               VALUES((SELECT i_id FROM intern_details WHERE s_id='$s_id'), (SELECT applier_id FROM applier WHERE email='$_SESSION[email]'), '$nameC', '$emailC', '$phoneC', '$ophone', '$addressC', '$address2C', '$address3C', '$postcodeC', '$cityC', '$stateC', 'Dalam Proses...') LIMIT 1";

     if(mysqli_query($con, $query)){
         $message = '
         <div class="alert alert-success">
         Coordinator details Completed Successfully
         </div>
         ';
     }
     else
     {
         $message = '
         <div class="alert alert-success">
         There is an error in Coordinator details
         </div>
         ';
     }
$applier_id= "SELECT applier_id FROM applier WHERE email='$_SESSION[email]'";
echo '<div class="jumbotron text-center">
<h1 class="display-3" style="font-family: Brush Script MT, cursive; text-align: center; font-size: 80px; margin-top: 200px;" >Sila tunggu sebentar.</h1>
<p class="lead" style="text-align:center; font-size: 25px;">Permohonan anda sedang diproses.</p>
</div>' ; 
echo '<script language="javascript">';
echo 'window.location.href="noti.php";';
echo'</script>';
}
else{
    echo '<script>alert("Permohonan Gagal! Sila cuba sekali lagi.")</script>';
            
echo '<script language="javascript">';
echo 'window.location.href="apply.php";';
echo'</script>';
}
}

?>

