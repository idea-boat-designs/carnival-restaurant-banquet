<?php require("PHPMailer/PHPMailerAutoload.php");

// ADD your Email and Name
$recipientEmail='kamiyabhusain.429@gmail.com';
$recipientName='John Doe';

//collect the posted variables into local variables before calling $mail = new mailer

$senderName = $_POST['contact-name'];
$senderLast = $_POST['contact-last'];
$senderTele = $_POST['contact-phone'];
$senderEmail = $_POST['contact-email'];
// $senderSubject = 'New Message From' . $senderName . $senderEmail;
$senderSubject = $_POST['contact-subject'];
$senderMessage = $_POST['contact-message'];

//Create a new PHPMailer instance
$mail = new PHPMailer();

//Set who the message is to be sent from
$mail->setFrom($recipientEmail, $recipientName);
//Set an alternative reply-to address
$mail->addReplyTo($recipientEmail,$recipientName);
//Set who the message is to be sent to
$mail->addAddress($recipientEmail, $senderName );
//Set the subject line
$mail->Subject = $senderSubject;

// $mail->Body = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);
$mail->AddAddress($recipientEmail, $recipientName);

//$mail-&gt;AddAttachment("images/phpmailer.gif"); // attachment
//$mail-&gt;AddAttachment("images/phpmailer_mini.gif"); // attachment

//now make those variables the body of the emails

$mail->Body="
Name: $senderName .$senderLast<br/>
Phone: $senderTele<br/>
Email: $senderEmail<br/>
Suburb: $senderSubject<br/>
Message: $senderMessage";

if(!$mail->Send()) {
	echo '<div class="alert alert-danger" role="alert">Error: '. $mail->ErrorInfo.'</div>';
} else {
	echo '<div class="alert alert-success" role="alert">Thank you. We will contact you shortly.</div>';
}
?>