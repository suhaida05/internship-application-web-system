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
	 
		 $Email = $_POST['email'];
		
		 $User        = mysqli_query($con, "SELECT * FROM applier WHERE email='".$Email."'") or die(mysqli_error());
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
		  
		  $to=$res['email'];
		  $subject='Lupa Kata Laluan';
		  
		 
		$message = '------------------------------------------------------';
		$message .= '<html><body>';
	    $message .= '<TABLE border="0">';
		$message .= '<TR>';
		$message .= '<TD>Nama</TD>';
		$message .= '<TD>:</TD>';
		$message .= '<TD>'.$res['name'].'</TD>';
		$message .= '</TR>';
								
		$message .= '<TR>';
		$message .= '<TD>Kata Laluan</TD>';
		$message .= '<TD>:</TD>';
		$message .= '<TD>'.$res['password'].'</TD>';
		$message .= '</TR>';
						
	    $message .= '</TABLE>';
		$message .= '</body></html>'. "\n";
		$message .= '-------------------------------------------------------' . "\n";
								
		
			$mail->setFrom('vishaneproduction@gmail.com', 'Sistem Permohonan Latihan Praktikal'); // Set the sender of the message.
			$mail->addAddress($to, $to); // Set the recipient of the message.
			$mail->Subject = $subject; // The subject of the message.

			$mail->Body = $message; 
			//$mail->addAttachment('images/phpmailer_mini.png');
			$mail->IsHTML(true);
			
		  if ($mail->send())
		  {
			echo '<script>alert("Kami telah hantar kata laluan ke e-mel anda.")</script>';
            
			echo '<script language="javascript">';
			echo 'window.location.href="login.php";';
			echo'</script>';
		  }
		  else
		  {
			echo '<script>alert("Sistem Ralat, Sila cuba kemudian!")</script>';
            
			echo '<script language="javascript">';
			echo 'window.location.href="update_password.php";';
			echo'</script>';
		  }
		 }
		 else 
		 {
			echo '<script>alert("Maaf, E-mel ini tiada dalam rekod kami")</script>';
            
			echo '<script language="javascript">';
			echo 'window.location.href="update_password.php";';
			echo'</script>';			
		 }	
		
		
    ?>
</html>