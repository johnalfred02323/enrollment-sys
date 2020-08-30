<?php 
include('../../../config/config.php');
//for school year
if(isset($_POST['tabledata'])) {
$sy = $_POST['sy'];
$count = 0;
$query = mysqli_query($conn, "SELECT DISTINCT school_year, semester FROM student_info WHERE school_year = '$sy' ORDER BY school_year DESC") or die(mysqli_error($conn));
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
$query = mysqli_query($conn, "SELECT * FROM grade_report WHERE midterm_grade = 'Transferee' AND student_number ='$studnum'") or die(mysqli_error($conn));
  if(mysqli_num_rows($query) > 0)
  {
  	echo '1';
  }
  else
  {
  	echo '0';
  }

  exit();
}

//for displaying of student details
if(isset($_POST['studdata'])) {
$studnum = $_POST['studnum'];
$sy = $_POST['sy'];
$sem = $_POST['sem'];
$count = 0;
$query = mysqli_query($conn, "SELECT CONCAT(student_info.lastname,', ',student_info.firstname,' ', LEFT(student_info.middlename, 1),'. ', student_info.suffix) AS fullname, student_info.gender, student_info.school_last_attended, student_info.curriculum_title, student_info.sisnum, student_info.student_number FROM student_info
    WHERE student_info.sisnum ='$studnum'") or die(mysqli_error($conn));
  if(mysqli_num_rows($query) > 0)
  {
  	$rows=mysqli_fetch_assoc($query);
  	$fullname = $rows['fullname'];
  	$gender = $rows['gender'];
  	$school = $rows['school_last_attended'];
  	$studnum = $rows['student_number'];
  	$curriculum = $rows['curriculum_title'];
  	echo json_encode(array('fullname' => $fullname ,'curriculum' => $curriculum ,'gender' => $gender ,'school' => $school , 'studnum' => $studnum));
  }
  else
  {
  	$fname = '';
  	$lname = '';
  	$mname = '';
  	$suffix = '';
  	$gender = '';
  	$school = '';
  	$studnum = '';
  	echo json_encode(array('fname' => $fname ,'lname' => $lname ,'mname' => $mname ,'suffix' => $suffix ,'gender' => $gender ,'school' => $school , 'studnum' => $studnum));
  }

  exit();
}


//for displaying of student Credited Subjects
if(isset($_POST['studsubject'])) {
$studnum = $_POST['studnum'];
$num = 0;
$query = mysqli_query($conn, "SELECT subject.subj_id, subject.subject_code,subject.subject_title, subject.units, grade_report.id, grade_report.final_grade FROM grade_report 
	INNER JOIN subject ON subject.subj_id = SUBSTRING(grade_report.cr_id, 4)
    WHERE grade_report.student_number ='$studnum'") or die(mysqli_error($conn));

	if(mysqli_num_rows($query) > 0)
		{
		  $output = '
              <div class="card shadow-sm mb-4"><a href="#collapsesubj" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <div class="d-flex align-items-center p-0">
                  <h6 class="m-0 font-weight-bold">Credited Subjects</h6></div></a>

                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapsesubj">
                    <!-- Card Body -->
                    <div class="card-body">

                      <div class="table-responsive">
                      <table class="table table-striped table-hover table-bordered">
		          <thead>
		              <tr class="table-bordered">
		                <th scope="col">No.</th>
		                <th scope="col" nowrap>Subject Code</th>
		                <th scope="col" nowrap>Subject Title</th>
		                <th scope="col" nowrap>Units</th>
		                <th scope="col" nowrap>Grades</th>
		                <th scope="col" nowrap>Action</th>
		              </tr>
		            </thead>
					<tbody id="subjdetails">';

			while($rows=mysqli_fetch_array($query))
			{
				$num++;
				$output .= '<tr name="'.$rows['id'].'" id="ar'.$num.'">
				<td colspan="4" id="hide'.$num.'" style="text-align: right; display:none;">Subject '.$rows['subject_code'].' will be removed after saving of grades</td>
				<th style="display:none;" id="hide2'.$num.'" colspan="2"><button type="button" class="delete-user undograde" id="'.$num.'" ripple><i class="fas fa-undo"></i> undo</button></th>
				<td scope="row">'.$num.'.</td>
				<td>'.$rows['subject_code'].'</td>
				<td>'.$rows['subject_title'].'</td>
				<td>'.$rows['units'].'</td>';

				$output .='<td><input id="gr'.$num.'" type="text" class="input-table2" placeholder="Input Grades Here... " maxlength ="4" value="'.$rows['final_grade'].'" onkeypress="return isNumberKey(this, event)"></td><td nowrap><button type="button" class="delete-user removegrade" id="'.$num.'" ripple><i class="fas fa-times"></i> remove</button></td></tr>';
				
			}
		$output .= '</tbody></table></div></div></div></div>';
		echo $output;
		}
	else
		{
			echo '';
		}
  exit();
}

if(isset($_POST['save-grades'])) {
   $sisnum = $_POST['sisnum'];
   $data = json_decode($_POST['data']);
   $total_num = count($data->grades);

  for ($i=0; $i < $total_num; $i++) 
  {
      $stmt = $pdo_conn->prepare("UPDATE grade_report SET final_grade = ? WHERE student_number = ? AND id = ?");
			$stmt->bindParam(1, $data->grades[$i]);
			$stmt->bindParam(2, $sisnum);
			$stmt->bindParam(3, $data->id[$i]);
			if($stmt->execute())
			{
			} 

  }
  exit();
}

if(isset($_POST['deletestud'])) {
   $sisnum = $_POST['sisnum'];
  $sy = $_POST['sy'];
  $sem = $_POST['sem'];


 $result1 = mysqli_query($conn, "DELETE FROM student_info WHERE sisnum = '$sisnum'");

  $result = mysqli_query($conn, "DELETE FROM grade_report WHERE student_number = '$sisnum'");

  if($result && $result1){
    echo "Student removed succesfully";
    exit();
  }
  else{
    echo "0";
    exit();
  }
  exit();
}
















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
	          		$query1 =  mysqli_query($conn, "SELECT SUM(units) AS Units FROM student_info INNER JOIN student_enrollment_record ON student_enrollment_record.student_number = student_info.student_number INNER JOIN schedule ON schedule.sched_id = student_enrollment_record.sched_id INNER JOIN subject ON subject.subj_id = student_enrollment_record.subj_id WHERE student_info.student_number='$studnum' AND schedule.school_year='$schoolyear' AND schedule.semester = '$sem'	") or die(mysqli_error($conn));
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
	          		$query1 =  mysqli_query($conn, "SELECT SUM(units) AS Units FROM student_info INNER JOIN student_enrollment_record ON student_enrollment_record.student_number = student_info.student_number INNER JOIN schedule ON schedule.sched_id = student_enrollment_record.sched_id INNER JOIN subject ON subject.subj_id = student_enrollment_record.subj_id WHERE student_info.student_number='$studnum' AND schedule.school_year='$schoolyear' AND schedule.semester = '$sem'	") or die(mysqli_error($conn));
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