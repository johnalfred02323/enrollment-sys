<?php
include('../../config/config.php');

if(isset($_POST['existing_student_user'])) {
	$email = $_POST['email'];
	$pass = password_hash($_POST['password'], PASSWORD_ARGON2I);

	$check = mysqli_query($conn, "SELECT * FROM student_user WHERE email = '$email'");
	if(mysqli_num_rows($check) > 0){
		echo "0";
	}
	else {
		$stmt = $pdo_conn->prepare("INSERT INTO student_user (email, password) VALUES (?,?)");
		$stmt->bindParam(1, $email);
		$stmt->bindParam(2, $pass);
		if($stmt->execute())
		{
			echo "1";
		}
	}
}

if(isset($_POST['check_account'])) {
	$email = $_POST['email'];
	$check = mysqli_query($conn, "SELECT * FROM student_user WHERE email = '$email'");
	if(mysqli_num_rows($check) > 0){
		echo "0";
	}
	else {
		echo "1";
	}
}

//for student step
if(isset($_POST['proceedstudent'])) {
	$id = $_POST['id'];

	$check = mysqli_query($conn, "SELECT * FROM student_info WHERE sisnum  = '$id'");
	  if(mysqli_num_rows($check) > 0)
	  {
	  	$row=mysqli_fetch_assoc($check);
	  	$studnum = $row['student_number'];
	  }
	  else
	  {
	  	$studnum = '';
	  }

	$query = mysqli_query($conn, "SELECT * FROM admission_student_score WHERE sisnum = '$id'");
	if(mysqli_num_rows($query) > 0)
	{

		$query1 = mysqli_query($conn, "SELECT * FROM admission_student_musthave WHERE sisnum = '$id'");
		if(mysqli_num_rows($query1) > 0)
		{
      if($studnum == '')
      {
			  $query1 = mysqli_query($conn, "SELECT * FROM student_enrollment_record WHERE student_number = '$id' OR student_number = '$studnum'");
				if(mysqli_num_rows($query1) > 0)
				{
					echo 'admission-final-process';
				}	
				else
				{
					echo 'admission-crediting';
				}
      }
      else
      {
        echo 'admission-final-process';
      }
		}	
		else
		{
			echo 'admission-credentials';
		}
	}
	else
	{
		echo 'admission-evaluation-of-scores';
	}
	exit();
}



//getting student info for shifting form
if(isset($_POST['shiftstudinfo'])) {
	$sisnum = $_POST['sisnum'];
	$query = mysqli_query($conn, "SELECT firstname,lastname,middlename,student_number, course_abbreviation AS course, course_major AS major FROM student_info 
    INNER JOIN course ON course.course_id = student_info.course_id WHERE sisnum = '$sisnum'");
	if(mysqli_num_rows($query) > 0){

      $query1 = "SELECT * FROM timeframe ORDER BY id DESC LIMIT 1";  
      $result1 = mysqli_query($conn, $query1); 
      $row = mysqli_fetch_array($result1);
      $schoolyear = $row['school_year'];
      $semester = $row['semester'];
  	  $row = mysqli_fetch_assoc($query);
	  $fullname = $row['lastname'].', '.$row['firstname'].' '.$row['middlename'];
	  $studnum = $row['student_number'];
	  $course = $row['course'].' - '.$row['major'];
		
  		echo json_encode(array('fullname' => $fullname ,'studnum' => $studnum ,'course' => $course ,'schoolyear' => $schoolyear,'semester' => $semester ));
	}
	else {
		echo "0";
	}
	exit();
}


//enlist student
if(isset($_POST['enlist']))  
{
  $data = json_decode($_POST['data']);
  $total_num = count($data->studnumber);

  //Select year and semester
  $yrsem = mysqli_query($conn, "SELECT * FROM timeframe WHERE status='Active' and type='enrollment'") or die(mysqli_error($conn));
  if(mysqli_num_rows($yrsem) > 0)
  {
    $row = mysqli_fetch_assoc($yrsem);
    $schoolyear = $row['school_year'];
    $semester = $row['semester'];
  }
  else
  {
    $schoolyear = "";
    $semester = "";
  }

  for ($i=0; $i < $total_num; $i++) {
   
      $query = mysqli_query($conn, "INSERT INTO student_enrollment_record (student_number, sched_id, status) VALUES ('".$data->studnumber[$i]."','".$data->schedid[$i]."','Enlisted');")or die(mysqli_error($conn));
    
  }

}

if(isset($_POST['viewsched'])){
$subjectcode = $_POST['subjectcode'];
$count = 0;
 //get semester and school year
       $query1 = "SELECT * FROM timeframe where status='Active' AND type='enrollment'";  
      $result1 = mysqli_query($conn, $query1); 
      $row = mysqli_fetch_array($result1);
      $schoolyear = $row['school_year'];
      $semester = $row['semester'];
      //get schedule
      $query = "SELECT DISTINCT subject.subj_id, subject.subject_title, subject.units, schedule.sched_id, schedule.section, course.course_abbreviation AS course, course.course_major AS major,  schedule.lecture_day, schedule.lecturehr_from,  schedule.lecturehr_to, schedule.laboratory_day, schedule.laboratoryhr_from, schedule.laboratoryhr_to, schedule.lec_room, schedule.lab_room, schedule.max_student From schedule INNER JOIN subject ON schedule.subj_id = subject.subj_id 
      	  INNER JOIN  curriculum ON subject.curriculum_title = curriculum.curriculum_title 
          INNER JOIN  course ON course.course_id = curriculum.course_id 
      	  WHERE subject.subject_code='$subjectcode' AND schedule.semester='$semester' AND schedule.school_year='$schoolyear'";  
      $result = mysqli_query($conn, $query) or die (mysqli_error($conn)); 
      if(mysqli_num_rows($result) > 0)  
      {
        while($row = mysqli_fetch_array($result))
          {

              $query2 = "SELECT COUNT(student_enrollment_record.student_number) AS num FROM student_enrollment_record 
                INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id
                INNER JOIN subject ON subject.subj_id = schedule.subj_id WHERE subject.subject_code = '$subjectcode' && schedule.section = '".$row['section']."' && schedule.school_year = '$schoolyear' && schedule.semester = '$semester'"; 
                $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn)); 
                if(mysqli_num_rows($result2) > 0)  
                {
                  $num=mysqli_fetch_assoc($result2);
                  $max = $row['max_student'];
                }
                else
                {
                  $max = 0;
                }

            $count++;
            $lechrfrom = new DateTime($row['lecturehr_from']);
            $lechrto = new DateTime($row['lecturehr_to']);
            $labhrfrom = new DateTime($row['laboratoryhr_from']);
            $labhrto = new DateTime($row['laboratoryhr_to']);

            if( $labhrto->format('h:ia') == '12:00am' && $labhrfrom->format('h:ia') == '12:00am')
            {
              $labhrto2 = '';
              $labhrfrom2 = '';
            }
            else
            {
              $labhrfrom2 = $labhrfrom->format('h:ia');
              $labhrto2 = $labhrto->format('h:ia');
            }

             if( $lechrto->format('h:ia') == '12:00am' && $lechrfrom->format('h:ia') == '12:00am')
            {
              $lechrto2 = '';
              $lechrfrom2 = '';
            }
            else
            {
              $lechrfrom2 = $lechrfrom->format('h:ia');
              $lechrto2 = $lechrto->format('h:ia');
            }

             if($num['num'] >= $max && $row['section'] != 'Petition')
              {
                 $output = '<div id="er" hidden>'.$count.'</div><div id="scode" hidden>'.$row['subj_id'].'</div><div id="stitle" hidden>'.$row['subject_title'].'</div><div id="unit" hidden>'.$row['units'].'</div>
              <tr><th scope="row">FULL</th>';
              }
              else
              {
                 $output = '<div id="er" hidden>'.$count.'</div><div id="scode" hidden>'.$row['subj_id'].'</div><div id="stitle" hidden>'.$row['subject_title'].'</div><div id="unit" hidden>'.$row['units'].'</div>
              <tr><th scope="row"> <!-- Radio Box Start Here --> <label class="container-check">
              <input  type="radio" name="check[]"><span class="checkmark-check"></span> </label>
                <!-- Radio Box End Here --> </th>';
              }

              $output .='
                <label name="id[]" hidden>'.$row['sched_id'].'</label>
                <td name="sec[]" nowrap>'.$row['section'].'</td>
                <td name="cou[]" nowrap>'.$row['course'].'</td>
                <td name="maj[]" nowrap>'.$row['major'].'</td>
                <td name="lecd[]" nowrap>'.$row['lecture_day'].'</td>
                <td name="lecf[]" nowrap>'.$lechrfrom2.'</td>
                <td name="lect[]" nowrap>'.$lechrto2.'</td>
                <td name="lecroom[]" nowrap>'.$row['lec_room'].'</td>
                <td name="labd[]" nowrap>'.$row['laboratory_day'].'</td>
                <td name="labf[]" nowrap>'.$labhrfrom2.'</td>
                <td name="labt[]" nowrap>'.$labhrto2.'</td>
                <td name="labroom[]" nowrap>'.$row['lab_room'].'</td>
                <td name="stud[]" nowrap>'.$num['num'].'</td>
                <td name="max[]" nowrap>'.$max.'</td>
              </tr>';
            echo $output;
          }
      }
      else
      {
          $output = '<tr><th scope="col" colspan="14"><center>NO SCHEDULE AVAILABLE</center></th></tr>';
          echo $output;
      }
	exit();
}


//for multiple subject choosen
if(isset($_POST['multi-section']))  
{
     $count = 0;
     $data = json_decode($_POST['data']);
     $total_num = count($data->subjcode);
	   //timeframe for checking of school year and semester
	    $sy = "SELECT * FROM timeframe ORDER BY id DESC";
	    $sysem = mysqli_query($conn, $sy); 
	    $syrow = mysqli_fetch_assoc($sysem); 
	    $schoolyear = $syrow['school_year'];
	    $semester = $syrow['semester'];

    $query2 = "SELECT DISTINCT schedule.section, course.course_abbreviation AS course, course.course_major AS major FROM schedule 
    INNER JOIN subject ON subject.subj_id = schedule.subj_id 
    INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title
    INNER JOIN course ON course.course_id = curriculum.course_id
    WHERE  schedule.school_year = '$schoolyear' AND schedule.semester = '$semester'";
    $result = mysqli_query($conn, $query2) or die (mysqli_error($conn)); 


    if(mysqli_num_rows($result) > 0)  
    {
      while($rows = mysqli_fetch_array($result))
      {
          for ($i=0; $i < $total_num; $i++) 
          {
                $query3 = "SELECT * FROM schedule INNER JOIN subject ON schedule.subj_id = subject.subj_id WHERE schedule.section = '".$rows['section']."' AND subject.subject_code = '".$data->subjcode[$i]."' AND schedule.school_year = '$schoolyear' AND schedule.semester = '$semester'";

                $query2 = "SELECT COUNT(student_enrollment_record.student_number) AS num FROM student_enrollment_record 
                INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id
                INNER JOIN subject ON subject.subj_id = schedule.subj_id WHERE subject.subject_code = '".$data->subjcode[$i]."' AND schedule.section = '".$rows['section']."' AND schedule.school_year = '$schoolyear' AND schedule.semester = '$semester'"; 
                $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn)); 

                $result3 = mysqli_query($conn, $query3); 
                if(mysqli_num_rows($result3) > 0)  
                {
                  $rows3 =mysqli_fetch_assoc($result3);
                  $count++;
                  if(mysqli_num_rows($result2) > 0)  
                  {
                    $num=mysqli_fetch_assoc($result2);
                    $max = $rows3['max_student'];
                  }
                  else
                  {
                    $max = 0;
                  }

                  if($num['num']<= $max)
                  {

                  }
                  else
                  {
                    $count--;
                  }
                }
                else
                {
                }
          }
          if($count == $total_num)
          {
            $counter = 0;
                  $output = '<div class="card-header d-flex justify-content-between align-items-center">
                  <h6 class="m-0 font-weight-bold" id="multi-course'.$rows["section"].'" hidden>'.$rows["course"].'</h6>
                  <h6 class="m-0 font-weight-bold" id="multi-major'.$rows["section"].'" hidden>'.$rows["major"].'</h6>
                  <h6 class="m-0 font-weight-bold" id="multi-section">'.$rows["section"].'</h6>

                  <div class="d-flex justify-content-end">
                  <button id="'.$rows["section"].'" class="delete-user pull-xs-right take mr-2" ripple><i class="fas fa-check"></i> Take</button>
                  <button id="" data-toggle="collapse" data-target="#collapse'.$rows["section"].'" aria-expanded="false" aria-controls="collapseExample" class="view-user pull-xs-right mr-2 showsec" ripple><i class="fas fa-eye"></i> Show</button></div>

                </div>

                    <!-- Card Content - Collapse -->
                    <div class="collapse" id="collapse'.$rows["section"].'">
                    <!-- Card Body -->
                    <div class="card-body">

                      <div class="table-responsive">
                      <table class="table table-striped table-hover table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Subject&nbsp;Code</th>
                            <th scope="col">Subject&nbsp;Title</th>
                            <th scope="col">unit</th>  
                            <th scope="col">Day</th>  
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Room</th>
                            <th scope="col">Day</th>
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Room</th>
                            <td scope="col">No. of Student</th>
                            <td scope="col">Max. Student</th>
                          </tr>
                        </thead>
                        <tbody id="section'.$rows['section'].'">';
          for ($i=0; $i < $total_num; $i++) 
          {

            $query = "SELECT subject.subj_id, subject.subject_code,subject.subject_title, subject.units, schedule.sched_id, schedule.section, course.course_abbreviation AS course, course.course_major AS major, schedule.sched_id,  schedule.lecture_day, schedule.lecturehr_from,  schedule.lecturehr_to, schedule.laboratory_day, schedule.laboratoryhr_from, schedule.laboratoryhr_to, schedule.lec_room, schedule.lab_room, schedule.max_student From schedule 
            	INNER JOIN subject ON schedule.subj_id = subject.subj_id 
            	INNER JOIN curriculum ON subject.curriculum_title = curriculum.curriculum_title
              INNER JOIN course ON course.course_id = curriculum.course_id
            	WHERE schedule.section = '".$rows['section']."' AND subject.subject_code = '".$data->subjcode[$i]."' AND schedule.school_year = '$schoolyear' AND schedule.semester = '$semester'";
                $result2 = mysqli_query($conn, $query) or die(mysqli_error($conn)); 
                if(mysqli_num_rows($result2) > 0)  
                {
                  while($rows2 = mysqli_fetch_array($result2))
                  {
                  //for counting of student
                  $q = "SELECT COUNT(student_enrollment_record.student_number) AS num FROM student_enrollment_record 
                  INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id
                  INNER JOIN subject ON subject.subj_id = schedule.subj_id WHERE subject.subject_code = '".$data->subjcode[$i]."' AND schedule.section = '".$rows['section']."' AND schedule.school_year = '$schoolyear' AND schedule.semester = '$semester'"; 
                  $r = mysqli_query($conn, $q) or die(mysqli_error($conn)); 
                  $num=mysqli_fetch_assoc($r);

                    $counter++;
                    $lechrfrom = new DateTime($rows2['lecturehr_from']);
                    $lechrto = new DateTime($rows2['lecturehr_to']);
                    $labhrfrom = new DateTime($rows2['laboratoryhr_from']);
                    $labhrto = new DateTime($rows2['laboratoryhr_to']);

                    if( $labhrto->format('h:ia') == '12:00am' && $labhrfrom->format('h:ia') == '12:00am')
                    {
                      $labhrfrom1 = '';
                      $labhrto1 = '';
                    }
                    else
                    {
                      $labhrfrom1 = $labhrfrom->format('h:ia');
                      $labhrto1 = $labhrto->format('h:ia');
                    }

                     if( $lechrto->format('h:ia') == '12:00am' && $lechrfrom->format('h:ia') == '12:00am')
                    {
                      $lechrfrom1 = '';
                      $lechrto1 = '';
                    }
                    else
                    {
                      $lechrfrom1 = $lechrfrom->format('h:ia');
                      $lechrto1 = $lechrto->format('h:ia');
                    }

                  
                    $output .='<tr>
                            <th id="row'.$counter.'" scope="col" hidden>'.$data->rownum[$i].'</th>
                            <th id="sid'.$counter.'" scope="col" hidden>'.$rows2['subj_id'].'</th>
                            <th id="id'.$counter.'" scope="col" hidden>'.$rows2['sched_id'].'</th>
                            <th id="sc'.$counter.'" scope="col" nowrap>'.$rows2['subject_code'].'</th>
                            <td id="st'.$counter.'" scope="col" nowrap>'.$rows2['subject_title'].'</th>
                            <td id="unit'.$counter.'" scope="col" nowrap>'.$rows2['units'].'</th>  
                            <td id="lecd'.$counter.'" scope="col" nowrap>'.$rows2['lecture_day'].'</th>  
                            <td id="lecf'.$counter.'" scope="col" nowrap>'.$lechrfrom1.'</th>
                            <td id="lect'.$counter.'" scope="col" nowrap>'.$lechrto1.'</th>
                            <td id="lecr'.$counter.'" scope="col" nowrap>'.$rows2['lec_room'].'</th>
                            <td id="labd'.$counter.'" scope="col" nowrap>'.$rows2['laboratory_day'].'</th>
                            <td id="labf'.$counter.'" scope="col" nowrap>'.$labhrfrom1.'</th>
                            <td id="labt'.$counter.'" scope="col" nowrap>'.$labhrto1.'</th>
                            <td id="labr'.$counter.'" scope="col" nowrap>'.$rows2['lab_room'].'</th>
                            <td nowrap>'.$num['num'].'</td>
                            <td nowrap>'.$rows2['max_student'].'</td>
                            <td id="lechrfrom'.$counter.'" style="white-space: nowrap;" hidden>'.$lechrfrom->format('H:i:s').'</td>
                            <td id="lechrto'.$counter.'" style="white-space: nowrap;" hidden>'.$lechrto->format('H:i:s').'</td>
                            <td id="labhrfrom'.$counter.'" style="white-space: nowrap;" hidden>'.$labhrfrom->format('H:i:s').'</td>
                            <td id="labhrto'.$counter.'" style="white-space: nowrap;" hidden>'.$labhrto->format('H:i:s').'</td>
                        </tr>';  
                    }
                  }
                  else
                  {
                    echo '<tbody><th colspan="13"> No Data Found</th></tbody>';
                  }
                }
                    $output .= '</tbody></table>
                      </div></div></div><br>';
                    echo $output;
          }
          else
          {
          }
          $count = 0;
      }
    }
    else
    {
    }
    exit();
}
//edit including adding, dropping and change of schedule
if(isset($_POST['edit-stud-enrollment-data']))  
{
  $sisnum = $_POST['sisnum'];
  $totalunit = 0;
  $count = 0;
  $query = mysqli_query($conn, "SELECT * FROM student_info WHERE sisnum = $sisnum");
  $row = mysqli_fetch_assoc($query);

  if($row['student_number'] == '')
  {
     //timeframe for checking of school year and semester
    $sy = "SELECT * FROM timeframe ORDER BY id DESC";
    $sysem = mysqli_query($conn, $sy); 
    $syrow = mysqli_fetch_assoc($sysem); 
    $schoolyear = $syrow['school_year'];
    $semester = $syrow['semester'];

  $query = "SELECT student_enrollment_record.id, student_enrollment_record.sched_id, subject.subj_id, subject.subject_code, subject.subject_title, subject.units, schedule.section, course.course_abbreviation AS course, course.course_major AS major, schedule.lecture_day, schedule.lecturehr_from,  schedule.lecturehr_to, schedule.laboratory_day, schedule.laboratoryhr_from, schedule.laboratoryhr_to, schedule.lec_room, schedule.lab_room FROM student_enrollment_record INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id 
    INNER JOIN subject ON subject.subj_id = schedule.subj_id 
    INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title 
    INNER JOIN course ON curriculum.course_id = course.course_id 
    WHERE student_enrollment_record.student_number='$sisnum' AND schedule.semester='$semester' AND schedule.school_year='$schoolyear' ";
  $result = mysqli_query($conn, $query) OR die(mysqli_error($conn)); 
  if(mysqli_num_rows($result) > 0)  
    {
      while($row = mysqli_fetch_array($result))
        {
            $count++;
            $lechrfrom = new DateTime($row['lecturehr_from']);
            $lechrto = new DateTime($row['lecturehr_to']);
            $labhrfrom = new DateTime($row['laboratoryhr_from']);
            $labhrto = new DateTime($row['laboratoryhr_to']);

            if( $labhrto->format('h:ia') == '12:00am' && $labhrfrom->format('h:ia') == '12:00am')
            {
              $labhrto1 = '';
              $labhrfrom1 = '';
            }
            else
            {
              $labhrfrom1 = $labhrfrom->format('h:ia');
              $labhrto1 = $labhrto->format('h:ia');
            }

             if( $lechrto->format('h:ia') == '12:00am' && $lechrfrom->format('h:ia') == '12:00am')
            {
              $lechrto1 = '';
              $lechrfrom1 = '';
            }
            else
            {
              $lechrfrom1 = $lechrfrom->format('h:ia');
              $lechrto1 = $lechrto->format('h:ia');
            }

            $totalunit = $totalunit + $row['units'];
              $output ='
              <tr id="cs'.$count.'">
              <th scope="row" name="sc'.$count.'" id="scode'.$count.'" nowrap>'.$row['subject_code'].'</th>
              <td id="sched'.$count.'" nowrap hidden>'.$row['sched_id'].'</td>
              <td id="stitle'.$count.'" nowrap>'.$row['subject_title'].'</td>
              <td id="unit'.$count.'" nowrap>'.$row['units'].'</td>
              <td nowrap>'.$row['section'].'</td>
              <td nowrap>'.$row['course'].'</td>
              <td nowrap>'.$row['major'].'</td>
              <td nowrap>'.$row['lecture_day'].'</td>
              <td nowrap>'.$lechrfrom1.'</td>
              <td nowrap>'.$lechrto1.'</td>
              <td nowrap>'.$row['lec_room'].'</td>
              <td nowrap>'.$row['laboratory_day'].'</td>
              <td nowrap>'.$labhrfrom1.'</td>
              <td nowrap>'.$labhrto1.'</td>
              <td nowrap>'.$row['lab_room'].'</td>
              </tr>';
            echo $output;
        }
    }
  else
    {
        $output = '<tr><th colspan="15"><center> NO DATA </center></th></tr>';
        echo $output;
    }
  }
  else
  {
    echo '0';
  }
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

//for school year value
if(isset($_POST['schoolyearvalue'])) {
$query = mysqli_query($conn, "SELECT DISTINCT school_year FROM schedule ORDER BY school_year ASC") or die(mysqli_error($conn));
	if(mysqli_num_rows($query) > 0)
	{
		while($rows=mysqli_fetch_array($query))
		{
			$output = $rows['school_year'];
		}
			echo $output;	
	}
	else
	{

	}
	exit();
}
//for schedule semester search
if(isset($_POST['semester'])) {
	$query = mysqli_query($conn, "SELECT DISTINCT semester FROM schedule ORDER BY semester DESC") or die(mysqli_error($conn));
	if(mysqli_num_rows($query) > 0)
	{
		while($rows=mysqli_fetch_array($query))
		{
		$output = $rows['semester'];
		}
		echo $output;
	}
	else
	{

	}
	exit();

}


//for schedule semester search
if(isset($_POST['searchsubject'])) {
  $id = $_POST['id'];

  $query2 = mysqli_query($conn, "SELECT * FROM student_info WHERE sisnum = $id");
  $row = mysqli_fetch_assoc($query2);
  $studnum = $row['student_number'];

  $output = '';
  $query = mysqli_query($conn, "SELECT subject.subject_code FROM grade_report INNER JOIN class_record ON class_record.id = grade_report.cr_id
  INNER JOIN schedule ON schedule.sched_id = class_record.sched_id
  INNER JOIN subject ON subject.subj_id = schedule.subj_id WHERE grade_report.tfg = 'Inc' AND grade_report.student_number='$studnum'") or die(mysqli_error($conn));
  if(mysqli_num_rows($query) > 0)
  {
    while($rows=mysqli_fetch_array($query))
    {
        $output .= '<option value="'.$rows['subject_code'].'">'.$rows['subject_code'].'</option>';
    }
    echo $output;
  }
  else
  {

  }
  exit();

}

//for auto search of subjects
 if(isset($_POST['searchsubjectdetails']))  
 {
      $query = $_POST['query']; 
      $query2 = mysqli_query($conn, "SELECT subject.units, schedule.semester, schedule.school_year, CONCAT(user.lastname,', ',user.firstname,' ', LEFT(user.middlename, 1),'. ') AS fullname FROM grade_report 
      INNER JOIN class_record ON class_record.id = grade_report.cr_id
      INNER JOIN schedule ON schedule.sched_id = class_record.sched_id
      INNER JOIN user ON user.id = schedule.faculty_id
      INNER JOIN subject ON subject.subj_id = schedule.subj_id WHERE subject.subject_code ='$query'") or die(mysqli_error($conn));  
      if(mysqli_num_rows($query2) > 0)  
      {  
           while($row = mysqli_fetch_array($query2))  
           { 
                $unit = $row['units'];
                $sem = $row['semester']; 
                $year= $row['school_year'];
                $name= $row['fullname'];
           }
       }
       else
       {
                $unit = '';
                $sem = ''; 
                $year= '';
                $name= '';
       }

        echo json_encode(array('unit' => $unit ,'sem' => $sem ,'year' => $year ,'name' => $name ));
       exit();
 }
//for viewing of student details

if(isset($_POST['studentdetails'])) {
$sisnum = $_POST['sisnum'];
  $label = 'Update Student'; 
  $check = mysqli_query($conn, "SELECT * FROM student_info WHERE sisnum  = '$sisnum'");
    if(mysqli_num_rows($check) > 0)
    {
     $row=mysqli_fetch_assoc($check);
     $fname = $row['firstname'];
     $lname = $row['lastname'];
     $mname = $row['middlename'];
     $stutype = $row['stu_type'];
     $stu_orientation = $row['stu_orientation'];
     $con_num = $row['con_num'];
     $gender = $row['gender'];
     $email = $row['email'];
     $bday = date("M d, Y", strtotime($row['bday']));
     $bplace = $row['bplace'];
     $address = $row['houseAddress'];
     $city = $row['city'];
     $prov = $row['province'];
     $nat = $row['nat'];
     $fat_name = $row['fat_name'];
     $fat_occ = $row['fat_occ'];
     $fat_con_num = $row['fat_con_num'];
     $mat_name = $row['mat_name'];
     $mat_occ = $row['mat_occ'];
     $mat_con_num = $row['mat_con_num'];
     $p_school_name = $row['p_school_name'];
     $p_school_year = $row['p_school_grad'];
     $s_school_name = $row['s_school_name'];
     $s_school_year = $row['s_school_grad'];
     $s_school_strand = $row['s_school_strand'];
     $t_school_name = $row['t_school_name'];
     $t_school_year = $row['t_school_grad'];
     $t_school_course = $row['t_school_course'];


    echo json_encode(array('fname' => $fname ,'lname' => $lname ,'mname' => $mname ,'stutype' => $stutype,'stu_orientation' => $stu_orientation ,'con_num' => $con_num ,'gender' => $gender ,'email' => $email ,'bday' => $bday ,'bplace' => $bplace ,'nat' => $nat ,'fat_name' => $fat_name ,'fat_occ' => $fat_occ ,'fat_con_num' => $fat_con_num ,'mat_name' => $mat_name ,'mat_occ' => $mat_occ ,'mat_con_num' => $mat_con_num ,'p_school_name' => $p_school_name ,'p_school_year' => $p_school_year ,'s_school_name' => $s_school_name ,'s_school_year' => $s_school_year ,'s_school_strand' => $s_school_strand ,'t_school_name' => $t_school_name ,'t_school_year' => $t_school_year ,'t_school_course' => $t_school_course ,'address' => $address ,'city' => $city ,'prov' => $prov ));
    }
    exit();
  }


//for major
if(isset($_POST['getmajor'])) {
  $majorcount = 0;
  $course = $_POST['course'];
   $query = "SELECT DISTINCT course_major FROM course where course_abbreviation = '$course'";
   $result = mysqli_query($conn, $query); 
    if($count=mysqli_num_rows($result) > 0)  
    {
    $output = '<option id="cm" value="Choose Major" hidden>Choose Major</option>';
    while($rows=mysqli_fetch_array($result))
    {
      if($rows['course_major'] == 'No Major')
      {
        // for no major output
        $majorcount++; 
      }
      else
      {
        $output .= '<option >'.$rows['course_major'].'</option>';
      }
    }
    if($majorcount == 0){echo $output;}
      else {echo '<option>No Major</option>';}
    }
    else
    {
      echo '0';
    }
        
}
?>