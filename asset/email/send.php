<?php

require ('PHPMailerAutoload.php');

$mail = new PHPMailer;

// Form Data
$name = $_REQUEST['name'] ;
$subject = $_REQUEST['subject'] ;
$email = $_REQUEST['email'] ;
$message = $_REQUEST['message'] ;

$mailbody = 'Information' . PHP_EOL . PHP_EOL .
            'Name : ' . $name . '' . PHP_EOL .
            'E-mail Address : ' . $email . '' . PHP_EOL .
            'Message : ' . $message . '' . PHP_EOL;

$mail->isSMTP();                                      // Set mailer to use SMTP // Local // Gmail
$mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
// $mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = 'email.mheljaybuenaflor@gmail.com'; // SMTP username
$mail->Password = '09475590044J@y'; // SMTP password
$mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587; // TCP port to connect

$mail->setFrom('email.mheljaybuenaflor@gmail.com', 'WebMaster'); // Admin ID
$mail->addAddress('mheljaybuenaflor14@gmail.com', 'Admin'); // Business Owner ID
$mail->addReplyTo($email, $name); // Form Submitter's ID

//Provide file path and name of the attachments
// $mail->addAttachment("file.txt", "File.txt");  
// $mail->addAttachment("../asset/profile/mj.webp"); //Filename is optional

// $mail->addCC("emjaygaming23@gmail.com");
// $mail->addBCC("email.mheljaybuenaflor@gmail.com");
// $mail->AltBody = "This is the plain text version of the email content";

$mail->isHTML(false); // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $mailbody;

// $mail->send();

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

?>