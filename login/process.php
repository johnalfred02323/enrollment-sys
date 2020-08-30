<?php 
date_default_timezone_set("Asia/Manila");
include_once('functions.php');
include('../config/config.php');

if (func::checkLoginState($pdo_conn)) {
    # redirect user to login page
    header("Location: ../login");
    exit();
}

if(isset($_POST['login'])){
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$usert = 'MNUSER';

	$check = mysqli_query($conn, "SELECT * FROM timeframe where status='Active' AND type = 'enrollment'");
  	$currentdate = date('Y-m-d');
  	if (mysqli_num_rows($check) > 0) 
	{
	  $row = mysqli_fetch_assoc($check);
	  $currentdate = date('Y-m-d');
	  if($row['date_from'] > $currentdate || $row['date_to'] < $currentdate)
	  {$checkdate = 0;}
	  else
	  {
	  	$checkdate = 1;
	  }
	}
	else{$checkdate = 0;}

	$stmt = $pdo_conn->prepare("SELECT * FROM user WHERE username = ?");
	$stmt->bindParam(1, $user);
	$stmt->execute();

	if($stmt->rowCount() > 0) {
		$data = $stmt->fetch();
		$userid = $data['id'];
		$username = $data['username'];
		$password = $data['password'];
		$dept = $data['department'];
		$course = $data['course'];
		$major = $data['major'];
		$usertype = $data['usertype'];
		$name = $data['lastname'].', '.$data['firstname'].' '.substr($data['middlename'],0,1).'.';
		$verify = password_verify($pass, $password);
	
		if($verify)
		{
			func::createRecord($pdo_conn, $data['username'], $usert.'-'.$data['id']);
			setcookie('name', $name, time() + (86400) * 30, '/');
			setcookie('userrole', $usertype, time() + (86400) * 30, '/');
			setcookie('userdept', $dept, time() + (86400) * 30, '/');

			if($dept == 'Registrar' && $usertype == 'Super Admin'){
				echo '../admin/registrar?successful';
				exit();
			}
			else if($dept == 'Registrar' && $usertype == 'Enlistment' && $checkdate > 0){
				setcookie('course', $course, time() + (86400) * 30, '/');
				setcookie('major', $major, time() + (86400) * 30, '/');
				echo '../admin/enlistment?successful';
				exit();
			}
			else if($dept == 'Registrar' && $usertype == 'Faculty-Head'){
				setcookie('course', $course, time() + (86400) * 30, '/');
				setcookie('major', $major, time() + (86400) * 30, '/');
				echo '../admin/faculty-head?successful';
				exit();
			}
			else if($dept == 'Accounting' && $usertype == 'Admin'){
				echo '../admin/accounting?successful';
				exit();
			}
			else if($dept == 'Accounting' && $usertype == 'Cashier'){
				echo '../admin/accounting/cashier-dashboard?successful';
				exit();
			}
			else if($dept == 'Admission' && $usertype == 'Admin'){
				echo '../admin/admission?successful';
				exit();
			}		
			else if($dept == 'Admission' && $usertype == 'Staff'){
				echo '../admin/admission?successful';
				exit();
			}
			
			
		}
		else{
			echo "401";
		}
	}
	else {
		echo "400";
	}

}
