<?php   
require '../../config/config.php';
// on list of petition subject
if(isset($_POST['schoolyear']))  
 {
	  //timeframe for checking of school year and semester
	  $sy = "SELECT * FROM timeframe ORDER BY id DESC";
	  $sysem = mysqli_query($conn, $sy); 
	  $syrow = mysqli_fetch_assoc($sysem); 
	  $schoolyear = $syrow['school_year'];
	  $semester = $syrow['semester'];

  	  echo json_encode(array('schoolyear' => $schoolyear ,'semester' => $semester));
 }

 // section details
if(isset($_POST['sectiondetails']))  
 {
	  //timeframe for checking of school year and semester
	  $sy = "SELECT * FROM timeframe ORDER BY id DESC";
	  $sysem = mysqli_query($conn, $sy); 
	  $syrow = mysqli_fetch_assoc($sysem); 
	  $schoolyear = $syrow['school_year'];
	  $sem = $syrow['semester'];
	  $section = $_POST['section'];  

      $query = "SELECT subject.subject_code, schedule.lecture_day, schedule.lecturehr_from, schedule.lecturehr_to, schedule.laboratory_day, schedule.laboratoryhr_from, schedule.laboratoryhr_to, schedule.semester, schedule.lec_room, schedule.lab_room, schedule.max_student, schedule.faculty_id, subject.subject_title, subject.units from schedule 
    INNER JOIN subject ON schedule.subj_id = subject.subj_id 
    where schedule.section ='$section' AND schedule.semester = '$sem' AND schedule.school_year = '$schoolyear'";
    $result = mysqli_query($conn, $query); 

    if(mysqli_num_rows($result) > 0)  
    {
	   	while($rows=mysqli_fetch_array($result))
	    {
	      //for student count
	      $subjcode = $rows['subject_code'];
	      $query2 = "SELECT COUNT(student_enrollment_record.student_number) AS num FROM student_enrollment_record 
	      INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id
	      INNER JOIN subject ON subject.subj_id = schedule.subj_id WHERE subject.subject_code = '$subjcode' && schedule.section = '$section' && schedule.school_year = '$schoolyear' && schedule.semester = '$sem'"; 
    	  $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn)); 
    	  if(mysqli_num_rows($result2) > 0)  
    	  {
    	  	$num=mysqli_fetch_assoc($result2);
    	  	$count = $rows['max_student'];
    	  }
		  else
		  {
		  	$count = 0;
		  }


	      $lechrfrom = new DateTime($rows['lecturehr_from']);
	      $lechrto = new DateTime($rows['lecturehr_to']);
	      $labhrfrom = new DateTime($rows['laboratoryhr_from']);
	      $labhrto = new DateTime($rows['laboratoryhr_to']);

	      if( $labhrto->format('h:ia') == '12:00am' && $labhrfrom->format('h:ia') == '12:00am')
	      {
	      	$labday = '-';
	      	$labroom = '-';
	      	$labhr = '--:-- - --:--';
	      }
	      else
	      {
	      	$labday = $rows['laboratory_day'];
	      	$labroom = $rows['lab_room'];
	      	$labhr = $labhrfrom->format('h:ia')."-".$labhrto->format('h:ia');
	      }

	       if( $lechrto->format('h:ia') == '12:00am' && $lechrfrom->format('h:ia') == '12:00am')
	      {
	      	$lecday = '-';
	      	$lecroom = '-';
	      	$lechr = '--:-- - --:--';
	      }
	      else
	      {
	      	$lecday = $rows['lecture_day'];
	      	$lecroom = $rows['lec_room'];
	      	$lechr = $lechrfrom->format('h:ia')."-".$lechrto->format('h:ia');
	      }

	        if($num['num'] >= $count && $section != 'Petition')
	        {
	           $output = '<tr style="background-color:#ffa3a3">';
	        }
	        else
	        {
	           $output = '<tr>';
	        }

	      $output .= '
	      <th scope="row" style="white-space: nowrap;">'.$rows['subject_code'].'</th>
	      <td style="white-space: nowrap;">'.$rows['subject_title'].'</td> 
	      <td style="white-space: nowrap;">'.$rows['units'].'</td>
	      <td style="white-space: nowrap;">'.$lecday.'</td>
	      <td style="white-space: nowrap;">'.$lechr.'</td>
	      <td style="white-space: nowrap;">'.$lecroom.'</td>
	      <td style="white-space: nowrap;">'.$labday.'</td>
	      <td style="white-space: nowrap;">'.$labhr.'</td>
	      <td style="white-space: nowrap;">'.$labroom.'</td>
	      <td style="white-space: nowrap;">'.$num['num'].'</td>     
	      <td style="white-space: nowrap;">'.$count.'</td>        
	      </tr>';
		echo $output;

    	}
	}
	else
	{
		$output = '<tr><th colspan="11">NO SCHEDULE</th></tr>';
		echo $output;
	}
	exit();
 }

 // Petition Subject details
if(isset($_POST['petsubjdetails']))  
 {
 	  $subject = $_POST['subject'];
	  //timeframe for checking of school year and semester
	  $sy = "SELECT * FROM timeframe ORDER BY id DESC";
	  $sysem = mysqli_query($conn, $sy); 
	  $syrow = mysqli_fetch_assoc($sysem); 
	  $schoolyear = $syrow['school_year'];
	  $sem = $syrow['semester'];

      $query = "SELECT subject.subject_code, schedule.lecture_day, schedule.lecturehr_from, schedule.lecturehr_to, schedule.laboratory_day, schedule.laboratoryhr_from, schedule.laboratoryhr_to, schedule.semester, schedule.lec_room, schedule.lab_room, schedule.max_student, schedule.faculty_id, subject.subject_title,subject.units from schedule 
    INNER JOIN subject ON schedule.subj_id = subject.subj_id 
    where schedule.sched_id ='$subject' AND schedule.semester = '$sem' AND schedule.school_year = '$schoolyear'";
    $result = mysqli_query($conn, $query); 

    if(mysqli_num_rows($result) > 0)  
    {
	   	while($rows=mysqli_fetch_array($result))
	    {
	      $lechrfrom = new DateTime($rows['lecturehr_from']);
	      $lechrto = new DateTime($rows['lecturehr_to']);
	      $labhrfrom = new DateTime($rows['laboratoryhr_from']);
	      $labhrto = new DateTime($rows['laboratoryhr_to']);

	      if( $labhrto->format('h:ia') == '12:00am' && $labhrfrom->format('h:ia') == '12:00am')
	      {
	      	$labday = '-';
	      	$labroom = '-';
	      	$labhr = '--:-- - --:--';
	      }
	      else
	      {
	      	$labday = $rows['laboratory_day'];
	      	$labroom = $rows['lab_room'];
	      	$labhr = $labhrto->format('h:ia')."-".$labhrfrom->format('h:ia');
	      }

	       if( $lechrto->format('h:ia') == '12:00am' && $lechrfrom->format('h:ia') == '12:00am')
	      {
	      	$lecday = '-';
	      	$lecroom = '-';
	      	$lechr = '--:-- - --:--';
	      }
	      else
	      {
	      	$lecday = $rows['lecture_day'];
	      	$lecroom = $rows['lec_room'];
	      	$lechr = $lechrto->format('h:ia')."-".$lechrfrom->format('h:ia');
	      }
	      //for student count
	      $query2 = "SELECT COUNT(student_enrollment_record.student_number) AS num FROM student_enrollment_record 
	      INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id 
	      INNER JOIN subject ON subject.subj_id = schedule.subj_id 
	      WHERE schedule.sched_id = '$subject' && schedule.school_year = '$schoolyear' && schedule.semester = '$sem'"; 
    	  $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn)); 
    	  if(mysqli_num_rows($result2) > 0)  
    	  {
    	  	$num=mysqli_fetch_assoc($result2);
    	  	$count = $rows['max_student'];
    	  }
		  else
		  {
		  	$count = 0;
		  }

	      $output = '<tr>
	      <td style="white-space: nowrap;">'.$lecday.'</td>
	      <td style="white-space: nowrap;">'.$lechr.'</td>
	      <td style="white-space: nowrap;">'.$lecroom.'</td>
	      <td style="white-space: nowrap;">'.$labday.'</td>
	      <td style="white-space: nowrap;">'.$labhr.'</td>
	      <td style="white-space: nowrap;">'.$labroom.'</td>
	      <td style="white-space: nowrap;">'.$num['num'].'</td>     
	      <td style="white-space: nowrap;">'.$count.'</td>        
	      </tr>';
		echo $output;

    	}
	}
	else
	{
		$output = '<tr><th colspan="11">NO SCHEDULE</th></tr>';
		echo $output;
	}
	exit();
 }

 //for searching of schedule
if(isset($_POST['subjectname']))  
 {
 	  $subject = $_POST['subject'];
	  //timeframe for checking of school year and semester
	  $sy = "SELECT * FROM timeframe ORDER BY id DESC";
	  $sysem = mysqli_query($conn, $sy); 
	  $syrow = mysqli_fetch_assoc($sysem); 
	  $schoolyear = $syrow['school_year'];
	  $sem = $syrow['semester'];

	 $query = "SELECT subject.subject_code, subject.subject_title from schedule INNER JOIN subject ON schedule.subj_id = subject.subj_id where schedule.semester = '$sem' AND schedule.school_year = '$schoolyear' AND schedule.sched_id = '$subject'";
    $result = mysqli_query($conn, $query); 

    if(mysqli_num_rows($result) > 0)  
    {
	   	$rows=mysqli_fetch_array($result);

	    echo $rows['subject_code'].' - '.$rows['subject_title'];
	}
	else
	{
		$output = '';
		echo $output;
	}
	exit();
}
 //for searching of schedule
if(isset($_POST['searchschedule']))  
 {
	  //timeframe for checking of school year and semester
	  $sy = "SELECT * FROM timeframe ORDER BY id DESC";
	  $sysem = mysqli_query($conn, $sy); 
	  $syrow = mysqli_fetch_assoc($sysem); 
	  $schoolyear = $syrow['school_year'];
	  $sem = $syrow['semester'];
	  $subject = $_POST['subject'];  
$query = "SELECT schedule.section, subject.subject_code, schedule.lecture_day, schedule.lecturehr_from, schedule.lecturehr_to, schedule.laboratory_day, schedule.laboratoryhr_from, schedule.laboratoryhr_to, schedule.semester, schedule.lec_room, schedule.lab_room, schedule.max_student, schedule.faculty_id, subject.subject_title,subject.units from schedule 
    INNER JOIN subject ON schedule.subj_id = subject.subj_id 
    where subject.subject_code ='$subject' AND schedule.semester = '$sem' AND schedule.school_year = '$schoolyear'";
    $result = mysqli_query($conn, $query); 

    if(mysqli_num_rows($result) > 0)  
    {
	   	while($rows=mysqli_fetch_array($result))
	    {
	      //for student count
	      $subjcode = $rows['subject_code'];
	      $query2 = "SELECT COUNT(student_enrollment_record.student_number) AS num FROM student_enrollment_record INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id INNER JOIN subject ON subject.subj_id = schedule.subj_id WHERE subject.subject_code = '$subjcode' && schedule.school_year = '$schoolyear' && schedule.semester = '$sem'"; 
    	  $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn)); 
    	  if(mysqli_num_rows($result2) > 0)  
    	  {
    	  	$num=mysqli_fetch_assoc($result2);
    	  	$count = $rows['max_student'];
    	  }
		  else
		  {
		  	$count = 0;
		  }


	      $lechrfrom = new DateTime($rows['lecturehr_from']);
	      $lechrto = new DateTime($rows['lecturehr_to']);
	      $labhrfrom = new DateTime($rows['laboratoryhr_from']);
	      $labhrto = new DateTime($rows['laboratoryhr_to']);

	      if( $labhrto->format('h:ia') == '12:00am' && $labhrfrom->format('h:ia') == '12:00am')
	      {
	      	$labday = '-';
	      	$labroom = '-';
	      	$labhr = '--:-- - --:--';
	      }
	      else
	      {
	      	$labday = $rows['laboratory_day'];
	      	$labroom = $rows['lab_room'];
	      	$labhr = $labhrto->format('h:ia')."-".$labhrfrom->format('h:ia');
	      }

	       if( $lechrto->format('h:ia') == '12:00am' && $lechrfrom->format('h:ia') == '12:00am')
	      {
	      	$lecday = '-';
	      	$lecroom = '-';
	      	$lechr = '--:-- - --:--';
	      }
	      else
	      {
	      	$lecday = $rows['lecture_day'];
	      	$lecroom = $rows['lec_room'];
	      	$lechr = $lechrto->format('h:ia')."-".$lechrfrom->format('h:ia');
	      }

	        if($num['num'] >= $count && $rows['section'] != 'Petition')
	        {
	           $output = '<tr style="background-color:#ffa3a3">';
	        }
	        else
	        {
	           $output = '<tr>';
	        }
	      $output .= '
	      <th scope="row" style="white-space: nowrap;">'.$rows['section'].'</th>
	      <th scope="row" style="white-space: nowrap;">'.$rows['subject_code'].'</th>
	      <td style="white-space: nowrap;">'.$rows['subject_title'].'</td> 
	      <td style="white-space: nowrap;">'.$rows['units'].'</td>
	      <td style="white-space: nowrap;">'.$lecday.'</td>
	      <td style="white-space: nowrap;">'.$lechr.'</td>
	      <td style="white-space: nowrap;">'.$lecroom.'</td>
	      <td style="white-space: nowrap;">'.$labday.'</td>
	      <td style="white-space: nowrap;">'.$labhr.'</td>
	      <td style="white-space: nowrap;">'.$labroom.'</td>
	      <td style="white-space: nowrap;">'.$num['num'].'</td>     
	      <td style="white-space: nowrap;">'.$count.'</td>        
	      </tr>';
		echo $output;

    	}
	}
	else
	{
		$output = '<tr><th colspan="12">NO SCHEDULE</th></tr>';
		echo $output;
	}
	exit();
}

 //for searching of schedule
if(isset($_POST['searchsubject']))  
 {
	  //timeframe for checking of school year and semester
	  $sy = "SELECT * FROM timeframe ORDER BY id DESC";
	  $sysem = mysqli_query($conn, $sy); 
	  $syrow = mysqli_fetch_assoc($sysem); 
	  $schoolyear = $syrow['school_year'];
	  $sem = $syrow['semester'];

	 $query = "SELECT subject.subject_code from schedule INNER JOIN subject ON schedule.subj_id = subject.subj_id where schedule.semester = '$sem' AND schedule.school_year = '$schoolyear' GROUP BY subject.subject_code";
    $result = mysqli_query($conn, $query); 

    if(mysqli_num_rows($result) > 0)  
    {
	   	while($rows=mysqli_fetch_array($result))
	    {
	    	$output = '<option>'.$rows['subject_code'].'</option>';
			echo $output;
    	}
	}
	else
	{
		$output = '<option>Subject Not Available</option>';
		echo $output;
	}
	exit();
}

//for major
if(isset($_POST['major'])) {
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