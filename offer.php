<html>
<head>
		<script src="dist/sweetalert2.min.js"></script> 
		<link rel="stylesheet" type="text/css" href="dist/sweetalert2.css">
</head>
  <?php
date_default_timezone_set('Etc/UTC');
require './PHPMailer/PHPMailerAutoload.php';
include ("config.php");

$mail = new PHPMailer;
$mail->isSMTP();

		 $User        = mysqli_query($con, "SELECT a.*, s.* FROM applier a CROSS JOIN student_details s, coordinator_details c WHERE a.applier_id=$_GET[applier_id] and s.s_id=$_GET[s_id] and c.c_id=$_GET[c_id]" ) or die(mysqli_error());
		 $p           = mysqli_affected_rows($con);
		 
		 
/*
 * Server Configuration
 */

include ("Email.php");
			 
		
		 
		 if($p!=0) 
		 {
		  $res  = mysqli_fetch_array($User);
		  //$User_ID = $res['applier_id'];
		  //$link = 'aduan.epizy.com/Reset_Password.php?id='.$User_ID;
          $attachment=$res['offer'];
          $folder="offer/";
		  $to=$res['email'];
		  $subject='Internship Offer Letter';
		 
		$message = '------------------------------------------------------';
		$message .= '<html><body>';
	    $message .= '<TABLE border="0">';
		$message .= '<TR>';
		$message .= '<TD>Sukacita dimaklumkan pihak Majlis MENERIMA pelajar tersebut. Sila rujuk lampiran.  Walau bagaimanapun, pihak Majlis tidak memberikan elaun kepada pelajar semasa menjalani latihan industri di Majlis Daerah Tanjong Malim.</TD>';


		$message .= '</TR>';
								
		$message .= '<TR>';
		$message .= '<TD>--</TD>';
		$message .= '</TR>';

        $message .= '<TR>';
		$message .= '<TD>Sekian dimaklumkan dan terima kasih.</TD>';
		$message .= '</TR>';

        $message .= '<TR>';
        $message .= '<TD> "BERKHIDMAT UNTUK NEGARA"</TD>';
		$message .= '</TR>';

        $message .= '<TR>';
		$message .= '<TD> Saya yang menjalankan amanah</TD>';
		$message .= '</TR>';

        $message .= '<TR>';
		$message .= '<TD>t.t</TD>';
		$message .= '</TR>';

        $message .= '<TR>';
        $message .= '<TD>        ( ADMIN )        </TD>';
		$message .= '</TR>';

        $message .= '<TR>';
        $message .= '<TD>        Bahagian Pentadbiran & Perkhidmatan
        </TD>';		
        $message .= '</TR>';

        $message .= '<TR>';
        $message .= '<TD>        Majlis Daerah Tanjong Malim
        </TD>';
        $message .= '</TR>';

        $message .= '<TR>';
        $message .= '<TD>                No. Tel: 05-4563406
        </TD>';		
        $message .= '</TR>';

        $message .= '<TR>';
        $message .= '<TD>               No. Faks: 05-4563430/440
        </TD>';		
        $message .= '</TR>';

        $message .= '<TR>';
        $message .= '<TD>         emel :mdtmalim@mdtm.gov.my
        </TD>';		
        $message .= '</TR>';
						
	    $message .= '</TABLE>';
		$message .= '</body></html>'. "\n";
		$message .= '-------------------------------------------------------' . "\n";
								
		
			$mail->setFrom('vishaneproduction@gmail.com', 'Internship Application System'); // Set the sender of the message.
			$mail->addAddress($to, $to); // Set the recipient of the message.
			$mail->Subject = $subject; // The subject of the message.

			$mail->Body = $message; 
           $attach_file=$folder."".$attachment;
            
			$mail->addAttachment( $attach_file);
			$mail->IsHTML(true);
			
		  if ($mail->send())
		  {
			echo '<script>alert("Berjaya menghantar surat tawaran!")</script>';
            
			echo '<script language="javascript">';
			echo 'window.location.href="manage_intern.php";';
			echo'</script>';
		  }
		  else
		  {
			echo '<script>alert("Sistem Ralat, Sila cuba kemudian!")</script>';
            
			echo '<script language="javascript">';
			echo 'window.location.href="manage_intern.php";';
			echo'</script>';
		  }
		 }
    ?>
</html>