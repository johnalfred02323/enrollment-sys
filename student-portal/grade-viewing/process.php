<?php
include('../../config/config.php');

if(isset($_POST['login'])) {
	$sn = $_POST['sn'];
	$pass = $_POST['pass'];

	$check_flag = mysqli_query($conn, "SELECT status FROM webpages_flag WHERE webpage = 'student'");
	$check_flag_data = mysqli_fetch_assoc($check_flag);
	if($check_flag_data['status'] == 1) {
		$stmt = $pdo_conn->prepare("SELECT student_number,password FROM student_user WHERE student_number = ?");
		$stmt->bindParam(1, $sn);
		$stmt->execute();
		$data = $stmt->fetch();
		$student_number = $data['student_number'];
		$password = $data['password'];
		$verify = password_verify($pass, $password);
		if($verify) {
			$get = mysqli_query($conn, "SELECT * FROM student_info WHERE student_number = '$student_number'");
			$get_data = mysqli_fetch_assoc($get);
			$_COOKIE['sn'] = $student_number;
			$_COOKIE['userrole'] = "student";
			$_COOKIE['name'] = $get_data['lastname'].', '.$get_data['firstname'].' '.substr($get_data['middlename'],0,1).'.';
			echo 'dashboard';
			exit();
		}
		else {
			echo "0";
			exit();
		}
	}
	else {
		echo "1";
		exit();
	}
}

if(isset($_POST['get_code'])) {
	$sn = $_POST['sn'];
	$code = $_POST['code'];

	$check = mysqli_query($conn, "SELECT expiration_date FROM grade_viewing_code WHERE student_number = '".$sn."'");
	$check_data = mysqli_fetch_assoc($check);

	$today = date('Y-m-d');

	if($today > $check_data['expiration_date']) {
		$change_stat = mysqli_query($conn, "UPDATE grade_viewing_code SET status = 0;");
	}

	$get_code = mysqli_query($conn, "SELECT code,status FROM grade_viewing_code WHERE student_number = '".$sn."'");
	$get_code_data = mysqli_fetch_assoc($get_code);

	if($get_code_data['code'] == $code){
		if($get_code_data['status'] == 1){
			$get_grades = mysqli_query($conn, "SELECT grade_report.midterm_grade, grade_report.final_grade, subject.subject_code, subject.subject_title, subject.units, schedule.section, CONCAT(faculty_user.lastname,', ',faculty_user.firstname, ' ', SUBSTR(faculty_user.middlename,1,1),'.') as fac_name FROM grade_report 
                                INNER JOIN class_record ON grade_report.cr_id = class_record.id
                                INNER JOIN schedule ON class_record.sched_id = schedule.sched_id
                                INNER JOIN subject ON schedule.subj_id = subject.subj_id
                                INNER JOIN faculty_user ON schedule.faculty_id = faculty_user.id
                                WHERE student_number = '".$sn."'") or die(mysqli_error($conn));
            $output = '';

			while($row = mysqli_fetch_assoc($get_grades)) {
                $fgrade = $row['final_grade'];
                if($fgrade == '') { $fg_eq = ''; }
                else if($fgrade > 98) { $fg_eq = '1.00';  }
                else if($fgrade > 95 && $fgrade < 98) { $fg_eq = '1.25'; }
                else if($fgrade > 92 && $fgrade < 96) { $fg_eq = '1.50'; }
                else if($fgrade > 89 && $fgrade < 93) { $fg_eq = '1.75'; }
                else if($fgrade > 86 && $fgrade < 90) { $fg_eq = '2.00'; }
                else if($fgrade > 83 && $fgrade < 87) { $fg_eq = '2.25'; }
                else if($fgrade > 80 && $fgrade < 84) { $fg_eq = '2.50'; }
                else if($fgrade > 77 && $fgrade < 81) { $fg_eq = '2.75'; }
                else if($fgrade > 74 && $fgrade < 78) { $fg_eq = '3.00'; }
                else if($fgrade < 75) { $fg_eq = '5.00'; }
                else { $fg_eq = $fgrade; } 

                $output .= '<div class="row cp-view mx-auto">
	                            <div class="col-sm-1">
	                                <span class="h6 cp-header">Subject Code:&nbsp;</span><span class="tbl-rows">'.$row['subject_code'].'</span>
	                            </div>
	                            <div class="col-sm-5">
	                                <span class="h6 cp-header">Subject Description:&nbsp;</span><span class="tbl-rows">'.$row['subject_title'].'</span>
	                            </div>
	                            <div class="col-sm-1">
	                                <span class="h6 cp-header">Units:&nbsp;</span><span class="tbl-rows">'.$row['units'].'</span>
	                            </div>
	                            <div class="col-sm-1">
	                                <span class="h6 cp-header">Final Grade:&nbsp;</span><span class="tbl-rows">'.$fg_eq.'</span>
	                            </div>
	                            <div class="col-sm-1">
	                                <span class="h6 cp-header">Section:&nbsp;</span><span class="tbl-rows">'.$row['section'].'</span>
	                            </div>
	                            <div class="col-sm-3">
	                                <span class="h6 cp-header">Professor:&nbsp;</span><span class="tbl-rows">'.$row['fac_name'].'</span>
	                            </div>
	                        </div>  ';
            }
            echo $output;
			exit();
		}
		else {
			echo "3";
			exit();
		}
	}
	else {
		echo "2";
		exit();
	}
}



