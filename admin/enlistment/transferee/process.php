<?php   
require '../../../config/config.php';

//for auto search of student number
 if(isset($_POST['transfereestudent']))  
 {
      $course = $_POST['course']; 
      $major = $_POST['major'];   
      $query = "SELECT * FROM student_info INNER JOIN course on course.course_id = student_info.course_id WHERE course.course_abbreviation = '$course' AND course.course_major = '$major' AND student_info.orientation = 'Transferee'";  
      $result = mysqli_query($conn, $query);    
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           { 
                $sisnum = $row['sisnum'];
                $query2 = "SELECT * FROM grade_report WHERE student_number = '$sisnum'";  
                $result2 = mysqli_query($conn, $query2);    
                if(mysqli_num_rows($result2) > 0)  
                {  
                }
                else
                {
                        $output = '<option value="'.$row['sisnum'].'">'.$row['lastname'].', '.$row['firstname'].' '.substr($row['middlename'],0,1).'.</option>';
                        echo $output;           
                }
           }
       }
       exit();
 }


//for auto search of student number
 if(isset($_POST['transfereedetails']))  
 {
      $course = $_POST['course'];  
      $major = $_POST['major'];   
      $query = $_POST['query'];  
      if($query == '')
      {
          $studnum ="";
           $firstname ="";
           $lastname ="";
           $middlename ="";
           $school ="";

          echo json_encode(array('firstname' => $firstname ,'lastname' => $lastname,'middlename' => $middlename,'school' => $school,'studnum' => $studnum));
      }
      else
      {
      $query2 = "SELECT * FROM student_info INNER JOIN course on course.course_id = student_info.course_id WHERE course.course_abbreviation = '$course' AND course.course_major = '$major' AND student_info.orientation = 'Transferee' AND student_info.sisnum LIKE '%$query%'"; 
      $result = mysqli_query($conn, $query2);  
      
      if(mysqli_num_rows($result) > 0)  
      {  
           $row = mysqli_fetch_assoc($result);  
           $studnum =$row['sisnum'];
           $firstname =$row['firstname'];
           $lastname =$row['lastname'];
           $middlename =$row['middlename'];
           $school =$row['school_last_attended'];

  	  		echo json_encode(array('firstname' => $firstname ,'lastname' => $lastname,'middlename' => $middlename,'school' => $school,'studnum' => $studnum));
       }
       else
       {

           $studnum ="";
           $firstname ="";
           $lastname ="";
           $middlename ="";
           $school ="";

  	  		echo json_encode(array('firstname' => $firstname ,'lastname' => $lastname,'middlename' => $middlename,'school' => $school,'studnum' => $studnum));
       }
     }
       exit();
 }

 //view subject with grades
 if(isset($_POST['view-subject']))  
 {
      $studnum = $_POST['studnum']; 
      $count = 0;
      // $query = "SELECT subject.subject_code, subject.subject_title, subject.units FROM grade_report INNER JOIN class_record ON class_record.id = grade_report.cr_id INNER JOIN schedule ON schedule.sched_id = class_record.sched_id INNER JOIN subject ON subject.subj_id = schedule.subj_id INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN student_info ON student_info.curriculum_title = curriculum.curriculum_title WHERE  student_info.student_number = '$studnum'";  
      // $result = mysqli_query($conn, $query);    
      $query = "SELECT subject.subject_code, subject.subject_title, subject.units FROM student_grade INNER JOIN subject ON subject.subject_code = student_grade.subject_code INNER JOIN curriculum ON curriculum.curriculum_title = student_grade.curriculum_title WHERE  student_grade.student_number = '$studnum' GROUP BY subject.subject_code";  
      $result = mysqli_query($conn, $query);    
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           { 
              $count++;
              $output = '<tr>
                <th scope="row">
                <label class="container-check">
                <input type="checkbox" class="publish" id="checked" onclick="check()">
                <span class="checkmark-check"></span>
                </label>
                  </th>
                  <td nowrap>'.$row['subject_code'].'</td>
                  <td nowrap>'.$row['subject_title'].'</td>
                  <td nowrap>'.$row['units'].'</td>
                  <td>-</td>
                  <td nowrap></td>
                  <td nowrap></td>
                  <td nowrap></td>
                </tr>';
              echo $output;
           }
       }
       exit();
 }

//for auto search of student number
 if(isset($_POST['searchsubject']))  
 {
      $cur = $_POST['cur'];   
      $query = "SELECT subject.subject_code FROM subject 
      INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title
      INNER JOIN year_and_semester ON year_and_semester.yrsem_id = subject.yrsem_id WHERE curriculum.curriculum_title = '$cur' ORDER BY year_and_semester.yrsem_id ASC";  
      $result = mysqli_query($conn, $query);    
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           { 
              $output = '<option>'.$row['subject_code'].'</option>';
              echo $output;
           }
       }
       else
       {
         echo '';
       }
       exit();
 }


//for searching of subjects in a curriculum
 if(isset($_POST['searchsubjectdetails']))  
 {
      $query = $_POST['query']; 
      $curriculum = $_POST['curriculum'];   
      $query = "SELECT subject.subject_title, subject.subj_id, subject.units FROM subject INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title WHERE curriculum.curriculum_title = '$curriculum' AND subject.subject_code = '$query'";  
      $result = mysqli_query($conn, $query);    
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           { 
              $subtitle =$row['subject_title'];
              $units =$row['units'];
              $subjid =$row['subj_id'];
             echo json_encode(array('subtitle' => $subtitle,'units' => $units,'subjid' => $subjid));
           }
       }
       else
       {
         $subtitle ='Subject Title';
         $units ='0';
         $subjid ='';
         echo json_encode(array('subtitle' => $subtitle,'units' => $units,'subjid' => $subjid));
       }
       exit();
 }

//for curriculum search
 if(isset($_POST['activecurriculum']))  
 {
      $course = $_POST['course']; 
      $major = $_POST['major'];   
      $query = "SELECT curriculum.curriculum_title FROM curriculum INNER JOIN subject ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN course ON course.course_id = curriculum.course_id WHERE subject.Status='Active' AND course.course_abbreviation = '$course' AND course.course_major = '$major' GROUP BY curriculum.curriculum_title";  
      $result = mysqli_query($conn, $query);    
      if(mysqli_num_rows($result) > 0)  
      {  
           $output = '<option value="Choose Curriculum" hidden>Choose Curriculum</option>';

           while($row = mysqli_fetch_array($result))  
           { 
              $output .= '<option>'.$row['curriculum_title'].'</option>';
           }
              echo $output;
       }
       exit();
 }


//for curriculum search
 if(isset($_POST['checkcurriculum']))  
 {
      $cur = $_POST['cur']; 
      $course = $_POST['course']; 
      $major = $_POST['major'];   
      $query = "SELECT curriculum.curriculum_title FROM curriculum INNER JOIN subject ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN course ON course.course_id = curriculum.course_id WHERE subject.Status='Active' AND course.course_abbreviation = '$course' AND course.course_major = '$major' AND curriculum.curriculum_title = '$cur' GROUP BY curriculum.curriculum_title";  
      $result = mysqli_query($conn, $query);    
      if(mysqli_num_rows($result) > 0)  
      {  
           echo '1';
      }
      else
      {
        echo '0';
      }
       exit();
      
 }

//for saving of credited subject
 if(isset($_POST['savesubj']))  
 {
    $sisnum = $_POST['sisnum'];
    $cur = $_POST['cur'];
    $data = json_decode($_POST['data']);
    $total_num = count($data->subjectid);

    for ($i=0; $i < $total_num; $i++) {
      $query = mysqli_query($conn, "INSERT INTO grade_report (student_number, cr_id, midterm_grade, final_grade, tfg) VALUES ('".$sisnum."', 'TR_".$data->subjectid[$i]."','Transferee','','')") or die(mysqli_error($conn));
    }

      $stmt = $pdo_conn->prepare("UPDATE student_info SET curriculum_title = ? WHERE sisnum = ?");
      $stmt->bindParam(1, $cur);
      $stmt->bindParam(2, $sisnum);
      if($stmt->execute())
      {
      } 
    exit();
 }
 ?>