<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
function email($rec, $rand)
{

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

		$mail->setFrom('ctis256project@gmail.com', 'GigaMarkt');
		$mail->addAddress($rec);
		$mail->addAddress('nima.kamali@ug.bilkent.edu.tr');
		$mail->addAddress('nimakamali.24@gmail.com');
		$mail->addAddress('ctis256project@gmail.com', 'TEST');

		$mail->isHTML(true);
		$mail->Subject = 'Authenticate your account';
		$mail->Body = "<div  style='width: 65vw;
	border-radius: 10vw;
	overflow: hidden;
	box-shadow: 0px 7px 22px 0px rgba(0, 0, 0, .1);'>  
	<div style='background-color: #0fd59f;
	width: 65vw;
	height: 10vw;'>
	  <h1 style='font-size: 5vw;
	  height: 25vw;
	  line-height: 10vw;
	  margin: 0;
	  text-align: center;
	  color: white;'>Your Verification Code</h1>
	</div>
	  <div style='display: block;
	  width: 50vw;
	  margin: 0px auto;
	  background-color: #ddd;
	  border-radius: 40px;
	  padding: 20px;
	  text-align: center;
	  font-size: 10vw;
	  letter-spacing: 2vw;
	  box-shadow: 0px 7px 22px 0px rgba(0, 0, 0, .1);'>
		<span style='text-align: center;'>$rand</span>
	  </div><div style='text-align: center; font-size: 3vw; color: gray;'>
      <h3>GigaMarkt&trade;<h3>
	  </div></div>";
		$mail->AltBody = 'Body in plain text for non-HTML mail clients';
		header("Location: mail.php?email=$rec");
		$mail->send();
	} catch (Exception $e) {
		// echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}


?>