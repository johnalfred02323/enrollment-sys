<?php 
include('../../../config/config.php');


//For Excel 
if(isset($_POST['studentlistexcel'])){
$num = 0;
$major = $_POST['major'];
$schoolyear = $_POST['schoolyear'];
$sem = $_POST['sem'];
$query1 =  mysqli_query($conn, "SELECT curriculum.curriculum_title, course.course_abbreviation AS course, course.course_major AS major FROM curriculum INNER JOIN course ON course.course_id = curriculum.course_id 
	WHERE course.course_id = '$major'") or die(mysqli_error($conn));
$rows1=mysqli_fetch_array($query1);

$query =  mysqli_query($conn, "SELECT DISTINCT student_info.student_number, student_info.lastname, student_info.firstname, student_info.middlename, course.course_abbreviation AS course, course.course_major AS major, schedule.school_year, schedule.semester FROM student_info 
	INNER JOIN student_enrollment_record ON student_enrollment_record.student_number = student_info.student_number
	INNER JOIN course ON course.course_id = student_info.course_id
	INNER JOIN schedule ON schedule.sched_id = student_enrollment_record.sched_id
	WHERE course.course_id = '$major' AND schedule.school_year='$schoolyear' AND schedule.semester = '$sem'") or die(mysqli_error($conn));

	$output = '<table style="width:80%" border="1"><tr><th colspan="3">Course: '.$rows1['course'].'</th><th colspan="2">School Year: '.$schoolyear.'</th></tr><tr><th colspan="3">Major: '.$major.'</th><th colspan="2">Semester: '.$sem.'</th></tr><tr><th>No.</th><th>Lastname</th><th>Firstname</th><th>Middlename</th><th>Units</th></tr>';

	if(mysqli_num_rows($query) > 0)
		{

			while($rows=mysqli_fetch_array($query))
			{
				$studnum = '';
				if($studnum == $rows['student_number'])
				{
	          	}
	          	else
	          	{
					$studnum = $rows['student_number'];
	          		$query1 =  mysqli_query($conn, "SELECT SUM(units) AS Units FROM student_info INNER JOIN student_enrollment_record ON student_enrollment_record.student_number = student_info.student_number INNER JOIN schedule ON schedule.sched_id = student_enrollment_record.sched_id INNER JOIN subject ON subject.subj_id = student_enrollment_record.subj_id WHERE student_info.student_number='$studnum' AND schedule.school_year='$schoolyear' AND schedule.semester = '$sem'	") or die(mysqli_error($conn));
	          		$rows1=mysqli_fetch_array($query1);
					$num++;
					$output .= '<tr><td>'.$num.'</td><td>'.$rows['lastname'].'</td><td>'.$rows['firstname'].'</td><td>'.$rows['middlename'].'</td><td>'.$rows1['Units'].'</td></tr>';
				}
			}
		}
	else
		{
			$output .= '<tr><td>0</td><td colspan="3"><center>No Student Enrolled</center></td></tr>';
		}
				$output .= '</table>';
				echo $output;
exit();
}

//For excel file name
if(isset($_POST['excelfilename'])){
$major = $_POST['major'];
$schoolyear = $_POST['schoolyear'];
$sem = $_POST['sem'];
$query =  mysqli_query($conn, "SELECT * FROM curriculum 
	WHERE major = '$major'") or die(mysqli_error($conn));
$rows=mysqli_fetch_array($query);

	$output = 'MasterList_'.$rows['course'].'_'.$rows['major'].'_'.$sem.'_'.$schoolyear.'';
	echo $output;
exit();
}

//For Viewing 
if(isset($_POST['studentlist-view'])){
$num = 0;
$major = $_POST['major'];
$schoolyear = $_POST['schoolyear'];
$sem = $_POST['sem'];
$query1 =  mysqli_query($conn, "SELECT curriculum.curriculum_title, course.course_abbreviation AS course, course.course_major AS major FROM curriculum INNER JOIN course ON course.course_id = curriculum.course_id 
	WHERE course.course_id = '$major'") or die(mysqli_error($conn));
$rows1=mysqli_fetch_array($query1);

$query =  mysqli_query($conn, "SELECT DISTINCT student_info.student_number, student_info.lastname, student_info.firstname, student_info.middlename, course.course_abbreviation AS course, course.course_major AS major, schedule.school_year, schedule.semester FROM student_info 
	INNER JOIN student_enrollment_record ON student_enrollment_record.student_number = student_info.student_number
	INNER JOIN course ON course.course_id = student_info.course_id
	INNER JOIN schedule ON schedule.sched_id = student_enrollment_record.sched_id
	WHERE course.course_id = '$major' AND schedule.school_year='$schoolyear' AND schedule.semester = '$sem'") or die(mysqli_error($conn));

	$output = '<table class="table table-striped">
          <thead>
              <tr class="table-borderless">
                <th scope="col" colspan="4" class="text-center">GLOBAL RECIPROCAL COLLEGES</th>
              </tr>
              <tr class="table-bordered">
                <th colspan="3">Course : '.$rows1['course'].'</th>
                <th colspan="2">School Year : '.$schoolyear.'</th>
              </tr>
              <tr class="table-bordered">
                <th colspan="3">Major : '.$rows1['major'].'</th>
                <th colspan="2">Semester : '.$sem.'</th>
              </tr>
              <tr class="table-bordered">
                <th scope="col">No.</th>
                <th scope="col">Lastname</th>
                <th scope="col">Firstname</th>
                <th scope="col">Middlename</th>
                <th scope="col">Units</th>
              </tr>
            </thead>
			<tbody>';

	if(mysqli_num_rows($query) > 0)
		{
			while($rows=mysqli_fetch_array($query))
			{
				$studnum = '';
				if($studnum == $rows['student_number'])
				{
	          	}
	          	else
	          	{
					$studnum = $rows['student_number'];
	          		$query1 =  mysqli_query($conn, "SELECT SUM(units) AS Units FROM student_info INNER JOIN student_enrollment_record ON student_enrollment_record.student_number = student_info.student_number INNER JOIN schedule ON schedule.sched_id = student_enrollment_record.sched_id INNER JOIN subject ON subject.subj_id = student_enrollment_record.subj_id WHERE student_info.student_number='$studnum' AND schedule.school_year='$schoolyear' AND schedule.semester = '$sem'	") or die(mysqli_error($conn));
	          		$rows1=mysqli_fetch_array($query1);
					$num++;
					$output .='
		              <tr>
		                <th scope="row">'.$num.'</th>
		                <td>'.$rows['lastname'].'</td>
		                <td>'.$rows['firstname'].'</td>
		                <td>'.$rows['middlename'].'</td>
		                <td>'.$rows1['Units'].'</td>
		              </tr>';
		        }
			}
		}
	else
		{
				$output .='	
	              <tr>
	                <th scope="row">0</th>
	                <th colspan="4"><center>No Student Enrolled</center></th>
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