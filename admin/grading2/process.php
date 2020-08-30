<?php
include('../../config/config.php');
include('gen_code.php');
if(isset($_POST['submission_timeframe'])) {
	$sy = $_POST['sy'];
	$sem = $_POST['sem'];
	$start = $_POST['start'];
	$end = $_POST['end'];

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

if(isset($_POST['update_submission_timeframe'])) {
	$id = $_POST['id'];
	$query = mysqli_query($conn, "UPDATE timeframe SET status = 'Inactive' WHERE id = $id");
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
	$check = mysqli_query($conn, "SELECT * FROM grade_viewing_code WHERE student_number = '$id'");
	$code = generateCode(8,true,'ud');
	$check_data = mysqli_fetch_assoc($check);
	if(mysqli_num_rows($check) > 0) {
		if($check_data['status'] == 1) {
			echo "0";
			exit();
		}
		else {
			$query = "UPDATE grade_viewing_code SET code = '".$code."', status = 1 WHERE student_number = '".$id."'";
		}
	}
	else {
		$query = "INSERT INTO grade_viewing_code (student_number,code,status) VALUES ('".$id."','".$code."',1);";
	}
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	$notif = mysqli_query($conn, "INSERT INTO student_notif (student_number,message) VALUES ('".$id."','Your Code to view your grades in ".$sem." of school year ".$sy." is <span>".$code."</span>.');") or die(mysql_error($conn));
	if($result && $notif) {
		echo $code;
	}
	exit();
}

if(isset($_POST['generate_all'])) {
	$sn = $_POST['student_num'];
	$check = mysqli_query($conn, "SELECT * FROM grade_viewing_code WHERE student_number = '$sn'");
	$get_course = mysqli_query($conn, "SELECT course FROM student_info WHERE student_number = '$sn'");
	$get_course_data = mysqli_fetch_assoc($get_course);
	$check_data = mysqli_fetch_assoc($check);
	$code = generateCode(8,true,'ud');
	if(mysqli_num_rows($check) > 0) {
		if($check_data['status'] == 1) {
			exit();
		}
		else {
			$query = "UPDATE grade_viewing_code SET code = '".$code."', status = 1 WHERE student_number = '".$sn."'";
		}
	}
	else {
		$query = "INSERT INTO grade_viewing_code (student_number,code,status) VALUES ('".$sn."','".$code."',1);";
	}
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	if($result) {
		echo $get_course_data['course'];
	}
	exit();
}