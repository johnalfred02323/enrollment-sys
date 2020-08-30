<?php 
include('../../../config/config.php');

//For Excel 
if(isset($_POST['studentlistexcel'])){
$num = 0;
$studnum = $_POST['studnum'];
$schoolyear = $_POST['schoolyear'];
$sem = $_POST['sem'];
$query1 =  mysqli_query($conn, "SELECT student_info.lastname, student_info.firstname, student_info.middlename, course.course_abbreviation AS course, course.course_major AS major, student_enrollment_record.status FROM student_info 
	INNER JOIN student_enrollment_record ON student_enrollment_record.student_number = student_info.student_number
	INNER JOIN course ON course.course_id = student_info.course_id
	WHERE student_enrollment_record.student_number = '$studnum'") or die(mysqli_error($conn));
	$rows1=mysqli_fetch_assoc($query1);

$query =  mysqli_query($conn, "SELECT subject.subject_code, subject.subject_title, subject.units, schedule.section FROM schedule 
	INNER JOIN student_enrollment_record ON student_enrollment_record.sched_id = schedule.sched_id
	INNER JOIN subject ON schedule.subj_id = subject.subj_id
	WHERE student_enrollment_record.student_number = '$studnum' AND schedule.school_year='$schoolyear' AND schedule.semester = '$sem'") or die(mysqli_error($conn));

	$output = '<table style="width:80%" border="1"><tr class="table-bordered"><th colspan="3">Name : '.$rows1['lastname'].', '.$rows1['firstname'].' '.$rows1['middlename'].'</th><th colspan="2">Course : '.$rows1['course'].'</th></tr><tr class="table-bordered"><th colspan="3">Status : '.$rows1['status'].'</th><th colspan="2">Major : '.$rows1['major'].'</th></tr><tr class="table-bordered"><th scope="col">No.</th><th scope="col">Subject Code</th><th scope="col">Subject Title</th><th scope="col">Units</th><th scope="col">Section</th></tr>';

	if(mysqli_num_rows($query) > 0)
		{

			while($rows=mysqli_fetch_array($query))
			{
				$num++;
				$output .= '<tr><th scope="row">'.$num.'</th><td>'.$rows['subject_code'].'</td><td>'.$rows['subject_title'].'</td><td>'.$rows['units'].'</td><td>'.$rows['section'].'</td></tr>';
			}
		}
	else
		{
			$output .= '<tr><td>0</td><td colspan="5"><center>No Subject Enrolled</center></td></tr>';
		}
	          		$query1 =  mysqli_query($conn, "SELECT SUM(units) AS Units FROM student_info INNER JOIN student_enrollment_record ON student_enrollment_record.student_number = student_info.student_number INNER JOIN schedule ON schedule.sched_id = student_enrollment_record.sched_id INNER JOIN subject ON subject.subj_id = schedule.subj_id WHERE student_info.student_number='$studnum' AND schedule.school_year='$schoolyear' AND schedule.semester = '$sem'") or die(mysqli_error($conn));
	          		$rows1=mysqli_fetch_array($query1);
				$output .= '<tr><th colspan="5">Total Units: '.$rows1['Units'].'</th></tr></table>';
				echo $output;
exit();
}

//For excel file name
if(isset($_POST['excelfilename'])){
$studnum = $_POST['studnum'];
$schoolyear = $_POST['schoolyear'];
$sem = $_POST['sem'];
$query =  mysqli_query($conn, "SELECT * FROM student_info WHERE student_number = '$studnum'") or die(mysqli_error($conn));
$rows=mysqli_fetch_array($query);

	$output = $rows['lastname'].'_'.$rows['firstname'].'_'.$rows['middlename'].'_'.$sem.'_'.$schoolyear.'';
	echo $output;
exit();
}

//For Viewing 
if(isset($_POST['studentsubject-view'])){
$num = 0;
$studnum = $_POST['studnum'];
$schoolyear = $_POST['schoolyear'];
$sem = $_POST['sem'];
$query1 =  mysqli_query($conn, "SELECT student_info.lastname, student_info.firstname, student_info.middlename, course.course_abbreviation AS course, course.course_major AS major, student_enrollment_record.status FROM student_info 
	INNER JOIN student_enrollment_record ON student_enrollment_record.student_number = student_info.student_number
	INNER JOIN course ON course.course_id = student_info.course_id
	WHERE student_enrollment_record.student_number = '$studnum'") or die(mysqli_error($conn));
	$rows1=mysqli_fetch_assoc($query1);

$query =  mysqli_query($conn, "SELECT subject.subject_code, subject.subject_title, subject.units, schedule.section FROM schedule 
	INNER JOIN student_enrollment_record ON student_enrollment_record.sched_id = schedule.sched_id
	INNER JOIN subject ON schedule.subj_id = subject.subj_id
	WHERE student_enrollment_record.student_number = '$studnum' AND schedule.school_year='$schoolyear' AND schedule.semester = '$sem'") or die(mysqli_error($conn));

	$output = '<table class="table table-striped">
          <thead>
              <tr class="table-borderless">
                <th scope="col" colspan="6" class="text-center">GLOBAL RECIPROCAL COLLEGES</th>
              </tr>
              <tr class="table-bordered">
                <th colspan="3">Name : '.$rows1['lastname'].', '.$rows1['firstname'].' '.$rows1['middlename'].'</th>
                <th colspan="3">Course : '.$rows1['course'].'</th>
              </tr>
              <tr class="table-bordered">
                <th colspan="3">Status : '.$rows1['status'].'</th>
                <th colspan="3">Major : '.$rows1['major'].'</th>
              </tr>
              <tr class="table-bordered">
                <th scope="col">No.</th>
                <th scope="col">Subject Code</th>
                <th scope="col">Subject Title</th>
                <th scope="col">Units</th>
                <th scope="col">Section</th>
              </tr>
            </thead>
			<tbody>';

	if(mysqli_num_rows($query) > 0)
		{
			while($rows=mysqli_fetch_array($query))
			{
				$num++;
				$output .='
	              <tr>
	                <th scope="row">'.$num.'</th>
	                <td>'.$rows['subject_code'].'</td>
	                <td>'.$rows['subject_title'].'</td>
	                <td>'.$rows['units'].'</td>
	                <td>'.$rows['section'].'</td>
	              </tr>';
			}
		}
	else
		{
				$output .='	
	              <tr>
	                <th scope="row">0</th>
	                <th colspan="5"><center>No Subject Enrolled</center></th>
	              </tr>';
		}
	          		$query1 =  mysqli_query($conn, "SELECT SUM(units) AS Units FROM student_info INNER JOIN student_enrollment_record ON student_enrollment_record.student_number = student_info.student_number INNER JOIN schedule ON schedule.sched_id = student_enrollment_record.sched_id INNER JOIN subject ON subject.subj_id = schedule.subj_id WHERE student_info.student_number='$studnum' AND schedule.school_year='$schoolyear' AND schedule.semester = '$sem'	") or die(mysqli_error($conn));
	          		$rows1=mysqli_fetch_array($query1);
				$output .= '<tr><th colspan="5">Total Units: '.$rows1['Units'].'</th></tr></tbody></table>';
				echo $output;
exit();
}

//for school year
if(isset($_POST['schoolyear'])) {
$query = mysqli_query($conn, "SELECT DISTINCT school_year FROM schedule ORDER BY school_year DESC") or die(mysqli_error($conn));
	if(mysqli_num_rows($query) > 0)
	{

		while($rows=mysqli_fetch_array($query))
		{
			$output = '<option id='.$rows['school_year'].' value='.$rows['school_year'].'>'.$rows['school_year'].'</option>';
			echo $output;
		}	
	}
	else
	{

	}
	exit();
}
?>