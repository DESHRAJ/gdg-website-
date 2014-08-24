<?php
	define('TIMEZONE', 'Asia/Calcutta'); // INDIA
	date_default_timezone_set(TIMEZONE);

	require 'PHPMailer/PHPMailerAutoload.php';

	$Name = Trim(stripslashes($_POST['name'])); 
	$Email = Trim(stripslashes($_POST['email'])); 
	$Message = Trim(stripslashes($_POST['message']));

	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->SMTPDebug = 2;
	$mail->Debugoutput = 'html';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = "deshrajdry@gmail.com";
	$mail->Password = "dineshsumitra";
	$mail->setFrom('desh.py@gmail.com', 'Contact');
	$mail->addAddress('deshrajdry@gmail.com', 'Deshraj');
	$mail->Subject = $Title;

	// prepare email body text
	$Body = "";
	$Body .= "Name: ";
	$Body .= $Name;
	$Body .= "\n";
	$Body .= "Email: ";
	$Body .= $Email;
	$Body .= "\n";
	$Body .= "Message: ";
	$Body .= "\n";
	$Body .= $Message;
	$Body .= "\n";

	//Replace the plain text body with one created manually
	$mail->Body = $Body;

	// if the url field is empty 
	if(isset($_POST['url']) && $_POST['url'] == ''){
		//send the message, check for errors
		if ($mail->send()) {
		    echo "Thank You! Your message has been sent.";
		} else {
			echo "Something went wrong. Please try again";
		}
	}
?>