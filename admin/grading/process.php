<?php
include('../../config/config.php');
include('gen_code.php');


if(isset($_POST['submission_timeframe'])) {
	$sy = $_POST['sy'];
	$sem = $_POST['sem'];
	$start = $_POST['start'];
	$end = $_POST['end'];

	$check = mysqli_query($conn, "SELECT * FROM timeframe WHERE type = 'submission';");

	if(mysqli_num_rows($check) > 0) {
		$qq = "UPDATE timeframe SET school_year = '$sy', semester = '$sem', date_to = '$start', date_to = '$end', status = 'Active' WHERE type = 'submission'";
		$updatee = mysqli_query($conn, $qq) or die(mysqli_error($conn));
		if($updatee) {
			echo "Timeframe for submission of grades has been set.<br/>Faculty Users can now access the faculty webpage.";
		}
		else {
			echo "0";
		}
		exit();
	}
	else {
		$query = "INSERT INTO timeframe (school_year,semester,date_from,date_to,type,status) VALUES ('$sy','$sem','$start','$end','submission','Active')";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if($result) {
			echo "Timeframe for submission of grades has been set.<br/>Faculty Users can now access the faculty webpage.";
		}
		else {
			echo "0";
		}
		exit();
	}
}

if(isset($_POST['update_submission_timeframe'])) {
	$query = mysqli_query($conn, "UPDATE timeframe SET status = 'Inactive' WHERE type = 'submission'");
	if($query) {
		echo "Current timeframe been stopped.<br/> Faculty Users can't access the faculty webpage.";
	}
	else {
		echo "0";
	}
}

if(isset($_POST['fac_onoff'])) {
	$flag = $_POST['flag'];
	$query = mysqli_query($conn, "UPDATE webpages_flag SET status = $flag WHERE webpage = 'faculty'");
	if($query) {
		if($flag == 1){
			echo "1";
		}
		else if ($flag == 0) {
			echo "0";
		}
	}
	else {
		echo "error";
	}
	exit();
}

if(isset($_POST['stud_onoff'])) {
	$flag = $_POST['flag'];
	$query = mysqli_query($conn, "UPDATE webpages_flag SET status = $flag WHERE webpage = 'student'");
	if($query) {
		if($flag == 1){
			echo "1";
		}
		else if ($flag == 0) {
			echo "0";
		}
	}
	else {
		echo "error";
	}
	exit();
}

if(isset($_POST['get_students'])) {
	$course = json_decode($_POST['all']);
	$semester = $_POST['semester'];
	$school_year = $_POST['school_year'];
	$output = '';
	$output .= '<div class="table-responsive table-scroll"><table class="table table-striped" id="student_table">
        <thead>
          <tr class="table-bordered">
            <th scope="col">Student&nbsp;Number</th>
            <th scope="col">Name</th>
            <th scope="col">Grade&nbsp;Viewing&nbsp;Code</th>
            <th scope="col" class="align-items-center">Generate&nbsp;Code</th>
          </tr>
        </thead>
        <tbody>';

	if(count($course) > 0) {
		if(isset($_POST['val'])) {
			$search = $_POST['val'];
	    	$query = "SELECT DISTINCT student_enrollment_record.student_number, student_info.lastname, student_info.firstname, student_info.middlename, student_info.course, grade_viewing_code.code, grade_viewing_code.status FROM student_enrollment_record INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id INNER JOIN student_info ON student_info.student_number = student_enrollment_record.student_number LEFT JOIN grade_viewing_code ON grade_viewing_code.student_number = student_info.student_number WHERE school_year = '".$school_year."' AND semester = '".$semester."' AND (student_info.student_number LIKE '%".$search."%' OR student_info.lastname LIKE '%".$search."%' OR student_info.firstname LIKE '%".$search."%') AND (";
	    	for($i = 0; $i < count($course); $i++) {
				$query .= " course = '".$course[$i]."' OR";
			}
	    }
	    else {
	    	$query = "SELECT DISTINCT student_enrollment_record.student_number, student_info.lastname, student_info.firstname, student_info.middlename, student_info.course, grade_viewing_code.code, grade_viewing_code.status FROM student_enrollment_record INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id INNER JOIN student_info ON student_info.student_number = student_enrollment_record.student_number LEFT JOIN grade_viewing_code ON grade_viewing_code.student_number = student_info.student_number WHERE school_year = '".$school_year."' AND semester = '".$semester."' AND (";
	    	for($i = 0; $i < count($course); $i++) {
				$query .= " course = '".$course[$i]."' OR";
			}
	    }



		$query = substr($query, 0, -3);
		$query .= ')';
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$output .= '<tr>
								<td>'.$row['student_number'].'</td>
								<td>'.$row['lastname'].', '.$row['firstname'].' '.substr($row['middlename'], 0,1).'.</td>';
					if($row['status'] == 1){
						$output	.=	'<td style="color:green;">'.$row['code'].'</td>';
					}
					else {
						$output	.=	'<td style="color:red;">'.$row['code'].'</td>';
					}
				$output	.=	'<td class="d-flex justify-content-center"><button class="view-user generate" id="'.$row['student_number'].'">Generate</button></td>
				</tr>';
			}
		}
		else {
			$output .= "<tr><td colspan='4'><center>No Students to display here with your selection.</center></td></tr>";
		}
	}
	else {
		$output .= "<tr><td colspan='4'><center>Select Course to display Student List</center></td></tr>";
	}
	$output .= "</tbody></table></div>";
	echo $output;
	exit();
}

if(isset($_POST['generate_code'])) {
	$id = $_POST['id'];
	$sy = $_POST['sy'];
	$sem = $_POST['sem'];
	$exp = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "+1 month" ) );
	$check = mysqli_query($conn, "SELECT * FROM grade_viewing_code WHERE student_number = '$id'");
	$code = generateCode(6,false,'ud');
	$check_data = mysqli_fetch_assoc($check);
	if(mysqli_num_rows($check) > 0) {
		if($check_data['status'] == 1) {
			echo "0";
			exit();
		}
		else {
			$query = "UPDATE grade_viewing_code SET code = '".$code."', status = 1, expiration_date = '".$exp."' WHERE student_number = '".$id."'";
		}
	}
	else {
		$query = "INSERT INTO grade_viewing_code (student_number,code,status,expiration_date) VALUES ('".$id."','".$code."',1,'".$exp."');";
	}
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if($result) {
		echo $code;
	}
	exit();
}

// if(isset($_POST['generate_all'])) {
// 	$sn = $_POST['student_num'];
// 	$check = mysqli_query($conn, "SELECT * FROM grade_viewing_code WHERE student_number = '$sn'");
// 	$get_course = mysqli_query($conn, "SELECT course FROM student_info WHERE student_number = '$sn'");
// 	$get_course_data = mysqli_fetch_assoc($get_course);
// 	$check_data = mysqli_fetch_assoc($check);
// 	$code = generateCode(6,false,'ud');
// 	if(mysqli_num_rows($check) > 0) {
// 		if($check_data['status'] == 1) {
// 			exit();
// 		}
// 		else {
// 			$query = "UPDATE grade_viewing_code SET code = '".$code."', status = 1 WHERE student_number = '".$sn."'";
// 		}
// 	}
// 	else {
// 		$query = "INSERT INTO grade_viewing_code (student_number,code,status) VALUES ('".$sn."','".$code."',1);";
// 	}
// 	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
// 	if($result) {
// 		echo $get_course_data['course'];
// 	}
// 	exit();
// }

// if(isset($_POST['check_codes'])) {
// 	$query = mysqli_query($conn, "SELECT * FROM ")
// }



if(isset($_POST['ret_gs_signee'])) {
	$query = "SELECT * FROM gradereport_config WHERE role = 'grade slip signee'";
	$get = mysqli_query($conn,$query);
	if(mysqli_num_rows($get) > 0) {
		$get_data = mysqli_fetch_assoc($get);
		echo $get_data['name'];
	}
	else {
		echo '0';
	}
	exit();
}

if(isset($_POST['add_gs_signee'])) {
	$n = $_POST['name'];
	$query1 = "SELECT * FROM gradereport_config WHERE role = 'grade slip signee'";
	$get = mysqli_query($conn,$query1);

	if(mysqli_num_rows($get) > 0) {
		$query = "UPDATE gradereport_config SET name = '".$n."' WHERE role = 'grade slip signee'";
		if(mysqli_query($conn,$query)) {
			echo "Update Successful";
		}
		else {
			echo "0";
		}
	}
	else {
		$query = "INSERT INTO gradereport_config (name,position,role,status) VALUES ('".$n."','Registrar','grade slip signee',3)";

		if(mysqli_query($conn, $query)){
			echo "Successful";
		}
		else {
			echo '0';
		}
	}
}

if(isset($_POST['search_sn'])) {
	$val = $_POST['val'];
	$query = "SELECT * FROM student_info WHERE student_number LIKE '%".$val."%'";
	$result = mysqli_query($conn, $query);
	if(mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_assoc($result);
		$data = array();
		$data['name'] = $row['firstname'].' '.$row['middlename'].' '.$row['lastname'];
		$data['course'] = $row['course'];
		$data['major'] = $row['major'];
		$data['birthday'] = date('F d, Y', strtotime($row['birthday']));
		$data['birthplace'] = $row['birthplace'];
		$data['gender'] = $row['gender'];
		$data['address'] = $row['address'];
		$data['dt_admission'] = '1st Semester, '.substr($row['student_number'], 0, 4).'-'.(substr($row['student_number'], 0, 4) +1);
		echo json_encode($data);
		exit();
	}
	else {
		echo "0";
		exit();
	}
}

if(isset($_POST['update_grades'])) {
	$data = json_decode($_POST['data']);
	$total_num = count($data->stud_num);
	$cr_id = $_POST['cr_id'];

	$del_prev = mysqli_query($conn, "DELETE FROM grade_report WHERE cr_id = $cr_id");

	for ($i=0; $i < $total_num; $i++) {
		$query = mysqli_query($conn, "INSERT INTO grade_report (student_number, cr_id, midterm_grade, final_grade, tfg) VALUES ('".$data->stud_num[$i]."',$cr_id,'".$data->midterm_grades[$i]."','".$data->final_grades[$i]."','".$data->tfg[$i]."');") or die(mysqli_error($conn));
	}

	// $query2 = mysqli_query($conn, "UPDATE class_record SET submitted = 1 WHERE id = $cr_id");
	echo "Grades Updated Successfully.";

	exit();
}

if(isset($_POST['stat_fac_user'])) {
	$id = $_POST['id'];
	$get_stat_query = mysqli_query($conn, "SELECT status FROM faculty_user WHERE id = ".$id);
	$get_stat_res = mysqli_fetch_array($get_stat_query);
	$stat = $get_stat_res[0];

	if($stat == 1) $new = 0;
	else if($stat == 0) $new = 1;

	$change = "UPDATE faculty_user SET status = $new WHERE id = $id";
	if (mysqli_query($conn, $change)) {
		echo $new;
		exit();
	}
}

if(isset($_POST['get_new_pass'])) {
	$code = 'GRC_FACULTY_'.(generateCode(5,false,'ld'));
	echo $code;
	exit();
}

if(isset($_POST['user_change_pass'])) {
	$new_pass = $_POST['new_pass'];
	$pass = password_hash($new_pass, PASSWORD_ARGON2I);
	$id = $_POST['fac_id'];

	$query = "UPDATE faculty_user SET password = '$pass' WHERE id = $id";
	$res = mysqli_query($conn, $query) or die(mysqli_error($conn));
	if($res){
		echo "User's password has been changed successfully";
		exit();
	}
}

if(isset($_POST['get_info_cp'])) {
	$id = $_POST['id'];
	$get_info = mysqli_query($conn, "SELECT id, firstname, lastname, username, email FROM faculty_user WHERE id = $id");
	echo json_encode(mysqli_fetch_array($get_info));
}

if(isset($_POST['get_st_info'])) {
	$id = $_POST['id'];
	$sn = $_POST['sn'];
	$query = "SELECT
		class_record.id,
		grade_report.student_number,
		grade_report.midterm_grade,
		grade_report.final_grade,
		grade_report.tfg,
		grade_report.remarks,
		CONCAT(student_info.lastname,', ',student_info.firstname, ' ', SUBSTR(student_info.middlename,0,1),'.') as full_name
	FROM grade_report
	INNER JOIN class_record ON grade_report.cr_id = class_record.id
	INNER JOIN student_info ON grade_report.student_number = student_info.student_number WHERE grade_report.student_number = '$sn' AND class_record.id = $id";

	$get_info = mysqli_query($conn, $query) or die(mysqli_error($conn));

	echo json_encode(mysqli_fetch_array($get_info));
}

if(isset($_POST['change_grade'])) {
	$id = $_POST['cr_id'];
	$sn = $_POST['sn'];
	$midterm_gr = $_POST['midterm_grade'];
	$final_gr = $_POST['final_grade'];
	$tfg = $_POST['tfg'];
	$remarks = $_POST['remarks'];

	$query = "UPDATE grade_report SET midterm_grade = '".$midterm_gr."', final_grade = '".$final_gr."', tfg = '".$tfg."', remarks = '".$remarks."' WHERE cr_id = $id AND student_number = '".$sn."'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	if($result) {
		echo "Successful. Changes has been made.";
	}
}


if(isset($_POST['update_seen'])) {
    $usertype = $_POST['usertype'];
    $stmt =  $pdo_conn->prepare("UPDATE notification SET seen = 1 WHERE seen = 0 AND message_for = :msg_for;");
    $stmt->bindparam(':msg_for', $usertype, PDO::PARAM_STR, 12);
    $stmt->execute();
}