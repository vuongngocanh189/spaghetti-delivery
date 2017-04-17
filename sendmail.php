<?php
	require 'phpmailer/PHPMailerAutoload.php';
	$name = trim($_POST['name']);
	$phone = trim($_POST['phone']);
	$address = trim($_POST['address']);
	$spg = trim($_POST['spg']);
	$payment = trim($_POST['payment']);
	$message = trim($_POST['message']);
	$email = trim($_POST['email']);

	if($name != null &&
		$spg != null &&
		$payment != null &&
		$email != null)
	{
		$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
		if(!preg_match($email_exp,$email)==0) 
		{
			$signal = 'bad';
		  	$msg = 'Invalid email. Please check.';
		}else{ 
		     //send email
		     $mail = new PHPMailer;
		     $mail->isSMTP();  
		     $mail->CharSet='UTF-8';                                    // Set mailer to use SMTP
			 $mail->Host = ''; 						 // Specify main and backup SMTP servers
			 $mail->SMTPAuth = true;                               // Enable SMTP authentication
			 $mail->Username = '';                 // SMTP username
			 $mail->Password = '';                           // SMTP password
			 $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
			 $mail->Port = 465;  
			 $mail->isHTML(true);

			 $mail->setFrom('info@valmiitkotisivut.fi', 'Valmiitkotisivut');
		     $mail->addAddress('info@valmiitkotisivut.fi', 'Valmiitkotisivut');
		     $mail->Subject = 'Spaghetti order';
		     $mail->Body    = '<p>Order here:<br />
		     					Name: '. $name .'<br />
		     					Spaghetti: '. $spg .'<br />
		     					Phone: '. $phone .'<br />
		     					Payment: '. $payment .'<br />
		     					Address: '. $address .'<br />
		     					Message: '. $message .'</p>
		     				';
			 if (!$mail->send()) {
			 	$signal = 'bad';
			    $msg = $mail->ErrorInfo;
			 } else {
			 	$signal = 'ok';
			    $msg = 'Order has been sent. Thanks a lot!';
			 }

		}
	}else{
		$signal = 'bad';
		$msg = 'Please fill in all the required(*) fields';
	}
	$data = array(
		'signal' => $signal,
		'msg' => $msg
	);
	echo json_encode($data);
?>