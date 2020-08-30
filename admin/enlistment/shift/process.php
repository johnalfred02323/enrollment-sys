<?php   
require '../../../config/config.php';
//credit grades

 if(isset($_POST['creditsubject']))  
 {
    $data = json_decode($_POST['data']);
    $total_num = count($data->subjectcode);
    $shiftid = $_POST['shiftid'];
    $studnumber = $_POST['studnumber'];

  for ($i=0; $i < $total_num; $i++) 
  {
    $stmt = $pdo_conn->prepare("INSERT INTO credited_subject (shift_id, gr_id, subj_id, curriculum_from, curriculum_to, status) VALUES (?,?,?,?,?,'Credited')");
    $stmt->bindParam(1, $shiftid);
    $stmt->bindParam(2, $data->grade_id[$i]);
    $stmt->bindParam(3, $data->subjectcode[$i]);
    $stmt->bindParam(4, $data->curr_from[$i]);
    $stmt->bindParam(5, $data->curr_to[$i]);

    if($stmt->execute())
    {
      echo "1";
    }
  }
  $update = "UPDATE shifting_student SET status = 'Credited' WHERE student_number ='".$studnumber."' ";
  $resultupdate = mysqli_query($conn, $update); 
  exit();
 }
//for auto search of student number
 if(isset($_POST['shiftingstudent']))  
 {
      $course = $_POST['course']; 
      $major = $_POST['major'];  

      $courseid = "SELECT * FROM course WHERE course_abbreviation = '$course' and course_major = '$major'";
      $resultid = mysqli_query($conn, $courseid); 
      $rowid = mysqli_fetch_assoc($resultid);  
      $id =  $rowid['course_id'];

      $query = "SELECT shifting_student.student_number FROM shifting_student INNER JOIN course ON course.course_id = shifting_student.course_to WHERE shifting_student.course_to = '$id' AND shifting_student.status = 'Requested'";  
      $result = mysqli_query($conn, $query);    
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           { 
              $output = '<option>'.$row['student_number'].'</option>';
              echo $output;
           }
       }
       exit();
 }


//for auto search of student number
 if(isset($_POST['shiftingstudentdetails']))  
 {
      $course = $_POST['course']; 
      $major = $_POST['major'];   
      $studnum = $_POST['studnum'];  

      $courseid = "SELECT * FROM course WHERE course_abbreviation = '$course' and course_major = '$major'";
      $resultid = mysqli_query($conn, $courseid); 
      $rowid = mysqli_fetch_assoc($resultid);  
      $id =  $rowid['course_id'];

      $query2 = "SELECT student_info.curriculum_title, student_info.student_number, student_info.firstname, student_info.lastname, student_info.middlename, shifting_student.shift_id FROM student_info
      INNER JOIN shifting_student ON student_info.student_number = shifting_student.student_number 
      INNER JOIN course ON course.course_id = shifting_student.course_to 
      WHERE shifting_student.course_to = '$id' AND shifting_student.student_number = '$studnum'"; 
      $result = mysqli_query($conn, $query2);  
      
      $query3 = "SELECT course.course_abbreviation AS course, course.course_major AS major FROM  student_info INNER JOIN course ON course.course_id = student_info.course_id 
      WHERE student_info.student_number = '$studnum'"; 
      $result3 = mysqli_query($conn, $query3);  

      if(mysqli_num_rows($result) > 0)  
      {  
           $row = mysqli_fetch_assoc($result);  
           $row3 = mysqli_fetch_assoc($result3);   
           $shift =$row['shift_id'];
           $studnum =$row['student_number'];
           $firstname =$row['firstname'];
           $lastname =$row['lastname'];
           $middlename =$row['middlename'];
           $course =$row3['course'];
           $major =$row3['major'];
           $oldcur =$row['curriculum_title'];

          echo json_encode(array('shift' => $shift ,'firstname' => $firstname ,'lastname' => $lastname,'middlename' => $middlename,'course' => $course,'major' => $major,'studnum' => $studnum,'oldcur' => $oldcur));
       }
       else
       {
  
           $shift ="";
           $studnum ="";
           $firstname ="";
           $lastname ="";
           $middlename ="";
           $course ="";
           $major ="";

          echo json_encode(array('shift' => $shift ,'firstname' => $firstname ,'lastname' => $lastname,'middlename' => $middlename,'course' => $course,'major' => $major,'studnum' => $studnum));
       }
       exit();
 }

 //view subject with grades
 if(isset($_POST['view-subject']))  
 {
      $studnum = $_POST['studnum']; 
      $data = json_decode($_POST['data']);
      $total_num = count($data->oldcode);
      $count = 0;
      // $query = "SELECT subject.subject_code, subject.subject_title, subject.units FROM grade_report INNER JOIN class_record ON class_record.id = grade_report.cr_id INNER JOIN schedule ON schedule.sched_id = class_record.sched_id INNER JOIN subject ON subject.subj_id = schedule.subj_id INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN student_info ON student_info.curriculum_title = curriculum.curriculum_title WHERE  student_info.student_number = '$studnum'";  
      // $result = mysqli_query($conn, $query);    
      $query = "SELECT subject.subject_code, subject.subject_title, subject.units, grade_report.tfg,grade_report.id FROM grade_report INNER JOIN class_record ON class_record.id = grade_report.cr_id 
        INNER JOIN schedule ON schedule.sched_id = class_record.sched_id 
        INNER JOIN subject ON subject.subj_id = schedule.subj_id
        INNER JOIN year_and_semester ON year_and_semester.yrsem_id = subject.yrsem_id WHERE grade_report.student_number = '$studnum' ORDER BY year_and_semester.yrsem_id,subject.subject_code ASC";  
      $result = mysqli_query($conn, $query);    
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {
            $compare = 0;

            for ($i=0; $i < $total_num; $i++) 
            {
                  if($data->oldcode[$i] == $row['subject_code'])
                  {
                    $compare++;
                  }
                  else
                  {

                  }
              }

              if($compare == 0)
              {
                  $gradecount = 0;
                  $final_grade = $row['tfg'];
                  if($final_grade > 98) { $fg_eq = '1.00'; }
                  else if($final_grade > 95 && $final_grade < 98) { $fg_eq = '1.25'; }
                  else if($final_grade > 92 && $final_grade < 96) { $fg_eq = '1.50'; }
                  else if($final_grade > 89 && $final_grade < 93) { $fg_eq = '1.75'; }
                  else if($final_grade > 86 && $final_grade < 90) { $fg_eq = '2.00'; }
                  else if($final_grade > 83 && $final_grade < 87) { $fg_eq = '2.25'; }
                  else if($final_grade > 80 && $final_grade < 84) { $fg_eq = '2.50'; }
                  else if($final_grade > 77 && $final_grade < 81) { $fg_eq = '2.75'; }
                  else if($final_grade > 74 && $final_grade < 78) { $fg_eq = '3.00'; }
                  else{$gradecount++;}
                  if($gradecount == 0)
                  {
                      $count++;
                      $output = '<tr>
                        <th scope="row">
                        <label class="container-check">
                        <input type="checkbox" class="publish checkb" name="check[]"  id="'.$count.'" onclick="check()">
                        <span class="checkmark-check"></span>
                        </label>
                          </th>
                          <td name="scodeold[]" id="scodeold'.$count.'" nowrap>'.$row['subject_code'].'</td>
                          <td name="grid[]"  id="grid'.$count.'" nowrap hidden>'.$row['id'].'</td>
                          <td nowrap>'.$row['subject_title'].'</td>
                          <td nowrap>'.$row['units'].'</td>
                          <td nowrap>'.$fg_eq.'</td>
                          <td>-</td>
                          <td name="sid[]" id="sid'.$count.'" nowrap hidden></td>
                          <td name="code[]" id="scodenew'.$count.'" nowrap></td>
                          <td name="title[]" id="stitlenew'.$count.'" nowrap></td>
                          <td name="units[]" id="unitnew'.$count.'" nowrap></td>
                        </tr>';
                      echo $output;
                  }
              }
           }
       }
       exit();
 }

 if(isset($_POST['shiftingstudentdetails']))  
 {
    echo '<tr>
      <th scope="row"><input type="text" class="input-table2" placeholder="Insert Subject Code" id=""></th>
      <td>Subject Title</td>
      <td>0</td>
      <td class="d-flex justify-content-center"><button id="" class="delete-user pull-xs-right delete" ripple><i class="far fa-trash-alt"></i> REMOVE</button></td>
    </tr>';
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
           while($row = mysqli_fetch_array($result))  
           { 
              $output = '<option>'.$row['curriculum_title'].'</option>';
              echo $output;
           }
       }
       exit();
 }


//for curriculum search
 if(isset($_POST['activecurriculum2']))  
 {
      $course = $_POST['course']; 
      $major = $_POST['major'];   
      $cur = $_POST['cur'];  
      $count = 0; 
      $query = "SELECT curriculum.curriculum_title FROM curriculum INNER JOIN subject ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN course ON course.course_id = curriculum.course_id WHERE subject.Status='Active' AND course.course_abbreviation = '$course' AND course.course_major = '$major' GROUP BY curriculum.curriculum_title";  
      $result = mysqli_query($conn, $query);    
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           { 
              if($row['curriculum_title'] == $cur)
              {
                $count++;
              }
              else
              {
              }
           }
       }
       else
       {
       }

       echo $count;
       exit();
 }



//for curriculum search
 if(isset($_POST['compare-subject']))  
 {  
      $cur = $_POST['cur'];  
      $id = $_POST['id'];  
      $count = 0; 
      $query = "SELECT subject.subj_id, subject.subject_code, subject.subject_title, subject.units, year_and_semester.year FROM curriculum INNER JOIN subject ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN year_and_semester ON year_and_semester.yrsem_id = subject.yrsem_id WHERE curriculum.curriculum_title = '$cur' ORDER BY year_and_semester.yrsem_id,subject.subject_code ASC";  
      $result = mysqli_query($conn, $query);    
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           { 
              $count++;
              $output = '
                  <tr>
                    <td id="subjid'.$count.'" hidden>'.$row['subj_id'].'</td>
                    <td id="codecomp'.$count.'">'.$row['subject_code'].'</td>
                    <td id="titlecomp'.$count.'">'.$row['subject_title'].'</td>
                    <td id="unitcomp'.$count.'">'.$row['units'].'</td>
                    <td><button type="button" class="edit-user getcompare" id="'.$count.'" ripple>SELECT</button></td>
                  </tr><th id="scold" hidden>'.$id.'</th>';
              echo $output;
           }
       }
       else
       {      $output = '0';
              echo $output;
       }

       exit();
 }
 ?>