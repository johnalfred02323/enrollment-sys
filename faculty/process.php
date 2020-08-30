<?php

include('../config/config.php');
include_once('../login/functions.php');

if (func::checkLoginState($pdo_conn)) {
	# redirect user to login page
	header("Location: ../faculty/dashboard");
	exit();
}

if(isset($_POST['login'])){
	

	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$usert = 'FAUSER';
	$check_flag = mysqli_query($conn, "SELECT status FROM webpages_flag WHERE webpage = 'faculty'");
	$check_flag_data = mysqli_fetch_assoc($check_flag);
	if($check_flag_data['status'] == 1) {
		// $check_status = mysqli_query($conn, "SELECT status FROM faculty_user WHERE status = 1 AND username = '$user'");
		// $check_status_data = mysqli_fetch_assoc($check_status);
		// if()
		$stmt = $pdo_conn->prepare("SELECT * FROM faculty_user WHERE username = ?");
		$stmt->bindParam(1, $user);
		$stmt->execute();
		$data = $stmt->fetch();
		$username = $data['username'];
		$password = $data['password'];
		$faculty_id = $data['id'];
		$status = $data['status'];
		$name = $data['lastname'].', '.$data['firstname'].' '.substr($data['middlename'],0,1).'.';

		if($status == 1) {
			if(password_verify($pass, $password)){
				func::createRecord($pdo_conn, $username, $usert.'-'.$faculty_id);
				// $_SESSION['user'] = $username;
				// $_SESSION['usertype'] = "Faculty";
				// $_SESSION['faculty_id'] = $faculty_id;
				setcookie('name', $name, time() + (86400) * 30, '/');
				setcookie('userrole', 'Faculty', time() + (86400) * 30, '/');
				echo 'dashboard?login-successful';
				exit();
			}
			else{
				echo "0";
			}
		}
		else if($status == 0) {
			echo "2";
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
	$filename = $_POST['filename'];

	$check = mysqli_query($conn, "SELECT submitted FROM class_record WHERE id = $cr_id");
	$row = mysqli_fetch_assoc($check);
	if($row['submitted'] == 0) {
		for ($i=0; $i < $total_num; $i++) {
		$query = mysqli_query($conn, "INSERT INTO grade_report (student_number, cr_id, midterm_grade, final_grade, tfg, remarks) VALUES ('".$data->stud_num[$i]."',$cr_id,'".$data->midterm_grades[$i]."','".$data->final_grades[$i]."','".$data->tfg[$i]."','".$data->remarks[$i]."');") or die(mysqli_error($conn));
		}
		$dt_today = date('Y-m-d');
		$query2 = $pdo_conn->prepare("UPDATE class_record SET submitted = 1, submitted_at = :date_today, excel_file = :excel_file WHERE id = :cr_id");
		$query2->execute(array(':date_today' => $dt_today, ':excel_file' => $filename, ':cr_id' => $cr_id));
		echo "Grades Submitted Successfully.";
	}
	else {
		echo "0";
	}
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

if(isset($_POST['create_account'])) {
	session_start();
	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$mname = $_POST['middlename'];
	$contact_num = $_POST['contact_number'];
	$user = $_POST['username'];
	$pass = password_hash($_POST['password'], PASSWORD_ARGON2I);

	$check = mysqli_query($conn, "SELECT * FROM faculty_user WHERE username = '".$user."'") or die(mysqli_error($conn));
	if(mysqli_num_rows($check) > 0){
		echo "0";
	}
	else {
		$stmt = $pdo_conn->prepare("INSERT INTO faculty_user (firstname, lastname, middlename, contact_number, username, password) VALUES (?,?,?,?,?,?)");
		$stmt->bindParam(1, $fname);
		$stmt->bindParam(2, $lname);
		$stmt->bindParam(3, $mname);
		$stmt->bindParam(4, $contact_num);
		$stmt->bindParam(5, $user);
		$stmt->bindParam(6, $pass);

		if($stmt->execute()){
			$stmt = $pdo_conn->prepare("SELECT * FROM faculty_user WHERE username = ?");
			$stmt->bindParam(1, $user);
			$stmt->execute();
			$data = $stmt->fetch();
			$username = $data['username'];
			$faculty_id = $data['id'];

			$_SESSION['user'] = $username;
			$_SESSION['usertype'] = "Faculty";
			$_SESSION['faculty_id'] = $faculty_id;
			echo 'dashboard?login-successful';
			exit();


		}
		else {
			echo "asdd";
		}
	}
	exit();
}

if(isset($_POST['edit_personal_data'])) {
	$id = $_POST['id'];
	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$mname = $_POST['middlename'];
	$contact_num = $_POST['contact_number'];

	$query = "UPDATE faculty_user SET firstname = '".$fname."', lastname = '".$lname."', middlename = '".$mname."', contact_number = '".$contact_num."' WHERE id = $id";
	if(mysqli_query($conn, $query)) {
		echo "1";
	}
	else {
		echo "ERROR";
	}
	exit();
}

if(isset($_POST['change_username'])) {
	$id = $_POST['id'];
	$username = $_POST['username'];
	$conf_pass = $_POST['conf_pass'];
	$stmt = $pdo_conn->prepare("SELECT * FROM faculty_user WHERE id = ?");
	$stmt->bindParam(1, $id);
	$stmt->execute();
	$data = $stmt->fetch();
	$password = $data['password'];
	if(password_verify($conf_pass, $password)){
		$check = mysqli_query($conn, "SELECT * FROM faculty_user WHERE username = '".$username."' AND id <> $id") or die(mysqli_error($conn));
		if(mysqli_num_rows($check) > 0) {
			echo "2";
		}
		else {
			$change_query = "UPDATE faculty_user SET username = '".$username."' WHERE id = $id";
			if(mysqli_query($conn, $change_query) or die(mysqli_error($conn))) {
				echo "0";
			}
			else {
				echo "ASD";
			}
		}
	}
	else {
		echo "1";
	}
	exit();
}

if(isset($_POST['change_password'])) {
	$id = $_POST['id'];
	$old_pass = $_POST['old_pass'];
	$new_pass = password_hash($_POST['new_pass'], PASSWORD_ARGON2I);

	$stmt = $pdo_conn->prepare("SELECT * FROM faculty_user WHERE id = ?");
	$stmt->bindParam(1, $id);
	$stmt->execute();
	$data = $stmt->fetch();
	$password = $data['password'];
	if(password_verify($old_pass, $password)){
		$stmt = $pdo_conn->prepare("UPDATE faculty_user SET password = ? WHERE id = ?");
		$stmt->bindParam(1, $new_pass);
		$stmt->bindParam(2, $id);
		if($stmt->execute()){
			echo "0";
		}
	}
	else {
		echo "1";
	}
}


if(isset($_POST['add_signees'])) {
	$name = $_POST['name'];
	$role = $_POST['role'];
	$position = $_POST['pos'];

	$query = "INSERT INTO gradereport_config (name,position,role,status) VALUES ('".$name."','".$position."','".$role."',0)";
	if(mysqli_query($conn, $query)) {
		echo "Added Successfully";
	}
	exit();
}

if(isset($_POST['ret_avail_sig'])) {
	$ref = mysqli_query($conn, "SELECT * FROM gradereport_config WHERE status = 0");
		$output = '<table class="table table-striped" id="available_signee">
            <thead>
              <tr class="table-bordered">
                <th scope="col">Name</th>
                <th scope="col">Position</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>';
	if(mysqli_num_rows($ref) > 0) {
		$output .= '<tr id="nm"><td colspan="4"><center><span class="add-sig add_signee">Add New Signee</span></center></td></tr>';
		while($row = mysqli_fetch_assoc($ref)) {
			$output .= '<tr>
		                  <td>'.$row['name'].'</td>
		                  <td>'.$row['position'].'</td>
		                  <td>'.$row['role'].'</td>
		                  <td><button type="button" class="btn btn-primary select-signee" id="'.$row['id'].'" ripple style="margin-bottom:2px;"><i class="far fa-check-circle"></i> Select</button>&nbsp;&nbsp;<button type="button" class="btn btn-danger delete-signee" id="'.$row['id'].'" data-toggle="modal" data-target="#confirm_delete" ripple style="margin-bottom:2px;"><i class="far fa-trash-alt"></i></button></td>
		                </tr>';
		}

	}
	else {
		$output .= '<tr id="nm">
              <td colspan="4"><center><i>No Signee Available</i> <span class="add-sig add_signee">Add New Signee</span></center></td>
            </tr>';
	}
	$output .= '</tbody></table>';
	echo $output;
	exit();
}

if(isset($_POST['ret_sel_sig'])) {
	$ref = mysqli_query($conn, "SELECT * FROM gradereport_config WHERE status = 1");
		$output = '<table class="table table-striped" id="selected_signee">
            <thead>
              <tr class="table-bordered">
                <th scope="col">Name</th>
                <th scope="col">Position</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>';
	if(mysqli_num_rows($ref) > 0) {
		while($row = mysqli_fetch_assoc($ref)) {
			$output .= '<tr>
		                  <td>'.$row['name'].'</td>
		                  <td>'.$row['position'].'</td>
		                  <td>'.$row['role'].'</td>
		                  <td><button type="button" class="btn btn-danger remove-signee" id="'.$row['id'].'" ripple><i class="far fa-times-circle"></i> Remove</button>&nbsp;</td>
		                </tr>';
		}

	}
	else {
		$output .= '<tr id="nm">
              <td colspan="4"><center><i>No Selection Occur</i></center></td>
            </tr>';
	}
	$output .= '</tbody></table>';
	echo $output;
	exit();
}

if(isset($_POST['delete_signee'])) {
	$id = $_POST['id'];
	$query = "DELETE FROM gradereport_config WHERE id = $id";
	if(mysqli_query($conn,$query)) {
		echo "Signee deleted successfully";
	}
	exit();
}

if(isset($_POST['select_signee'])) {
	$id = $_POST['id'];
	$ver = 0;
	$sub = 0;
	$check = mysqli_query($conn, "SELECT * FROM gradereport_config");
	if(mysqli_num_rows($check) > 0) {
		while($row = mysqli_fetch_assoc($check)) {
			if($row['status'] == 1 && $row['role'] == "Verification") {
				$ver++;
			}
			if($row['status'] == 1 && $row['role'] == "Receiver/Submitted to") {
				$sub++;
			}
		}
	}

	$qq = mysqli_query($conn, "SELECT * FROM gradereport_config WHERE id = $id");
	$qq_data = mysqli_fetch_assoc($qq);

	if($ver != 1 && $qq_data['role'] == "Verification") {
		$query = "UPDATE gradereport_config SET status = 1 WHERE id = $id";
		if(mysqli_query($conn,$query)) {
			echo "0";
		}
	}
	else if($ver == 1 && $qq_data['role'] == "Verification") {
		echo "1";
	}

	if($sub != 1 && $qq_data['role'] == "Receiver/Submitted to") {
		$query = "UPDATE gradereport_config SET status = 1 WHERE id = $id";
		if(mysqli_query($conn,$query)) {
			echo "0";
		}
	}
	else if($sub == 1 && $qq_data['role'] == "Receiver/Submitted to") {
		echo "2";
	}
	exit();
}

if(isset($_POST['remove_signee'])) {
	$id = $_POST['id'];
	$query = "UPDATE gradereport_config SET status = 0 WHERE id = $id";
	if(mysqli_query($conn,$query)) {
		echo "Removed";
	}
	exit();
}

if(isset($_POST['search_account'])) {
	$val = $_POST['val'];

	$ss = mysqli_query($conn, "SELECT id,lastname, firstname, middlename, email, contact_number FROM faculty_user WHERE email = '".$val."' OR contact_number = '".$val."'");
	if(mysqli_num_rows($ss) > 0) {
		$info = mysqli_fetch_array($ss);
		echo json_encode($info);
	}
	else {
		echo "0";
	}
	exit();
}


