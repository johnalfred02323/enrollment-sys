<?php 
session_start();
include('../config/config.php');

if(isset($_POST['login'])){
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$check_flag = mysqli_query($conn, "SELECT status FROM webpages_flag WHERE webpage = 'faculty'");
	$check_flag_data = mysqli_fetch_assoc($check_flag);
	if($check_flag_data['status'] == 1) {
		$stmt = $pdo_conn->prepare("SELECT id,username,password,department,usertype FROM user WHERE username = ?");
		$stmt->bindParam(1, $user);
		$stmt->execute();
		$data = $stmt->fetch();
		$username = $data['username'];
		$password = $data['password'];
		$usertype = $data['usertype'];
		$faculty_id = $data['id'];
		
		if(password_verify($pass, $password)){
			
			if($usertype == "Faculty"){
				$_SESSION['user'] = $username;
				$_SESSION['usertype'] = $usertype;
				$_SESSION['faculty_id'] = $faculty_id;
				echo '../faculty/dashboard?successful';
				exit();
			}
			else{
				echo "0";
			}
		}
		else{
			echo "0";
		}
	}
	else {
		echo "3";
	}
	exit();
}

if(isset($_POST['submit'])) {
	$data = json_decode($_POST['data']);
	$total_num = count($data->stud_num);
	$cr_id = $_POST['cr_id'];

	for ($i=0; $i < $total_num; $i++) { 
		$query = mysqli_query($conn, "INSERT INTO grade_report (student_number, cr_id, prelim_grade, prelim_remarks, midterm_grade, midterm_remarks, final_grade, final_remarks) VALUES ('".$data->stud_num[$i]."',$cr_id,'".$data->prelim_grades[$i]."','".$data->prelim_remarks[$i]."','".$data->midterm_grades[$i]."','".$data->midterm_remarks[$i]."','".$data->final_grades[$i]."','".$data->final_remarks[$i]."');") or die(mysqli_error($conn));
	}

	$query2 = mysqli_query($conn, "UPDATE class_record SET submitted = 1 WHERE id = $cr_id");
	echo "Grades Submitted Successfully.";
	exit();
}

if(isset($_POST['relogin'])) {
	$user = $_POST['user'];
	$pass = $_POST['re_password'];

	$stmt = $pdo_conn->prepare("SELECT id,username,password,department,usertype FROM user WHERE username = ?");
	$stmt->bindParam(1, $user);
	$stmt->execute();
	$data = $stmt->fetch();
	$password = $data['password'];
	if(password_verify($pass, $password)){
		echo "1";
	}
	else {
		echo "0";
	}
	exit();
}
