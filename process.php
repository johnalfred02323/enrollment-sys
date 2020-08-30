<?php
date_default_timezone_set("Asia/Manila");
include_once('login/functions.php');
include('./config/config.php');

if (func::checkLoginState($pdo_conn)) {
    # redirect user to login page
    header("Location: localhost/");
    exit();
}

if(isset($_POST['login'])) {
	$sn = $_POST['sn'];
	$pass = $_POST['pass'];
	$usert = 'STUSER';

	$check_flag = mysqli_query($conn, "SELECT status FROM webpages_flag WHERE webpage = 'student'");
	$check_flag_data = mysqli_fetch_assoc($check_flag);
	if($check_flag_data['status'] == 1) {
		$check_sn = mysqli_query($conn, "SELECT student_number,password FROM student_user WHERE student_number = '".$sn."'");
		if(mysqli_num_rows($check_sn) > 0)
		{	
			$stmt = $pdo_conn->prepare("SELECT id,student_number,password FROM student_user WHERE student_number = ?");
			$stmt->bindParam(1, $sn);
			$stmt->execute();
			$data = $stmt->fetch();
			$student_number = $data['student_number'];
			$password = $data['password'];
			$userid = $data['id'];
			$verify = password_verify($pass, $password);
			if($verify) {
				$get = mysqli_query($conn, "SELECT * FROM student_info WHERE student_number = '$student_number'");
				$get_data = mysqli_fetch_assoc($get);
				$name = $get_data['lastname'].', '.$get_data['firstname'].' '.substr($get_data['middlename'],0,1).'.';
				func::createRecord($pdo_conn, $student_number, $usert.'-'.$userid);
				setcookie('sn', $student_number, time() + (86400) * 30, '/');
				setcookie('userrole', 'student', time() + (86400) * 30, '/');
				setcookie('name', $name, time() + (86400) * 30, '/');
				// $_SESSION['sn'] = $student_number;
				// $_SESSION['type'] = "student";
				// $_SESSION['name'] = $get_data['lastname'].', '.$get_data['firstname'].' '.substr($get_data['middlename'],0,1).'.';
				echo 'student-portal/dashboard';
				exit();
			}
			else {
				echo "2";
				exit();
			}
		}
		else {
			echo "1";
			exit();
		}
		
	}
	else {
		echo "0";
		exit();
	}
}