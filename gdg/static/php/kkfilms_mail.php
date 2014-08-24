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
			    $InputName = $_POST['InputName'];
			    $InputGuardian = $_POST['InputGuardian'];
			    $InputCaste = $_POST['InputCaste'];
			    $InputPhoneNumber = $_POST['InputPhoneNumber'];
			    $InputMobileNumber = $_POST['InputMobileNumber'];
			    $InputEmail = $_POST['InputEmail'];
			    $InputReligion = $_POST['InputReligion'];
			    $dpYears = $_POST['dpYears'];
			    $gender = $_POST['gender'];
			    
			    $InputPermanentAddress = '<b>Line1:</b> ' . $_POST['InputAddress1'] . '<br>';
			    $InputPermanentAddress .= '<b>Line2:</b> ' . $_POST['InputAddress2'] . '<br>';
			    $InputPermanentAddress .= '<b>City:</b> ' . $_POST['InputCity'] . '<br>';
			    $InputPermanentAddress .= '<b>State:</b> ' . $_POST['InputState'] . '<br>';
			    $InputPermanentAddress .= '<b>Country:</b> ' . $_POST['InputCountry'] . '<br>';
			    $InputPermanentAddress .= '<b>PinCode:</b> ' . $_POST['InputPinCode'] . '<br>';

			    if (isset($_POST['mailingAddress'])) {
			       	$InputMailingAddress = 'Same as Permanent';
			       }
			    else {
			    	$InputMailingAddress = '<b>Line1:</b> ' . $_POST['InputAddress12'] . '<br>';
				$InputMailingAddress .= '<b>Line2:</b> ' . $_POST['InputAddress22'] . '<br>';
				$InputMailingAddress .= '<b>City:</b> ' . $_POST['InputCity2'] . '<br>';
				$InputMailingAddress .= '<b>State:</b> ' . $_POST['InputState2'] . '<br>';
				$InputMailingAddress .= '<b>Country:</b> ' . $_POST['InputCountry2'] . '<br>';
				$InputMailingAddress .= '<b>PinCode:</b> ' . $_POST['InputPinCode2'] . '<br>';
			    }
			    
			    $audition = $_POST['audition'];
			    $profession = $_POST['profession'];
			    $InputNationality = $_POST['InputNationality'];
			    $affiliation = $_POST['affiliation'];

			    
			    // Build Mail Parameters 
			    $mail->From = 'sai.spark0@gmail.com';
			    $mail->FromName = 'TakeZero KKFilms';
			    $mail->addAddress('contact@takezero.in', 'KKFilms');  // Add a recipient; name is optional
			    $mail->addReplyTo('contact@takezero.in', 'Information');
			    $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
			    $mail->isHTML(true);                                  // Set email format to HTML
			    $mail->Subject = 'Form for: ' . $InputName . " / " . $InputEmail;

			    // $mail->addCC('cc@example.com');
			    // $mail->addBCC('bcc@example.com');
			    // $mail->addAttachment('/path/to/attachment.tar.gz');         // Add attachments
			    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

			    // Combine all form attributes into 1 message
			    $message  = "<b>Name:</b> " . $InputName . "<br>";
			    $message .= "<b>Guardian:</b> " . $InputGuardian . "<br>";
			    $message .= "<b>Caste:</b> " . $InputCaste . "<br>";
			    $message .= "<b>Religion:</b> " . $InputReligion . "<br>";
			    $message .= "<b>Phone Number:</b> " . $InputPhoneNumber . "<br>";
			    $message .= "<b>Mobile Number:</b> " . $InputMobileNumber . "<br>";
			    $message .= "<b>Input Email:</b> " . $InputEmail . "<br>";
			    $message .= "<b>Birth Date:</b> " . $dpYears . "<br>";
			    $message .= "<b>Gender:</b> " . $gender . "<br><br>";
			    $message .= "<b>Permanent Address:- </b><br>";
			    $message .= $InputPermanentAddress . "<br><br>";
			    $message .= "<b>MailingAddress:- </b><br>";
			    $message .= $InputMailingAddress . "<br><br>";
			    $message .= "<b>Audition Centre:</b> " . $audition . "<br>";
			    $message .= "<b>Audition For:</b> " . $profession . "<br>";
			    $message .= "<b>Nationality:</b> " . $InputNationality . "<br>";
			    if (isset($_POST['affiliation'])) {
			        $message .= "<b>Agreement signed:</b> Yes";
			       	}
			   else {
			   	$message .= "<b>Agreement signed:</b> No";
				}

			    //$message .= "<b>:</b> " . $;

			    $mail->Body    = $message;
			    $mail->AltBody = "Here's a mail acknowledging that we've received your information provided on KKfilms webpage";
			    
			    if(!$mail->send()) {
			       echo 'Message could not be sent.';
			          echo 'Mailer Error: ' . $mail->ErrorInfo;
				     exit;
				     }
				     
			    echo 'Message has been sent';

?>