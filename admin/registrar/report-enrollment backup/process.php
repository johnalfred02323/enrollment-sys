<?php
include('../../../config/config.php');

//for table list
if(isset($_POST['year-list'])) {
$num = 0;
$query = mysqli_query($conn, "SELECT DISTINCT school_year,semester FROM schedule ORDER BY school_year DESC") or die(mysqli_error($conn));
	if(mysqli_num_rows($query) > 0)
	{
		while($rows=mysqli_fetch_array($query))
		{
			$num++;
			$output = '<tr><td id="sy'.$num.'">'.$rows['school_year'].'</td><td id="sem'.$num.'">'.$rows['semester'].'</td><td><button id="'.$num.'" class="view-user pull-xs-right view" data-toggle="modal" data-target="#viewmodal" ripple><i class="far fa-eye"></i>  View</button> 
    <button id="'.$num.'" class="delete-user pull-xs-right print" ripple><i class="fas fa-print"></i> PRINT</button> 
    <button id="'.$num.'" class="edit-user pull-xs-right excel" ripple><i class="far fa-file-excel"></i> Excel</button></td></tr>';
			echo $output;
		}	
	}
	else
	{
		echo '<tr><td colspan="3"><center>No data available in table</center></td></tr>';
	}
	exit();
}


//for search table list
if(isset($_POST['search-year-list'])) {
$num = 0;
$sy = $_POST['sy'];

	if($sy != '')
	{
		$query = mysqli_query($conn, "SELECT DISTINCT school_year,semester FROM schedule WHERE school_year LIKE '%$sy%' ORDER BY school_year DESC") or die(mysqli_error($conn));
	}
	else
	{
		$query = mysqli_query($conn, "SELECT DISTINCT school_year,semester FROM schedule ORDER BY school_year DESC") or die(mysqli_error($conn));
	}

	if(mysqli_num_rows($query) > 0)
	{
		while($rows=mysqli_fetch_array($query))
		{
			$num++;
			$output = '<tr><td id="sy'.$num.'">'.$rows['school_year'].'</td><td id="sem'.$num.'">'.$rows['semester'].'</td><td><button id="'.$num.'" class="view-user pull-xs-right view" data-toggle="modal" data-target="#viewmodal" ripple> View</button> 
    <button id="'.$num.'" class="delete-user pull-xs-right print" ripple> PRINT</button> 
    <button id="'.$num.'" class="edit-user pull-xs-right excel" ripple> Excel</button></td></tr>';
			echo $output;
		}	
	}
	else
	{
		echo '<tr><td colspan="3"><center>No data available in table</center></td></tr>';
	}
	exit();
}


//For Viewing 
if(isset($_POST['studentlist-view'])){
$num = 0;
$sy = $_POST['sy'];
$sem = $_POST['sem'];

$query =  mysqli_query($conn, "SELECT DISTINCT student_info.student_number, student_info.lastname, student_info.firstname, student_info.middlename, course.course_abbreviation AS course, course.course_major AS major FROM student_info 
	INNER JOIN student_enrollment_record ON student_enrollment_record.student_number = student_info.student_number
	INNER JOIN course ON course.course_id = student_info.course_id
	INNER JOIN schedule ON schedule.sched_id = student_enrollment_record.sched_id
	INNER JOIN subject ON subject.subj_id = student_enrollment_record.subj_id
	WHERE schedule.school_year='$sy' AND schedule.semester = '$sem'") or die(mysqli_error($conn));

	$output = '<table class="table table-striped">
          <thead>
              <tr class="table-borderless">
                <th scope="col" colspan="8" class="text-center">GLOBAL RECIPROCAL COLLEGES</th>
              </tr>
              <tr class="table-bordered">
                <th colspan="4">School Year : '.$sy.'</th>
                <th colspan="4">Semester : '.$sem.'</th>
              </tr>
              <tr class="table-bordered">
                <th scope="col">No.</th>
                <th scope="col" style="white-space: nowrap;">Student No.</th>
                <th scope="col" style="white-space: nowrap;">Lastname</th>
                <th scope="col" style="white-space: nowrap;">Firstname</th>
                <th scope="col" style="white-space: nowrap;">Middlename</th>
                <th scope="col" style="white-space: nowrap;">Course</th>
                <th scope="col" style="white-space: nowrap;">Major</th>
                <th scope="col" style="white-space: nowrap;">Units</th>
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
	          		$query1 =  mysqli_query($conn, "SELECT SUM(units) AS Units FROM student_info INNER JOIN student_enrollment_record ON student_enrollment_record.student_number = student_info.student_number INNER JOIN schedule ON schedule.sched_id = student_enrollment_record.sched_id INNER JOIN subject ON subject.subj_id = student_enrollment_record.subj_id WHERE student_info.student_number='$studnum' AND schedule.school_year='$sy' AND schedule.semester = '$sem'	") or die(mysqli_error($conn));
	          		$rows1=mysqli_fetch_array($query1);
					$num++;
					$output .='
		              <tr>
		                <th scope="row">'.$num.'</th>
		                <td style="white-space: nowrap;">'.$rows['student_number'].'</td>
		                <td style="white-space: nowrap;">'.$rows['lastname'].'</td>
		                <td style="white-space: nowrap;">'.$rows['firstname'].'</td>
		                <td style="white-space: nowrap;">'.$rows['middlename'].'</td>
		                <td style="white-space: nowrap;">'.$rows['course'].'</td>
		                <td style="white-space: nowrap;">'.$rows['major'].'</td>
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
	                <th colspan="7"><center>No Student Enrolled</center></th>
	              </tr>';
		}
				$output .= '
	            </tbody>
          		</table>';
				echo $output;
exit();
}

//For Excel 
if(isset($_POST['studentlistexcel'])){
$num = 0;
$sy = $_POST['sy'];
$sem = $_POST['sem'];

$query =  mysqli_query($conn, "SELECT DISTINCT student_info.student_number, student_info.lastname, student_info.firstname, student_info.middlename, course.course_abbreviation AS course, course.course_major AS major FROM student_info 
	INNER JOIN student_enrollment_record ON student_enrollment_record.student_number = student_info.student_number
	INNER JOIN course ON course.course_id = student_info.course_id
	INNER JOIN schedule ON schedule.sched_id = student_enrollment_record.sched_id
	INNER JOIN subject ON subject.subj_id = student_enrollment_record.subj_id
	WHERE schedule.school_year='$sy' AND schedule.semester = '$sem'") or die(mysqli_error($conn));

	$output = '<table style="width:80%" border="1"><tr><th colspan="4">School Year: '.$sy.'</th><th colspan="4">Semester: '.$sem.'</th></tr><tr><th>No.</th><th>Student No.</th><th>Lastname</th><th>Firstname</th><th>Middlename</th><th>Course</th><th>Major</th><th>Units</th></tr>';

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
	          		$query1 =  mysqli_query($conn, "SELECT SUM(units) AS Units FROM student_info INNER JOIN student_enrollment_record ON student_enrollment_record.student_number = student_info.student_number INNER JOIN schedule ON schedule.sched_id = student_enrollment_record.sched_id INNER JOIN subject ON subject.subj_id = student_enrollment_record.subj_id WHERE student_info.student_number='$studnum' AND schedule.school_year='$sy' AND schedule.semester = '$sem'	") or die(mysqli_error($conn));
	          		$rows1=mysqli_fetch_array($query1);
					$num++;
					$output .='<tr><th scope="row">'.$num.'</th><td style="white-space: nowrap;">'.$rows['student_number'].'</td><td style="white-space: nowrap;">'.$rows['lastname'].'</td><td style="white-space: nowrap;">'.$rows['firstname'].'</td><td style="white-space: nowrap;">'.$rows['middlename'].'</td><td style="white-space: nowrap;">'.$rows['course'].'</td><td style="white-space: nowrap;">'.$rows['major'].'</td><td>'.$rows1['Units'].'</td></tr>';
	          	}
			}
		}
	else
		{
			$output .= '<tr><td>0</td><td colspan="7"><center>No Student Enrolled</center></td></tr>';
		}
				$output .= '</table>';
				echo $output;
exit();
}

//For excel file name
if(isset($_POST['excelfilename'])){
$sy = $_POST['sy'];
$sem = $_POST['sem'];

	$output = 'EnrollmentList_'.$sem.'_'.$sy.'';
	echo $output;
exit();
}

?>