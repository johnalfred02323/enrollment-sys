<?php
include('../../config/config.php');
include('gen_code.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'phpmailer/vendor/autoload.php';


if(isset($_POST['create_account'])) {
	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$mname = $_POST['middlename'];
	$contact_num = $_POST['contact_number'];
	$user = $_POST['username'];
  $email =  $_POST['em'];

	$code = 'GRC_FACULTY_'.(generateCode(5,false,'ld'));
	$pass = password_hash($code, PASSWORD_ARGON2I);

  // Instantiation and passing `true` enables exceptions
  $mail = new PHPMailer(true);

	$check_username = mysqli_query($conn, "SELECT * FROM faculty_user WHERE username = '".$user."'") or die(mysqli_error($conn));
	if(mysqli_num_rows($check_username) > 0){
		echo "0";
	}
	else {
		$check_email = mysqli_query($conn, "SELECT * FROM faculty_user WHERE email = '".$email."'") or die(mysqli_error($conn));

		if(mysqli_num_rows($check_email) > 0){
			echo "2";
		}
		else {
			$stmt = $pdo_conn->prepare("INSERT INTO faculty_user (firstname, lastname, middlename, contact_number, email, username, password) VALUES (?,?,?,?,?,?,?)");
			$stmt->bindParam(1, $fname);
			$stmt->bindParam(2, $lname);
			$stmt->bindParam(3, $mname);
			$stmt->bindParam(4, $contact_num);
			$stmt->bindParam(5, $email);
			$stmt->bindParam(6, $user);
			$stmt->bindParam(7, $pass);

			if($stmt->execute()){
	      try {
	          //Server settings
	          // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
	          $mail->isSMTP();
	          $mail->SMTPDebug = 1;
	          $mail->Debugoutput = 'html';                                        // Send using SMTP
	          $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
	          $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	          $mail->Username   = 'villainy123123@gmail.com';                     // SMTP username
	          $mail->Password   = 'wwutxqhbsbfgwmtd';                               // SMTP password
	          $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
	          $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

	          //Recipients
	          $mail->setFrom('grc.sample@gmail.com', 'grc no-reply');
	          $mail->addAddress($email, $lname);     // Add a recipient

	          // Content
	          $mail->isHTML(true);                                  // Set email format to HTML
	          $mail->Subject = 'GRC Faculty System Credentials';
	          $mail->Body    = 'Hello Mr/Ms. '.$lname.', your email has been registered in the GRC Faculty System. <br> This is your login credentials: <br> Username: <b>'.$user.'</b> <br> Password: <b>'.$code.'</b> <br> Note: Your credentials can be change in the system using the user account settings. Thank you.';
	          // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	          if($mail->send()){
	            echo '1';
	            exit();
	          }else{
	              echo 'Message could not be sent.';
	              echo 'Mailer Error: ' . $mail->ErrorInfo;
	              exit();
	          }
	          // echo 'Message has been sent';
	      }
				catch (Exception $e) {
	          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	          exit();
	      }
			}
		}
	}
	exit();
}

if(isset($_POST['change-pass'])) {
	$fac_id = $_POST['id'];
	$get_info = mysqli_query($conn, "SELECT id, username, lastname, firstname, middlename, email, contact_number FROM faculty_user WHERE id = $fac_id");
	$info = mysqli_fetch_assoc($get_info);

	$new_code = 'GRC_FACULTY_'.(generateCode(5,false,'ld'));
	$new_pass = password_hash($new_code, PASSWORD_ARGON2I);

	$mail = new PHPMailer(true);

	$stmt = $pdo_conn->prepare("UPDATE faculty_user SET password = :new_password WHERE id = :fac_id");
	$stmt->bindparam(':new_password', $new_pass, PDO::PARAM_STR, 250);
	$stmt->bindparam(':fac_id', $fac_id, PDO::PARAM_INT);

	if($stmt->execute()) {
		try {
			//Server settings
			// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
			$mail->isSMTP();
			$mail->SMTPDebug = 1;
			$mail->Debugoutput = 'html';                                        // Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'villainy123123@gmail.com';                     // SMTP username
			$mail->Password   = 'wwutxqhbsbfgwmtd';                               // SMTP password
			$mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			$mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

			//Recipients
			$mail->setFrom('grc.sample@gmail.com', 'grc no-reply');
			$mail->addAddress($info['email'], $info['lastname']);     // Add a recipient

			// Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = 'GRC Faculty System Credentials';
			$mail->Body    = 'Hello Mr/Ms. '.$info['lastname'].', your email has been registered in the GRC Faculty System. <br> This is your login credentials: <br> Username: <b>'.$info['username'].'</b> <br> Password: <b>'.$new_code.'</b> <br> Note: Your credentials can be change in the system using the user account settings. Thank you.';
			// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if($mail->send()){
				$message = 'Faculty User <strong>'.$info['firstname'].' '.$info['lastname'].'</strong> changed his/her password via forgot password in faculty webpage.';
				$notif = $pdo_conn->prepare("INSERT INTO notification (user_id,title,message,message_for,user_type) VALUES (:id, 'Faculty Password Change', :msg_notif, 'Super Admin','faculty_user'); ");
				$notif->bindparam(':id', $fac_id, PDO::PARAM_INT);
				$notif->bindparam(':msg_notif', $message, PDO::PARAM_STR, 250);
				$notif->execute();
			}else{
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
				exit();
			}
			// echo 'Message has been sent';
			
		}
		catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			exit();
		}
	}
}