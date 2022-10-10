<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
	$mail->SMTPDebug = 2;									
	$mail->isSMTP();											
	$mail->Host	 = 'smtp.gmail.com;';					
	$mail->SMTPAuth = true;							
	$mail->Username = 'ctis256project@gmail.com';				
	$mail->Password = 'CTISctis256';						
	$mail->SMTPSecure = 'tls';							
	$mail->Port	 = 587;

	$mail->setFrom('ctis256project@gmail.com', 'PPP');		
	$mail->addAddress('saryyevanurjemal@gmail.com');
	$mail->addAddress('nima.kamali@ug.bilkent.edu.tr', 'TEST');
	
	$mail->isHTML(true);								
	$mail->Subject = 'Authenticate your account';
	$mail->Body = 'Dear user,<br>Please <b><a href="nimakamali.com">
	click here</a></b> to authenticate your account.<br><br>Best wishes,<br>CTIS256 Project&trade;.';
	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
	$mail->send();
	echo "Mail has been sent successfully!";
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
