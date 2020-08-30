<?php   
require '../../config/config.php';

// viewing of enlisted student 
if(isset($_POST['viewstudentenrolleddata']))  
{
  $id = $_POST['id'];

   $query1 = "SELECT * FROM student_info WHERE student_number='$id'";
  $result1 = mysqli_query($conn, $query1); 
  $row1 = mysqli_fetch_assoc($result1);
  $curriculum = $row1['curriculum_title'];

  $query = "SELECT schedule.section, subject.subject_code, subject.subject_title, subject.units FROM student_enrollment_record INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id
    INNER JOIN subject ON student_enrollment_record.subj_id = subject.subj_id WHERE student_enrollment_record.student_number='$id' AND subject.curriculum_title = '$curriculum' AND student_enrollment_record.status='Enlisted'";
  $result = mysqli_query($conn, $query); 
  if(mysqli_num_rows($result) > 0)  
    {
      while($row = mysqli_fetch_array($result))
        {
          $output = '<tr><th nowrap>'.$row['subject_code'].'</th>
                     <td nowrap>'.$row['subject_title'].'</td>
                     <td nowrap>'.$row['units'].'</td>
                     <td nowrap>'.$row['section'].'</td></tr>';
          echo $output;
        }
    }
  else
    {
        $output = '<tr><th colspan="4"> NO DATA </th></tr>';
        echo $output;
    }
}


// viewing of enrolled student 
if(isset($_POST['viewstudentenrolleddata2']))  
{
  $id = $_POST['id'];

  $query1 = "SELECT * FROM timeframe ORDER BY id DESC";  
  $result1 = mysqli_query($conn, $query1); 
  $row = mysqli_fetch_array($result1);
  $schoolyear = $row['school_year'];
  $semester = $row['semester'];


   $query1 = "SELECT * FROM student_info WHERE student_number='$id'";
  $result1 = mysqli_query($conn, $query1); 
  $row1 = mysqli_fetch_assoc($result1);
  $curriculum = $row1['curriculum_title'];

  $query = "SELECT schedule.section, subject.subject_code, subject.subject_title, subject.units FROM student_enrollment_record 
    INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id
    INNER JOIN subject ON schedule.subj_id = subject.subj_id 
    INNER JOIN year_and_semester ON year_and_semester.yrsem_id = subject.yrsem_id 
    WHERE student_enrollment_record.student_number='$id' AND subject.curriculum_title = '$curriculum' AND student_enrollment_record.status='Enrolled' AND schedule.school_year = '$schoolyear' AND schedule.semester = '$semester' ORDER BY year_and_semester.yrsem_id ASC";
  $result = mysqli_query($conn, $query); 
  if(mysqli_num_rows($result) > 0)  
    {
      while($row = mysqli_fetch_array($result))
        {
          $output = '<tr><th nowrap>'.$row['subject_code'].'</th>
                     <td nowrap>'.$row['subject_title'].'</td>
                     <td nowrap>'.$row['units'].'</td>
                     <td nowrap>'.$row['section'].'</td></tr>';
          echo $output;
        }
    }
  else
    {
        $output = '<tr><th colspan="4"> NO DATA </th></tr>';
        echo $output;
    }
}

//for getting student subjects
if(isset($_POST['getstudsubj']))  
 {
      $rowcount = 0;
      $studnum = $_POST['studnum'];
      $output = '';  

      $query1 = "SELECT * FROM student_info WHERE student_number = '$studnum'"; 
      $getcur = mysqli_query($conn, $query1);  
      $row = mysqli_fetch_array($getcur);
      if(mysqli_num_rows($getcur) > 0){$curtitle = $row['curriculum_title'];}
      else{$curtitle = "";}

      $query1 = "SELECT * FROM timeframe ORDER BY id DESC";  
      $result1 = mysqli_query($conn, $query1); 
      $row = mysqli_fetch_array($result1);
      $schoolyear = $row['school_year'];
      $semester = $row['semester'];

            $query = "SELECT subject.subject_code,subject.subj_id, subject.subject_title,subject.lecture, subject.laboratory, subject.units, subject.pre_requisite, year_and_semester.year, year_and_semester.sem FROM subject
              INNER JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id
              where subject.curriculum_title = '$curtitle' AND sem = '$semester' AND subject.status = 'Active' ORDER BY year_and_semester.yrsem_id ASC";  
            $result = mysqli_query($conn, $query); 

            if(mysqli_num_rows($result) > 0)  
            {
                 while($row1 = mysqli_fetch_array($result))  
                 {
                      $count = 0;
                      $count2=0;
                      $subj = $row1['subject_code'];
                      $prereq = $row1['pre_requisite'];

                      $subjectpass = "SELECT subject.subject_code from student_enrollment_record INNER JOIN schedule ON schedule.sched_id = student_enrollment_record.sched_id INNER JOIN subject ON subject.subj_id = schedule.subj_id WHERE student_enrollment_record.student_number = '$studnum' AND schedule.school_year ='$schoolyear' AND schedule.semester = '$semester'";
                      $result3 = mysqli_query($conn, $subjectpass);

                      $grades = "SELECT subject.subject_code from grade_report INNER JOIN class_record ON class_record.id = grade_report.cr_id INNER JOIN schedule ON schedule.sched_id = class_record.sched_id INNER JOIN subject ON subject.subj_id = schedule.subj_id where grade_report.student_number = '$studnum'";
                      $result2 = mysqli_query($conn, $grades);

                    if($num =mysqli_num_rows($result2) > 0)  
                    {
                      while($row2 = mysqli_fetch_array($result2))
                      {         
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
                          $count3 = 0;
                        if($num3 = mysqli_num_rows($result3) > 0)
                        {
                          while($row3 = mysqli_fetch_array($result3))
                          {
                            $subjectenlist = $row3['subject_code'];
                            if($subj == $subjectenlist)
                            {
                              $count3++;
                            }
                          }
                              if($count3 == 0)
                              { 
                                $rowcount++;
                                $output = '<tr id="er'.$rowcount.'">
                                <th id="sid'.$rowcount.'" hidden>'.$row1['subj_id'].'</th>
                                <th id="sc'.$rowcount.'" nowrap>'.$row1['subject_code'].'</th>
                                <td id="st'.$rowcount.'" nowrap>'.$row1['subject_title'].'</td>
                                <td nowrap>'.$row1['year'].'</td>
                                <td nowrap>'.$row1['lecture'].'</td>
                                <td nowrap>'.$row1['laboratory'].'</td>
                                <td id="un'.$rowcount.'" nowrap>'.$row1['units'].'</td>
                                <td nowrap>'.$row1['pre_requisite'].'</td>
                                <td nowrap><button id="'.$rowcount.'" class="view-user pull-xs-right edit scheddetail" data-toggle="modal" data-target="#available-modal1" ripple><i class="fas fa-eye"></i> SCHEDULE</button></td>
                                </tr>';
                                echo $output;
                              }
                        }
                      }
                    }
                    else
                    {
                      
                      if($prereq == 'None' || $prereq == 'First Year' || $prereq == 'Second Year' || $prereq == 'Third Year' || $prereq == 'Fourth Year' || $prereq == 'Fifth Year' )
                          {
                            $rowcount++;
                              $output = '<tr id="er'.$rowcount.'">
                                <th id="sid'.$rowcount.'" hidden>'.$row1['subj_id'].'</th>
                                <th id="sc'.$rowcount.'" nowrap>'.$row1['subject_code'].'</th>
                                <td id="st'.$rowcount.'" nowrap>'.$row1['subject_title'].'</td>
                                <td nowrap>'.$row1['year'].'</td>
                                <td nowrap>'.$row1['lecture'].'</td>
                                <td nowrap>'.$row1['laboratory'].'</td>
                                <td id="un'.$rowcount.'" nowrap>'.$row1['units'].'</td>
                                <td nowrap>'.$row1['pre_requisite'].'</td>
                                <td nowrap><button id="'.$rowcount.'" class="view-user pull-xs-right edit scheddetail" data-toggle="modal" data-target="#available-modal1" ripple><i class="fas fa-eye"></i> SCHEDULE</button></td>
                                </tr>';
                              echo $output;
                          }

                    }  
                  }
            }
            else
            {
              echo '1';
            }
            exit();
}

 ?>