<?php
    include "config.php";

    //$status = "";
       if(isset($_POST['pro_user']))
        {
        //$id=$SESSION['id'];
        //$trn_date = date("Y-m-d H:i:s");
        $name =$_POST['status'];

         $applier_id = $_GET['applier_id'];
         $s_id = $_GET['s_id'];
        $c_id = $_GET['c_id'];
        /*$update="UPDATE student_details INNER JOIN  
        coordinator_details  
        ON student_details.applier_id = coordinator_details.applier_id 
        SET status='Approved', department='$name'
         ";*/
         $file = $_FILES['o_letter']['name'];
      $target_dir = "offer/";
      $target_file = $target_dir . basename($_FILES["o_letter"]["name"]);

      // Select file type
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      // Valid file extensions
      $extensions_arr = array("pdf","jpg","jpeg","png");

      // Check extension
      if( in_array($imageFileType,$extensions_arr) ){
         // Upload file
         if(move_uploaded_file($_FILES['o_letter']['tmp_name'],$target_dir.$file)){
        $update = "UPDATE student_details  
        INNER JOIN  
        coordinator_details  
        ON student_details.applier_id = coordinator_details.applier_id  
        SET status = 'Diluluskan', department='$name', offer='$file' WHERE student_details.applier_id='$applier_id' and student_details.s_id='$s_id' and coordinator_details.c_id='$c_id'";
       


        if(mysqli_query($con, $update)){
            echo '<div class="jumbotron text-center">
<h1 class="display-3" style="font-family: Brush Script MT, cursive; text-align: center; font-size: 80px; margin-top: 200px;" >Sila tunggu sebentar.</h1>
</div>' ; 
          echo '<script language="javascript">';
          echo 'window.location.href="offer.php?applier_id='. $_GET['applier_id'].'&s_id=' .$_GET['s_id'].'&c_id='.$_GET['c_id'].'";';
          echo'</script>';
        }
        else  {
        echo '<script language="javascript">';
        echo 'alert("Gagal Diluluskan");';
        //echo 'window.location.href="manage_intern.php";';
        echo'</script>';
        }
      }
    }
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>Internship Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="approve2.css">

</head>
<body>
<div class="approve">  

<div class="logo" id="logo"></div>

<form name="department" method="POST" action="" enctype="multipart/form-data"> 
    <div class="department">
<label id="label" for="status">Sila pilih Jabatan/Bahagian <span class="mark">* </span> :</label>
                           
                                <select id="status" name="status" required>
                                    <option value="BAHAGIAN PENTADBIRAN DAN PERKHIDMATAN">BAHAGIAN PENTADBIRAN DAN PERKHIDMATAN</option>
                                    <option value="UNIT KORPORAT DAN PERHUBUNGAN AWAM">UNIT KORPORAT DAN PERHUBUNGAN AWAM</option>
                                    <option value="JABATAN TEKNOLOGI MAKLUMAT, PELANCONGAN DAN REKREASI">JABATAN TEKNOLOGI MAKLUMAT, PELANCONGAN DAN REKREASI</option>
                                    <option value="JABATAN PENILAIAN DAN PENGURUSAN HARTA">JABATAN PENILAIAN DAN PENGURUSAN HARTA</option>
                                    <option value="JABATAN KEJURUTERAAN">JABATAN KEJURUTERAAN</option>
                                    <option value="JABATAN PERKHIDMATAN PERBANDARAN DAN KESIHATAN AM">JABATAN PERKHIDMATAN PERBANDARAN DAN KESIHATAN AM</option>
                                    <option value="BAHAGIAN PELESENAN DAN KESIHATAN AM">BAHAGIAN PELESENAN DAN KESIHATAN AM</option>
                                    <option value="JABATAN PERBENDAHARAAN">JABATAN PERBENDAHARAAN</option>
                                    <option value="JABATAN PERANCANGAN PEMBANGUNAN">JABATAN PERANCANGAN PEMBANGUNAN</option>
                                    <option value="BAHAGIAN LANDSKAP">BAHAGIAN LANDSKAP</option>
                                    <option value="UNIT UNDANG-UNDANG">UNIT UNDANG-UNDANG</option>
                                    <option value="UNIT AUDIT DALAM">UNIT AUDIT DALAM</option>
                                    <option value="UNIT OSC">UNIT OSC</option>
                                </select> 

<div id="offer" name="offer">
                                <label id="label" for="file">Surat Tawaran <span class="mark">* </span> :</label> <br>

                                <input type="file" id="o_letter" name="o_letter" required/> <br>

                                <p>* Sila masukkan fail dalam bentuk PDF, jpg, jpeg, png.</p>

</div>
                            </div>   

<div class="button-approve">
                    <button type="submit" id="b_Approve" name="pro_user"  value="Save">Simpan</button>
                </div>
</form>
    </div>


</body>
</html>