<?php 
include('../../../config/config.php');
//for school year
if(isset($_POST['tabledata'])) {
$sy = $_POST['sy'];
$count = 0;
$query = mysqli_query($conn, "SELECT DISTINCT school_year, semester FROM shifting_student WHERE school_year = '$sy' ORDER BY school_year DESC") or die(mysqli_error($conn));
  if(mysqli_num_rows($query) > 0)
  {

    while($rows=mysqli_fetch_array($query))
    {
      $count++;
      $output = ' <tr>
              <td id="sy'.$count.'">'.$rows['school_year'].'</td>
              <td id="sem'.$count.'">'.$rows['semester'].'</td>
              <td><button id="'.$count.'" class="delete-user pull-xs-right print" ripple><i class="fas fa-print"></i> PRINT</button> <button id="'.$count.'" class="edit-user pull-xs-right excel" ripple><i class="far fa-file-excel"></i> EXCEL</button></td>
            </tr>';
      echo $output;
    } 
  }
  else
  {
    echo '<tr><th colspan="3"><center>No data available in table</center></th></tr>';
  }
  exit();
}
//for checking of student status
if(isset($_POST['studstatus'])) {
$studnum = $_POST['studnum'];
$sy = $_POST['sy'];
$sem = $_POST['sem'];
$count = 0;
$query = mysqli_query($conn, "SELECT * FROM shifting_student WHERE school_year = '$sy' AND semester = '$sem' AND student_number ='$studnum'") or die(mysqli_error($conn));
  if(mysqli_num_rows($query) > 0)
  {
  	$rows=mysqli_fetch_assoc($query);
  	echo $rows['status'];
  }
  else
  {
  	echo '';
  }

  exit();
}

//for displaying of student details
if(isset($_POST['studdata'])) {
$studnum = $_POST['studnum'];
$sy = $_POST['sy'];
$sem = $_POST['sem'];
$count = 0;
$query = mysqli_query($conn, "SELECT CONCAT(student_info.lastname,', ',student_info.firstname,' ', LEFT(student_info.middlename, 1),'. ', student_info.suffix) AS fullname, 
	CONCAT(a.course_abbreviation,' - ',a.course_major) course_from, 
	CONCAT(b.course_abbreviation,' - ',b.course_major) course_to, 
	shifting_student.reason FROM shifting_student 
	INNER JOIN student_info ON student_info.student_number = shifting_student.student_number
    LEFT JOIN course a ON shifting_student.course_from = a.course_id
    LEFT JOIN course b ON shifting_student.course_to = b.course_id 
    WHERE shifting_student.school_year = '$sy' AND shifting_student.semester = '$sem' AND shifting_student.student_number ='$studnum'") or die(mysqli_error($conn));
  if(mysqli_num_rows($query) > 0)
  {
  	$rows=mysqli_fetch_assoc($query);
  	$fullname = $rows['fullname'];
  	$coursefrom = $rows['course_from'];
  	$courseto = $rows['course_to'];
  	$reason = $rows['reason'];
  	echo json_encode(array('fullname' => $fullname ,'coursefrom' => $coursefrom ,'courseto' => $courseto, 'reason' => $reason));
  }
  else
  {
  	$fullname = '';
  	$coursefrom = '';
  	$courseto = '';
  	$reason = '';
  	echo json_encode(array('fullname' => $fullname ,'coursefrom' => $coursefrom ,'courseto' => $courseto, 'reason' => $reason));
  }

  exit();
}


//for displaying the student's subject/s
if(isset($_POST['studsubject'])) {
$studnum = $_POST['studnum'];
$sy = $_POST['sy'];
$sem = $_POST['sem'];
$num = 0;
//for student basic information
$query1 = mysqli_query($conn, "SELECT shifting_student.student_number, CONCAT(student_info.lastname,', ',student_info.firstname,' ', LEFT(student_info.middlename, 1),'. ', student_info.suffix) AS fullname, 
	CONCAT(a.course_abbreviation,' - ',a.course_major) course_from, 
	CONCAT(b.course_abbreviation,' - ',b.course_major) course_to, 
	shifting_student.shift_id,
	shifting_student.reason FROM shifting_student 
	INNER JOIN student_info ON student_info.student_number = shifting_student.student_number
    INNER JOIN course a ON shifting_student.course_from = a.course_id
    INNER JOIN course b ON shifting_student.course_to = b.course_id 
    WHERE shifting_student.school_year = '$sy' AND shifting_student.semester = '$sem' AND shifting_student.student_number ='$studnum'") or die(mysqli_error($conn));
	$rows1=mysqli_fetch_assoc($query1);
//for students subject that have been credited
$query2 = mysqli_query($conn, "SELECT subject.subject_code, subject.subject_title, subject.units,
	shifting_student.shift_id FROM shifting_student 
    INNER JOIN credited_subject ON credited_subject.shift_id = shifting_student.shift_id 
    INNER JOIN subject ON subject.subj_id = credited_subject.subj_id 
    WHERE shifting_student.school_year = '$sy' AND shifting_student.semester = '$sem' AND shifting_student.student_number ='$studnum'") or die(mysqli_error($conn));

  $output = '<table class="table table-striped">
          <thead>
              <tr class="table-borderless">
                <th scope="col" colspan="6" class="text-center">GLOBAL RECIPROCAL COLLEGES</th>
              </tr>
              <tr class="table-bordered">
                <th colspan="2">Name : '.$rows1['fullname'].'</th>
                <th colspan="2">Student Number : <b id="viewstudnum">'.$rows1['student_number'].'</b></th>
              </tr>
              <tr class="table-bordered">
                <th colspan="2">Course From : '.$rows1['course_from'].'</th>
                <th colspan="2">Course To : '.$rows1['course_to'].'</th>
              </tr>
              <tr class="table-bordered">
                <th colspan="4">Reason : '.$rows1['reason'].'</th>
              </tr>
              <tr class="table-bordered">
                <th scope="col">No.</th>
                <th scope="col">Subject Code</th>
                <th scope="col">Subject Title</th>
                <th scope="col">Units</th>
              </tr>
            </thead>
			<tbody>';

	if(mysqli_num_rows($query2) > 0)
		{

			while($rows=mysqli_fetch_array($query2))
			{
				$num++;
				$output .= '<tr id=""><th scope="row">'.$num.'</th><td>'.$rows['subject_code'].'</td><td>'.$rows['subject_title'].'</td><td>'.$rows['units'].'</td></tr>';
			}
		}
	else
		{
			$output .= '<tr><td>0</td><td colspan="5"><center>No Credited Subject</center></td></tr>';
		}
		echo $output;
  exit();
}

//for deleting student with requested status
if(isset($_POST['removereqstudent'])){
  $studnum = $_POST['studnum'];
  $sy = $_POST['sy'];
  $sem = $_POST['sem'];

  $result = mysqli_query($conn, "DELETE FROM shifting_student WHERE student_number = '$studnum' AND school_year = '$sy' AND semester = '$sem'");

  if($result){
    echo "Student removed succesfully";
    exit();
  }
  else{
    echo "0";
    exit();
  }
}

//for deleting student with credited status
if(isset($_POST['removecredstudent'])){
  $studnum = $_POST['studnum'];
  $sy = $_POST['sy'];
  $sem = $_POST['sem'];

  $query = mysqli_query($conn, "SELECT shift_id FROM shifting_student WHERE student_number = '$studnum' AND school_year = '$sy' AND semester = '$sem'");
  $rows=mysqli_fetch_assoc($query);
  $shift = $rows['shift_id'];

 $result1 = mysqli_query($conn, "DELETE FROM credited_subject WHERE shift_id = '$shift'");

  $result = mysqli_query($conn, "DELETE FROM shifting_student WHERE student_number = '$studnum' AND school_year = '$sy' AND semester = '$sem'");

  if($result && $result1){
    echo "Student removed succesfully";
    exit();
  }
  else{
    echo "0";
    exit();
  }
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