<?php   
require '../../config/config.php';

 if(isset($_POST['studentinfo']))  
 {
      $studnum = $_POST['studnum'];  
        //timeframe for checking of school year and semester
        $sy = "SELECT * FROM timeframe ORDER BY id DESC";
        $sysem = mysqli_query($conn, $sy); 
        $syrow = mysqli_fetch_assoc($sysem); 
        $schoolyear = $syrow['school_year'];
        $semester = $syrow['semester'];
      //for student information
      $query = "SELECT student_info.firstname, student_info.middlename, student_info.lastname, course.course_abbreviation AS course, course.course_major AS major FROM student_info 
      INNER JOIN course ON course.course_id = student_info.course_id WHERE student_info.student_number = '$studnum'";  
      $result = mysqli_query($conn, $query);  
      //for student remaining balance
	  $query2 = "SELECT * FROM payment WHERE student_number = '$studnum' AND schoolyr = '$schoolyear' AND semester = '$semester'";  
      $result2 = mysqli_query($conn, $query2);  

      $row = mysqli_fetch_assoc($result);  
      $firstname = $row["firstname"]; 
      $lastname = $row["lastname"]; 
      $middlename = $row["middlename"]; 
      $course = $row["course"]; 
      $major = $row["major"];

      if(mysqli_num_rows($result2) > 0)  
      {
            $row2 = mysqli_fetch_assoc($result2);  
            $amount = $row2["amount"]; 
            $payment = $row2["cash_rendered"]; 
            $balance = $row2["balance"];
      }
      else
      {
            $amount = '0'; 
            $payment = '0'; 
            $balance = '0';
      }

	       

  	  echo json_encode(array('firstname' => $firstname ,'lastname' => $lastname,'middlename' => $middlename,'course' => $course,'major' => $major,'amount' => $amount,'payment' => $payment,'balance' => $balance));
 }
 //for student inc grades
if(isset($_POST['student_grade']))  
 {
      $studnum = $_POST['studnum'];  

      //for student inc grades or no grades
	  $query = "SELECT grade_report.tfg, subject.subject_code, subject.subject_title, schedule.school_year, schedule.semester FROM grade_report 
	  INNER JOIN class_record ON grade_report.cr_id = class_record.id
	  INNER JOIN schedule ON schedule.sched_id = class_record.sched_id
	  INNER JOIN subject ON subject.subj_id = schedule.subj_id
	  WHERE grade_report.student_number = '$studnum' AND grade_report.tfg = 'Inc'";  
      $result = mysqli_query($conn, $query) OR die(mysqli_error($conn));

      if(mysqli_num_rows($result) > 0)  
	  {
	    while($row = mysqli_fetch_array($result))
	    {
	    	echo '<tr>
                  <td nowrap>'.$row['subject_code'].'</td>
                  <td nowrap>'.$row['subject_title'].'</td>
                  <td nowrap>'.$row['school_year'].'</td>
                  <td nowrap>'.$row['semester'].'</td>
                  <td nowrap>'.$row['tfg'].'</td>
                  </tr>';
	    }
	  }
	  else
	  {
	  	echo '';
	  }
  } 

 ?>