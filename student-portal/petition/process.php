<?php   
require '../../config/config.php';
// on list of petition subject
if(isset($_POST['petitionsubject']))  
 {
	  //timeframe for checking of school year and semester
	  $sy = "SELECT * FROM timeframe ORDER BY id DESC";
	  $sysem = mysqli_query($conn, $sy); 
	  $syrow = mysqli_fetch_assoc($sysem); 
	  $schoolyear = $syrow['school_year'];
	  $semester = $syrow['semester'];

 	$query = "SELECT petition_request.subject_code, petition_request.subj_id, subject.subject_title from petition_request INNER JOIN subject ON petition_request.subject_code  = subject.subject_code where petition_request.status = 'Requested' AND petition_request.school_year = '$schoolyear' AND petition_request.semester = '$semester' GROUP BY petition_request.subject_code";
      $result = mysqli_query($conn, $query);  
      $count = 0;
      if(mysqli_num_rows($result) > 0)  
      	{  
           while($row = mysqli_fetch_array($result))
           {
           		$count++;
           		$subcode = $row['subject_code'];
                $query1 = "SELECT subject_code from petition_request where subject_code ='$subcode' AND status='Requested' AND school_year = '$schoolyear' AND semester = '$semester'";
                $result1 = mysqli_query($conn, $query1); 
                $count1=mysqli_num_rows($result1);
                $output =  '
                <tr>
                <th scope="row" id="psid'.$count.'" hidden>'.$row['subj_id'].'</th>
                <th scope="row" id="ps'.$count.'">'.$row['subject_code'].'</th>
                <td id="psy'.$count.'">'.$row['subject_title'].'</td>
                <td class="d-flex justify-content-center">'.$count1.'</td>
                <td><button class="btn btn-primary view" id="'.$count.'"><i class="fas fa-eye"></i>&nbsp;VIEW</button></td>';

                echo $output;
           }
       }
       else
       {
         echo '<tr><th colspan="4"><center>NO PETITION REQUESTED YET</center></th></tr>';
       }
       exit();
 }

 //for the list of subjects that can be requested as petition
if(isset($_POST['searchpetition']))  
 {
 	  $studnum = $_POST['studnum'];
 	  //for student information
 	  $query = "SELECT subject.subject_code, subject.pre_requisite FROM subject INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN student_info ON student_info.curriculum_title = curriculum.curriculum_title WHERE student_info.student_number ='$studnum'";
      $result = mysqli_query($conn, $query);  

      $count = 0;
      if(mysqli_num_rows($result) > 0)  
      	{  
           while($row = mysqli_fetch_array($result))
           {
           		      $count = 0;
                      $count2 = 0;
                      $count3 = 0;
                      $subj = $row['subject_code'];
                      $prereq = $row['pre_requisite'];

                      $grades = "SELECT subject.subject_code from grade_report INNER JOIN class_record ON class_record.id = grade_report.cr_id INNER JOIN schedule ON schedule.sched_id = class_record.sched_id INNER JOIN subject ON subject.subj_id = schedule.subj_id where grade_report.student_number = '$studnum'";
                      $result2 = mysqli_query($conn, $grades);

                  if(mysqli_num_rows($result2) > 0)
                  {
                      while($row2 = mysqli_fetch_array($result2))
                      { 
                      //to identify if subject has a grad or the pre-req subject has taken        
                        $subjwgrade = $row2['subject_code'];

                        if($subj == $subjwgrade)
                        {
                            $count++;
                        }
                        else if($prereq == $subjwgrade || $prereq == 'None' || $prereq == 'First Year' || $prereq == 'Second Year' || $prereq == 'Third Year' || $prereq == 'Fourth Year' || $prereq == 'Fifth Year' )
                        {
                        }
                        else
                        {
                          $count2++;
                        }
                        if($count2==mysqli_num_rows($result2))
                        {
                          $count++;
                        }
                      }
                      if($count == 0)
                      {

					      //timeframe for checking of school year and semester
					 	  $sy = "SELECT * FROM timeframe ORDER BY id DESC";
					      $sysem = mysqli_query($conn, $sy); 
					      $syrow = mysqli_fetch_assoc($sysem); 
					      $schoolyear = $syrow['school_year'];
					      $semester = $syrow['semester'];

					      //for checking of subjects that are already enrolled
					 	  $query3 = "SELECT subject.subject_code FROM student_enrollment_record  
              INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id 
              INNER JOIN subject ON subject.subj_id = schedule.subj_id 
              WHERE student_enrollment_record.student_number ='$studnum' AND schedule.school_year = '$schoolyear' AND schedule.semester = '$semester'";
					      $result3 = mysqli_query($conn, $query3); 

                  
                  if(mysqli_num_rows($result3) > 0)  
					      	{  
					           while($row3 = mysqli_fetch_array($result3))
					           {
  					           	  $subjectsched = $row3['subject_code'];
  					           	  if($subjectsched == $subj)
  					           	  {
  					           	  	$count3++;
  					           	  }
  					           	  else
  					           	  {

  					           	  }
	                    }

					           	  	if($count3 == 0)
					           	  	{
	                              		echo '<option>'.$subj.'</option>';	
					           	  	}
					           	  	else
					           	  	{
					           	  	}
	                 }
	                       	else
	                       	{
	                       		echo '<option>'.$subj.'</option>';
	                       	}
                      }
                  }
                  else
                  {
                    if($prereq == 'None' || $prereq == 'First Year' || $prereq == 'Second Year' || $prereq == 'Third Year' || $prereq == 'Fourth Year' || $prereq == 'Fifth Year' )
                        {
                          
                //timeframe for checking of school year and semester
              $sy = "SELECT * FROM timeframe ORDER BY id DESC";
                $sysem = mysqli_query($conn, $sy); 
                $syrow = mysqli_fetch_assoc($sysem); 
                $schoolyear = $syrow['school_year'];
                $semester = $syrow['semester'];

                //for checking of subjects enrolled this sem
              $query3 = "SELECT subject.subject_code FROM student_enrollment_record  INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id INNER JOIN subject ON subject.subj_id = schedule.subj_id WHERE student_enrollment_record.student_number ='$studnum' AND schedule.school_year = '$schoolyear' AND schedule.semester = '$semester'";
                $result3 = mysqli_query($conn, $query3); 

                        //check if the student enrolled or enlisted the subject
                        if(mysqli_num_rows($result3) > 0)  
                  {  
                     while($row3 = mysqli_fetch_array($result3))
                     {
                        $subjectsched = $row3['subject_code'];
                        if($subjectsched == $subj)
                        {
                          $count3++;
                        }
                        else
                        {

                        }
                             }

                          if($count3 == 0)
                          {
                                    echo '<option>'.$subj.'</option>';  
                          }
                          else
                          {
                          }
                          }
                          else
                          {
                            echo '<option>'.$subj.'</option>';
                          }
                        }
                  }  
                
           }
       }
 exit();
 }

 // for getting the subject info of the student request
if(isset($_POST['requestsubject']))  
 {
 	$studnum = $_POST['studnum'];
 	$subject = $_POST['subject'];
 	//for student info
 	$query = "SELECT course.course_abbreviation AS course, course.course_major AS major FROM student_info INNER JOIN course ON course.course_id = student_info.course_id WHERE student_info.student_number = '$studnum'";
    $result = mysqli_query($conn, $query);  
    $row = mysqli_fetch_assoc($result) OR die(mysqli_error($conn));

	$course = $row["course"]; 
	$major = $row["major"];
 
 	//for subject info
 	$query2 = "SELECT subject.subject_code, subject.subject_title, subject.units FROM subject INNER JOIN student_info ON student_info.curriculum_title = subject.curriculum_title WHERE student_info.student_number = '$studnum' AND subject.subject_code = '$subject'";
    $result2 = mysqli_query($conn, $query2) OR die(mysqli_error($conn));  

     if(mysqli_num_rows($result2) > 0)  
      	{  
           while($row2 = mysqli_fetch_array($result2))
           {
    			    $subjcode = $row2["subject_code"];
    			    $subjtitle = $row2["subject_title"];
    			    $units = $row2["units"];

        			echo json_encode(array('course' => $course ,'major' => $major,'subject_code' => $subjcode,'subject_title' => $subjtitle,'units' => $units)); 
    		}
    	}
    	else
    	{
			    $subjcode = "";
			    $subjtitle = "";
			    $units = "";
    			
    			echo json_encode(array('course' => $course ,'major' => $major,'subject_code' => $subjcode,'subject_title' => $subjtitle,'units' => $units)); 
    	}
 exit();
 }

 //for saving the students petition request
 if(isset($_POST['savepetition']))  
 {  
      $studnum = $_POST['studnum'];
      $subject = $_POST['subject'];
      $subjid='0';
      $status='Requested';

	  //timeframe for checking of school year and semester
	  $sy = "SELECT * FROM timeframe ORDER BY id DESC";
	  $sysem = mysqli_query($conn, $sy); 
	  $syrow = mysqli_fetch_assoc($sysem); 
	  $schoolyear = $syrow['school_year'];
	  $semester = $syrow['semester'];

      $query = "SELECT subject_code FROM petition_request WHERE subject_code='$subject' AND (status='Requested' OR status='Approved') AND school_year = '$schoolyear' AND semester = '$semester'";  
      $result = mysqli_query($conn, $query);  
      if(mysqli_num_rows($result) > 0)  
      {
               $query2 = "SELECT subject_code FROM petition_request WHERE subject_code='$subject' AND status='Approved' AND school_year = '$schoolyear' AND semester = '$semester'";  
            $result2 = mysqli_query($conn, $query2);  
            if(mysqli_num_rows($result2) > 0)  
            {
                echo '1';          
            }
            else
            {
                echo '0'; 
            }          
      }
      else
      {
            $stmt = $pdo_conn->prepare("INSERT INTO petition_request(student_number,subj_id,subject_code,status,school_year,semester) VALUES (?,?,?,'Requested',?,?)");
                $stmt->bindParam(1, $studnum);
                $stmt->bindParam(2, $subjid);
                $stmt->bindParam(3, $subject);
                $stmt->bindParam(4, $schoolyear);
                $stmt->bindParam(5, $semester);

                if($stmt->execute())
                {
                  echo "Successfully Added a new petition request.";
                }
      }
      exit();
 } 


 //for subject name
 if(isset($_POST['subjectname']))  
 {  
      $subjcode = $_POST['subjcode'];

    //timeframe for checking of school year and semester
    $sy = "SELECT * FROM timeframe ORDER BY id DESC";
    $sysem = mysqli_query($conn, $sy); 
    $syrow = mysqli_fetch_assoc($sysem); 
    $schoolyear = $syrow['school_year'];
    $semester = $syrow['semester'];

      $query = "SELECT subject.subject_code, subject.subject_title FROM petition_request INNER JOIN subject ON subject.subject_code = petition_request.subject_code WHERE petition_request.subject_code='$subjcode' AND petition_request.status='Requested' AND petition_request.school_year = '$schoolyear' AND petition_request.semester = '$semester' GROUP BY subject.subject_code";  
      $result = mysqli_query($conn, $query) OR die(mysqli_error($conn)); 
      if(mysqli_num_rows($result) > 0)  
      {
          while($row = mysqli_fetch_array($result))
          {
            echo $row['subject_code'].' - '.$row['subject_title'];
          }
      }
      else
      {
        echo '0';
      }
      exit();
 } 

// on view.php list of student
if(isset($_POST['studentlist']))  
 {    
      $count = 0;
      $subjcode = $_POST['subjcode'];
      $studnum = $_POST['studnum'];
      $query = "SELECT DISTINCT student_info.student_number, student_info.firstname, student_info.lastname, student_info.middlename, course.course_abbreviation AS course, course.course_major AS major, petition_request.subject_code FROM petition_request
     INNER JOIN student_info ON petition_request.student_number = student_info.student_number 
     INNER JOIN course ON course.course_id = student_info.course_id
     INNER JOIN subject ON petition_request.subject_code = subject.subject_code where petition_request.subject_code ='$subjcode' AND petition_request.status = 'Requested'";  
      $result = mysqli_query($conn, $query);  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))
           {
            $count++;
           
              if($row['student_number'] == $studnum)
              {
                $output =  '<tr id="studdata'.$count.'">
                  <td scope="row">'.$row['firstname'].'</td>
                  <td>'.$row['lastname'].'</td>
                  <td>'.$row['middlename'].'</td>
                  <td>'.$row['course'].'</td>
                  <td>'.$row['major'].'</td><td><button id="'.$count.'" class="btn btn-danger delete" data-toggle="modal" data-target="#delete" ripple><i class="far fa-trash-alt"></i> CANCEL</button></td></tr>';
              }
              else
              {
                $output =  '
                  <tr id="studdata'.$count.'">
                  <td scope="row">'.$row['firstname'].'</td>
                  <td>'.$row['lastname'].'</td>
                  <td>'.$row['middlename'].'</td>
                  <td>'.$row['course'].'</td>
                  <td>'.$row['major'].'</td><td> </td></tr>';
              }

           echo $output;
            
          }
      }  
      else  
      {  
           echo "0";
      }  
      exit();
 } 

//view.php join in existing petition subject
 if(isset($_POST['joinpetition']))  
 {  
      $studnum = $_POST['studnum'];
      $subjcode = $_POST['subjcode'];
      $subjid = '0';


      //timeframe for checking of school year and semester
      $sy = "SELECT * FROM timeframe ORDER BY id DESC";
      $sysem = mysqli_query($conn, $sy); 
      $syrow = mysqli_fetch_assoc($sysem); 
      $schoolyear = $syrow['school_year'];
      $semester = $syrow['semester'];

      $query = "SELECT * FROM petition_request WHERE student_number = '$studnum' AND subject_code = '$subjcode' AND school_year = '$schoolyear' AND semester ='$semester' AND status='Requested'";
      $result = mysqli_query($conn, $query) OR die(mysqli_error($conn));
      if($num = mysqli_num_rows($result) > 0)  
      {  
        echo '0';
      }
      else
      {
           $stmt = $pdo_conn->prepare("INSERT INTO petition_request(student_number,subj_id,subject_code,status,school_year,semester) VALUES (?,?,?,'Requested',?,?)");
                $stmt->bindParam(1, $studnum);
                $stmt->bindParam(2, $subjid);
                $stmt->bindParam(3, $subjcode);
                $stmt->bindParam(4, $schoolyear);
                $stmt->bindParam(5, $semester);

                if($stmt->execute())
                {
                  echo "You are now listed in this petition.";
                }
      }
      exit();
 } 

//remove petition subject
 if(isset($_POST['deletepetition']))  
 {  
      $studnum = $_POST['studnum'];
      $subjcode = $_POST['subjcode'];

      //timeframe for checking of school year and semester
      $sy = "SELECT * FROM timeframe ORDER BY id DESC";
      $sysem = mysqli_query($conn, $sy); 
      $syrow = mysqli_fetch_assoc($sysem); 
      $schoolyear = $syrow['school_year'];
      $semester = $syrow['semester'];

      $query = mysqli_query($conn, "DELETE FROM petition_request WHERE student_number = '$studnum' AND subject_code = '$subjcode' AND school_year = '$schoolyear' AND semester ='$semester' AND status='Requested'") OR die(mysqli_error($conn));
      echo '';
        exit();
 }

//for approve petition pop-up
 if(isset($_POST['approvesubj']))  
 {  
      $studnum = $_POST['studnum'];
      $count = 0;
      //timeframe for checking of school year and semester
      $sy = "SELECT * FROM timeframe ORDER BY id DESC";
      $sysem = mysqli_query($conn, $sy); 
      $syrow = mysqli_fetch_assoc($sysem); 
      $schoolyear = $syrow['school_year'];
      $semester = $syrow['semester'];

      $query = "SELECT subject.subject_code, subject.subject_title FROM petition_request INNER JOIN subject ON subject.subject_code = petition_request.subject_code INNER JOIN student_info ON student_info.student_number = petition_request.student_number INNER JOIN curriculum ON curriculum.curriculum_title = student_info.curriculum_title WHERE petition_request.student_number = '$studnum' AND petition_request.school_year = '$schoolyear' AND petition_request.semester ='$semester' AND petition_request.status='Approved' GROUP BY subject.subject_code";
      $result = mysqli_query($conn, $query) OR die(mysqli_error($conn));
      if(mysqli_num_rows($result) > 0)  
      {
        while($row = mysqli_fetch_array($result))
        {
            $count++;
            if ($count == 1)
            {
              $output = $row['subject_code']." - ".$row['subject_title']."</br>";
            }
            else
            {
              $output .= $row['subject_code']." - ".$row['subject_title']."</br>";
            }
        }
      }
      else
      {
        $output = '0';
      }
      echo $output;
 }
?>