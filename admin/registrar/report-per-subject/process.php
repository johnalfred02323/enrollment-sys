<?php 
include('../../../config/config.php');

//For Excel 
if(isset($_POST['studentlistexcel'])){
$num = 0;
$schedid = $_POST['schedid'];
$query1 =  mysqli_query($conn, "SELECT subject.subject_code, subject.subject_title, CONCAT(user.lastname,', ',user.firstname,' ', LEFT(user.middlename, 1),'. ') AS fullname, schedule.section FROM schedule 
	INNER JOIN subject ON schedule.subj_id = subject.subj_id
    INNER JOIN user ON user.id = schedule.faculty_id
	WHERE schedule.sched_id = '$schedid'") or die(mysqli_error($conn));
$rows1=mysqli_fetch_array($query1);

$query =  mysqli_query($conn, "SELECT student_info.lastname, student_info.firstname, student_info.middlename, course.course_abbreviation AS course, course.course_major AS major FROM student_info 
	INNER JOIN student_enrollment_record ON student_enrollment_record.student_number = student_info.student_number
	INNER JOIN course ON course.course_id = student_info.course_id
	WHERE student_enrollment_record.sched_id = '$schedid' AND student_enrollment_record.status='Enrolled'") or die(mysqli_error($conn));

	$output = '<table style="width:80%" border="1"><tr><th colspan="3">Section: '.$rows1['section'].'</th><th colspan="3">Professor: '.$rows1['fullname'].'</th></tr><tr><th colspan="3">Subject Code: '.$rows1['subject_code'].'</th><th colspan="3">Subject Title: '.$rows1['subject_title'].'</th></tr><tr><th>No.</th><th>Lastname</th><th>Firstname</th><th>Middlename</th><th>Course</th><th>Major</th></tr>';

	if(mysqli_num_rows($query) > 0)
		{

			while($rows=mysqli_fetch_array($query))
			{
				$num++;
				$output .= '<tr><td>'.$num.'</td><td>'.$rows['lastname'].'</td><td>'.$rows['firstname'].'</td><td>'.$rows['middlename'].'</td><td>'.$rows['course'].'</td><td>'.$rows['major'].'</td></tr>';
			}
		}
	else
		{
			$output .= '<tr><td>0</td><td colspan="5"><center>No Student Enrolled</center></td></tr>';
		}
				$output .= '</table>';
				echo $output;
exit();
}

//For excel file name
if(isset($_POST['excelfilename'])){
$schedid = $_POST['schedid'];
$query =  mysqli_query($conn, "SELECT subject.subject_code, subject.subject_title, schedule.section, schedule.school_year, schedule.semester FROM schedule 
	INNER JOIN subject ON schedule.subj_id = subject.subj_id
	WHERE schedule.sched_id = '$schedid'") or die(mysqli_error($conn));
$rows=mysqli_fetch_array($query);

	$output = 'MasterList_'.$rows['section'].'_'.$rows['subject_code'].'_'.$rows['semester'].'_'.$rows['school_year'].'';
	echo $output;
exit();
}

//For Viewing 
if(isset($_POST['studentlist-view'])){
$num = 0;
$schedid = $_POST['schedid'];
$query1 =  mysqli_query($conn, "SELECT subject.subject_code, subject.subject_title, CONCAT(user.lastname,', ',user.firstname,' ', LEFT(user.middlename, 1),'. ') AS fullname, schedule.section FROM schedule 
	INNER JOIN subject ON schedule.subj_id = subject.subj_id
    INNER JOIN user ON user.id = schedule.faculty_id
	WHERE schedule.sched_id = '$schedid'") or die(mysqli_error($conn));
$rows1=mysqli_fetch_array($query1);

$query =  mysqli_query($conn, "SELECT student_info.lastname, student_info.firstname, student_info.middlename, course.course_abbreviation AS course, course.course_major AS major FROM student_info 
	INNER JOIN student_enrollment_record ON student_enrollment_record.student_number = student_info.student_number
	INNER JOIN course ON course.course_id = student_info.course_id
	WHERE student_enrollment_record.sched_id = '$schedid' AND student_enrollment_record.status='Enrolled'") or die(mysqli_error($conn));

	$output = '<table class="table table-striped">
          <thead>
              <tr class="table-borderless">
                <th scope="col" colspan="6" class="text-center">GLOBAL RECIPROCAL COLLEGES</th>
              </tr>
              <tr class="table-bordered">
                <th colspan="3">Section : '.$rows1['section'].'</th>
                <th colspan="3">Professor : '.$rows1['fullname'].'</th>
              </tr>
              <tr class="table-bordered">
                <th colspan="3">Subject Code : '.$rows1['subject_code'].'</th>
                <th colspan="3">Subject Title : '.$rows1['subject_title'].'</th>
              </tr>
              <tr class="table-bordered">
                <th scope="col">No.</th>
                <th scope="col">Lastname</th>
                <th scope="col">Firstname</th>
                <th scope="col">middlename</th>
                <th scope="col">Course</th>
                <th scope="col">Major</th>
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
	                <td>'.$rows['lastname'].'</td>
	                <td>'.$rows['firstname'].'</td>
	                <td>'.$rows['middlename'].'</td>
	                <td>'.$rows['course'].'</td>
	                <td>'.$rows['major'].'</td>
	              </tr>';
			}
		}
	else
		{
				$output .='	
	              <tr>
	                <th scope="row">0</th>
	                <th colspan="5"><center>No Student Enrolled</center></th>
	              </tr>';
		}
				$output .= '
	            </tbody>
          		</table>';
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