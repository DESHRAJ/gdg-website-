<?php
	$lines = file('/static/php/file.txt');
	$credentials = array();
	
	foreach($lines as $line) {
	    if(empty($line)) continue;
	    
	        // whole line
		$line = trim(str_replace(": ", ':', $line));
		$lineArr = explode(' ', $line);

		// username only
		$username = explode(':', $lineArr[0]);
		$username = array_pop($username);
		
		// password
		$password = explode(':', $lineArr[1]);
		$password = array_pop($password);
						
		// 		putting them together
		//		$credentials[$username] = $password;
		}
		
			    require '/static/php/PHPMailer/PHPMailerAutoload.php';

			    $mail = new PHPMailer;

			    $mail->isSMTP();                                      // Set mailer to use SMTP
			    $mail->Host = 'smtp.gmail.com';  // Specify main and backup server
			    $mail->SMTPAuth = true;                               // Enable SMTP authentication
			    $mail->Username = $username;                            // SMTP username
			    $mail->Password = $password;                           // SMTP password
			    $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

			    // Build Form Attributes
			    $userName = $_POST['contact-form-name'];
			    $emailAdd = $_POST['contact-form-mail'];
			    $phoneNo = $_POST['contact-form-phone'];
			    $userMessage = $_POST['contact-form-message'];

			    
			    // Build Mail Parameters 
			    $mail->From = 'sai.spark0@gmail.com';
			    $mail->FromName = 'TakeZero';
			    $mail->addAddress('archit.py@gmail.com', 'TakeZero');  // Add a recipient; name is optional
			    $mail->addReplyTo('archit@asetalias.in', 'Information');
			    $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
			    $mail->isHTML(true);                                  // Set email format to HTML
			    $mail->Subject = 'TakeZero Query Form for: ' . $userName . " / " . $emailAdd;

			    $mail->addCC('arcshams@gmail.com');
			    // $mail->addBCC('bcc@example.com');
			    // $mail->addAttachment('/path/to/attachment.tar.gz');         // Add attachments
			    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

			    // Combine all form attributes into 1 message
			    $message  = "<b>Name:</b> " . $userName . "<br>";
			    $message .= "<b>Email:</b> " . $emailAdd . "<br>";
			    $message .= "<b>Phone:</b> " . $phoneNo . "<br>";
			    $message .= "<b>Message:</b> " . $userMessage . "<br>";

			    //$message .= "<b>:</b> " . $;

			    $mail->Body    = $message;
			    $mail->AltBody = "Here's a mail acknowledging that we've received information provided through TakeZero Homepage contact-form";
			    
			    if(!$mail->send()) {
			       echo 'Message could not be sent.';
			       echo 'Mailer Error: ' . $mail->ErrorInfo;
			       exit;
			     }
				     
			    echo 'Message has been sent';

?>