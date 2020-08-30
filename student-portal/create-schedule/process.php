<?php
include('../../config/config.php');

//for auto search of student number
 if(isset($_POST['searchsubject']))  
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


                       $grades = "SELECT subject.subject_code,grade_report.tfg from grade_report INNER JOIN class_record ON class_record.id = grade_report.cr_id INNER JOIN schedule ON schedule.sched_id = class_record.sched_id INNER JOIN subject ON subject.subj_id = schedule.subj_id where grade_report.student_number = '$studnum'";
                      $result2 = mysqli_query($conn, $grades);

                    if(mysqli_num_rows($result2) > 0)  
                    {
                      while($row2 = mysqli_fetch_array($result2))
                      {         
                          $subjwgrade = $row2['subject_code'];
                          if($subj == $subjwgrade)
                          {
                              if($row2['tfg'] != 'FA' || $row2['tfg'] != 'Drp')
                              {
                                  $count++;
                              }
                              else
                              {

                              }
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
                              $rowcount++;
                              $output = '<option>'.$row1['subject_code'].'</option>';
                              echo $output;
                      }
                    }
                    else
                    {
                      if($prereq == 'None' || $prereq == 'First Year' || $prereq == 'Second Year' || $prereq == 'Third Year' || $prereq == 'Fourth Year' || $prereq == 'Fifth Year' )
                          {
                            $rowcount++;
                              $output = '<option>'.$row1['subject_code'].'</option>';
                              echo $output;
                          }

                    }  
                  }
            }
            else
            {
              echo '1';
            }
        
 }

 if(isset($_POST['searchscheddetails']))  
 {
    $count = 0;
    //timeframe for checking of school year and semester
    $sy = "SELECT * FROM timeframe ORDER BY id DESC";
    $sysem = mysqli_query($conn, $sy); 
    $syrow = mysqli_fetch_assoc($sysem); 
    $schoolyear = $syrow['school_year'];
    $semester = $syrow['semester'];

    $query = $conn -> real_escape_string($_POST['query']);
  $query2 = "SELECT schedule.sched_id, schedule.section, subject.subject_code, schedule.lecture_day, schedule.lecturehr_from, schedule.lecturehr_to, schedule.laboratory_day, schedule.laboratoryhr_from, schedule.laboratoryhr_to, schedule.semester, schedule.lec_room, schedule.lab_room, schedule.faculty_id, schedule.max_student, subject.subject_title,subject.units from schedule 
    INNER JOIN subject ON schedule.subj_id = subject.subj_id 
    where subject.subject_code ='$query' AND schedule.semester = '$semester' AND schedule.school_year = '$schoolyear'";
    $result = mysqli_query($conn, $query2); 

    if(mysqli_num_rows($result) > 0)  
    {
      while($rows=mysqli_fetch_array($result))
      {
        //for student count
        $subjcode = $rows['subject_code'];
        $section = $rows['section'];
        $query2 = "SELECT COUNT(student_enrollment_record.student_number) AS num FROM student_enrollment_record 
        INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id
        INNER JOIN subject ON subject.subj_id = schedule.subj_id WHERE subject.subject_code = '$subjcode' && schedule.section = '$section' && schedule.school_year = '$schoolyear' && schedule.semester = '$semester'"; 
        $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn)); 
        if(mysqli_num_rows($result2) > 0)  
        {
          $num=mysqli_fetch_assoc($result2);
          $max = $rows['max_student'];
        }
        else
        {
          $max = 0;
        }


        $count++;
        $lechrfrom = new DateTime($rows['lecturehr_from']);
        $lechrto = new DateTime($rows['lecturehr_to']);
        $labhrfrom = new DateTime($rows['laboratoryhr_from']);
        $labhrto = new DateTime($rows['laboratoryhr_to']);

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

        
        if($num['num'] >= $max && $rows['section'] != 'Petition')
        {
           $output = '<tr style="background-color:#ffa3a3"><td hidden><div class="form-check">
                  <input class="form-check-input check" type="radio" id="'.$rows['sched_id'].'" name="check[]"><span class="checkmark-check"></span>
                  <label class="form-check-label" for="'.$rows['sched_id'].'">
                    Add
                  </label>
                </div>
            </td><td><b>FULL</b></td>';
        }
        else
        {
           $output = '<tr><td><div class="form-check">
                  <input class="form-check-input check" type="radio" id="'.$rows['sched_id'].'" name="check[]"><span class="checkmark-check"></span>
                  <label class="form-check-label" for="'.$rows['sched_id'].'">
                    Add
                  </label>
                </div>
            </td>';
        }
       

        $output .= '
        <th name="sec[]" scope="row" style="white-space: nowrap;">'.$rows['section'].'</th>
        <td name="code[]" scope="row" style="white-space: nowrap;">'.$rows['subject_code'].'</td>
        <td name="title[]" style="white-space: nowrap;">'.$rows['subject_title'].'</td> 
        <td name="unit[]" style="white-space: nowrap;">'.$rows['units'].'</td>
        <td name="lecday[]" style="white-space: nowrap;">'.$rows['lecture_day'].'</td>
        <td name="lecfrom[]" style="white-space: nowrap;">'.$lechrfrom1.'</td>
        <td name="lecto[]" style="white-space: nowrap;">'.$lechrto1.'</td>
        <td name="lecroom[]" style="white-space: nowrap;">'.$rows['lec_room'].'</td>
        <td name="labday[]" style="white-space: nowrap;">'.$rows['laboratory_day'].'</td>
        <td name="labfrom[]" style="white-space: nowrap;">'.$labhrfrom1.'</td>
        <td name="labto[]" style="white-space: nowrap;">'.$labhrto1.'</td>
        <td name="labroom[]" style="white-space: nowrap;">'.$rows['lab_room'].'</td>
        <td name="studno[]" id="studno[]" style="white-space: nowrap;">'.$num['num'].'</td>
        <td name="max[]" id="max[]" style="white-space: nowrap;">'.$max.'</td>
        <td name="lechrfrom[]" style="white-space: nowrap;" hidden>'.$lechrfrom->format('H:i:s').'</td>
        <td name="lechrto[]" style="white-space: nowrap;" hidden>'.$lechrto->format('H:i:s').'</td>
        <td name="labhrfrom[]" style="white-space: nowrap;" hidden>'.$labhrfrom->format('H:i:s').'</td>
        <td name="labhrto[]" style="white-space: nowrap;" hidden>'.$labhrto->format('H:i:s').'</td>
        </tr>';
    echo $output;

      }
  }
  else
  {
    if($query == '')
    {
        $output = '<tr><th colspan="13"><center>SELECT SCHEDULE</center></th></tr>';
    }
    else
    {
        $output = '<tr><th colspan="13"><center>NO DATA FOUND</center></th></tr>';
    }
    echo $output;
  }
  exit();
 }
 //saving of created schedule by student
 if(isset($_POST['savesched']))  
 {
$data = json_decode($_POST['data']);
$studnum = $_POST['studnum'];
$total_num = count($data->sched_id);
      //get semester and school year
      $query1 = "SELECT * FROM timeframe ORDER BY id DESC";  
      $result1 = mysqli_query($conn, $query1); 
      $row = mysqli_fetch_array($result1);
      $schoolyear = $row['school_year'];
      $semester = $row['semester'];

      $delete = mysqli_query($conn, "DELETE FROM chosen_schedule WHERE school_year = '$schoolyear' AND semester = '$semester' AND student_number = '$studnum'") or die(mysqli_error($conn));

for ($i=0; $i < $total_num; $i++) 
    {
        $query = mysqli_query($conn, "INSERT INTO chosen_schedule (student_number, sched_id, school_year, semester) VALUES ('".$studnum."','".$data->sched_id[$i]."','".$schoolyear."','".$semester."');") or die(mysqli_error($conn));
    }
exit();
 } 

 //if student already created a schedule
 if(isset($_POST['createdsched']))  
 {
    $studnum = $_POST['studnum'];
    $count = 0;
    $unitcount = 0;
//timeframe for checking of school year and semester
    $sy = "SELECT * FROM timeframe ORDER BY id DESC";
    $sysem = mysqli_query($conn, $sy); 
    $syrow = mysqli_fetch_assoc($sysem); 
    $schoolyear = $syrow['school_year'];
    $semester = $syrow['semester'];
    //check if student is already enlisted or enrolled
    $check = "SELECT student_enrollment_record.student_number FROM student_enrollment_record INNER JOIN schedule ON schedule.sched_id = student_enrollment_record.sched_id where student_enrollment_record.student_number = '$studnum' AND schedule.semester = '$semester' AND schedule.school_year = '$schoolyear'";
    $check2 = mysqli_query($conn, $check)or die(mysqli_error($conn)); 

    if(mysqli_num_rows($check2) > 0)  
    {
      $query2 = "SELECT schedule.sched_id, schedule.section, subject.subject_code, schedule.lecture_day, schedule.lecturehr_from, schedule.lecturehr_to, schedule.laboratory_day, schedule.laboratoryhr_from, schedule.laboratoryhr_to, schedule.semester, schedule.lec_room, schedule.lab_room, schedule.faculty_id, subject.subject_title,subject.units, schedule.max_student from schedule 
    INNER JOIN subject ON schedule.subj_id = subject.subj_id 
    INNER JOIN student_enrollment_record ON student_enrollment_record.sched_id = schedule.sched_id
    where student_enrollment_record.student_number = '$studnum' AND schedule.semester = '$semester' AND schedule.school_year = '$schoolyear'";
    $result = mysqli_query($conn, $query2); 

    if(mysqli_num_rows($result) > 0)  
    {
      while($rows=mysqli_fetch_array($result))
      {
        //for student count
        $subjcode = $rows['subject_code'];
        $section = $rows['section'];
        $query2 = "SELECT COUNT(student_enrollment_record.student_number) AS num FROM student_enrollment_record 
        INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id
        INNER JOIN subject ON subject.subj_id = schedule.subj_id WHERE subject.subject_code = '$subjcode' && schedule.section = '$section' && schedule.school_year = '$schoolyear' && schedule.semester = '$semester'"; 
        $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn)); 
        if(mysqli_num_rows($result2) > 0)  
        {
          $num=mysqli_fetch_assoc($result2);
          $max = $rows['max_student'];
        }
        else
        {
          $max = 0;
        }

      
        $count++;
        $lechrfrom = new DateTime($rows['lecturehr_from']);
        $lechrto = new DateTime($rows['lecturehr_to']);
        $labhrfrom = new DateTime($rows['laboratoryhr_from']);
        $labhrto = new DateTime($rows['laboratoryhr_to']);

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


        
        $output = '<tr class="tr'.$count.'" id="'.$count.'">
        <td><button type="button" class="btn btn-danger d-flex align-items-center remove" id="'.$count.'"><i class="fas fa-trash-alt"></i>&nbsp;Remove</button></td>
        <th name="sec'.$count.'" scope="row" style="white-space: nowrap;">'.$rows['section'].'</th>
        <th id="schedid'.$count.'" hidden>'.$rows['sched_id'].'</th>
        <td name="code'.$count.'" id="code'.$count.'" scope="row" style="white-space: nowrap;">'.$rows['subject_code'].'</td>
        <td name="title'.$count.'" style="white-space: nowrap;">'.$rows['subject_title'].'</td> 
        <td name="unit'.$count.'" id="unit'.$count.'" style="white-space: nowrap;">'.$rows['units'].'</td>
        <td name="lecday'.$count.'" id="lecday'.$count.'" style="white-space: nowrap;">'.$rows['lecture_day'].'</td>
        <td name="lecfrom'.$count.'" id="lecfrom'.$count.'" style="white-space: nowrap;">'.$lechrfrom1.'</td>
        <td name="lecto'.$count.'" id="lecto'.$count.'" style="white-space: nowrap;">'.$lechrto1.'</td>
        <td name="lecroom'.$count.'" id="lecroom'.$count.'" style="white-space: nowrap;">'.$rows['lec_room'].'</td>
        <td name="labday'.$count.'" id="labday'.$count.'" style="white-space: nowrap;">'.$rows['laboratory_day'].'</td>
        <td name="labfrom'.$count.'" id="labfrom'.$count.'" style="white-space: nowrap;">'.$labhrfrom1.'</td>
        <td name="labto'.$count.'" id="labto'.$count.'" style="white-space: nowrap;">'.$labhrto1.'</td>
        <td name="labroom'.$count.'" id="labroom'.$count.'" style="white-space: nowrap;">'.$rows['lab_room'].'</td>
        <td name="studno'.$count.'" id="studno'.$count.'" style="white-space: nowrap;">'.$num['num'].'</td>
        <td name="max'.$count.'" id="max'.$count.'" style="white-space: nowrap;">'.$max.'</td>
        <td name="lechrfrom'.$count.'" id="lechrfrom'.$count.'" style="white-space: nowrap;" hidden>'.$lechrfrom->format('H:i:s').'</td>
        <td name="lechrto'.$count.'" id="lechrto'.$count.'" style="white-space: nowrap;" hidden>'.$lechrto->format('H:i:s').'</td>
        <td name="labhrfrom'.$count.'" id="labhrfrom'.$count.'" style="white-space: nowrap;" hidden>'.$labhrfrom->format('H:i:s').'</td>
        <td name="labhrto'.$count.'" id="labhrto'.$count.'" style="white-space: nowrap;" hidden>'.$labhrto->format('H:i:s').'</td>';
        $unitcount = $unitcount + $rows['units']; 
        echo $output;

      }
  }
  else
  {
    $output = '';
    echo $output;
  }
  }
  else
  {
    $query2 = "SELECT schedule.sched_id, schedule.section, subject.subject_code, schedule.lecture_day, schedule.lecturehr_from, schedule.lecturehr_to, schedule.laboratory_day, schedule.laboratoryhr_from, schedule.laboratoryhr_to, schedule.semester, schedule.lec_room, schedule.lab_room, schedule.faculty_id, schedule.max_student, subject.subject_title,subject.units from schedule 
    INNER JOIN subject ON schedule.subj_id = subject.subj_id 
    INNER JOIN chosen_schedule ON chosen_schedule.sched_id = schedule.sched_id
    where chosen_schedule.student_number = '$studnum' AND schedule.semester = '$semester' AND schedule.school_year = '$schoolyear'";
    $result = mysqli_query($conn, $query2); 

    if(mysqli_num_rows($result) > 0)  
    {
      while($rows=mysqli_fetch_array($result))
      {
        //for student count
        $subjcode = $rows['subject_code'];
        $section = $rows['section'];
        $query2 = "SELECT COUNT(student_enrollment_record.student_number) AS num FROM student_enrollment_record 
        INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id
        INNER JOIN subject ON subject.subj_id = schedule.subj_id WHERE subject.subject_code = '$subjcode' && schedule.section = '$section' && schedule.school_year = '$schoolyear' && schedule.semester = '$semester'"; 
        $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn)); 
        if(mysqli_num_rows($result2) > 0)  
        {
          $num=mysqli_fetch_assoc($result2);
          $max = $rows['max_student'];
        }
        else
        {
          $max = 0;
        }

        $count++;
        $lechrfrom = new DateTime($rows['lecturehr_from']);
        $lechrto = new DateTime($rows['lecturehr_to']);
        $labhrfrom = new DateTime($rows['laboratoryhr_from']);
        $labhrto = new DateTime($rows['laboratoryhr_to']);

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

        
        if($num['num'] < $max && $rows['section'] != 'Petition')
        {
           $output = '<tr class="tr'.$count.'" id="'.$count.'">
            <td><button type="button" class="btn btn-danger d-flex align-items-center remove" id="'.$count.'"><i class="fas fa-trash-alt"></i>&nbsp;Remove</button></td>';
        }
        else
        {
           $output = '<tr class="tr'.$count.'" id="'.$count.'" style="background-color:#ff6b6b">
            <td><button type="button" class="btn btn-danger d-flex align-items-center remove" id="'.$count.'"><i class="fas fa-trash-alt"></i>&nbsp;Remove</button></td>';
        }
       
        $output .= '<th name="sec'.$count.'" scope="row" style="white-space: nowrap;">'.$rows['section'].'</th>
        <th id="schedid'.$count.'" hidden>'.$rows['sched_id'].'</th>
        <td name="code'.$count.'" id="code'.$count.'" scope="row" style="white-space: nowrap;">'.$rows['subject_code'].'</td>
        <td name="title'.$count.'" style="white-space: nowrap;">'.$rows['subject_title'].'</td> 
        <td name="unit'.$count.'" id="unit'.$count.'" style="white-space: nowrap;">'.$rows['units'].'</td>
        <td name="lecday'.$count.'" id="lecday'.$count.'" style="white-space: nowrap;">'.$rows['lecture_day'].'</td>
        <td name="lecfrom'.$count.'" id="lecfrom'.$count.'" style="white-space: nowrap;">'.$lechrfrom1.'</td>
        <td name="lecto'.$count.'" id="lecto'.$count.'" style="white-space: nowrap;">'.$lechrto1.'</td>
        <td name="lecroom'.$count.'" id="lecroom'.$count.'" style="white-space: nowrap;">'.$rows['lec_room'].'</td>
        <td name="labday'.$count.'" id="labday'.$count.'" style="white-space: nowrap;">'.$rows['laboratory_day'].'</td>
        <td name="labfrom'.$count.'" id="labfrom'.$count.'" style="white-space: nowrap;">'.$labhrfrom1.'</td>
        <td name="labto'.$count.'" id="labto'.$count.'" style="white-space: nowrap;">'.$labhrto1.'</td>
        <td name="labroom'.$count.'" id="labroom'.$count.'" style="white-space: nowrap;">'.$rows['lab_room'].'</td>
        <td name="studno'.$count.'" id="studno'.$count.'" style="white-space: nowrap;">'.$num['num'].'</td>
        <td name="max'.$count.'" id="max'.$count.'" style="white-space: nowrap;">'.$max.'</td>
        <td name="lechrfrom'.$count.'" id="lechrfrom'.$count.'" style="white-space: nowrap;" hidden>'.$lechrfrom->format('H:i:s').'</td>
        <td name="lechrto'.$count.'" id="lechrto'.$count.'" style="white-space: nowrap;" hidden>'.$lechrto->format('H:i:s').'</td>
        <td name="labhrfrom'.$count.'" id="labhrfrom'.$count.'" style="white-space: nowrap;" hidden>'.$labhrfrom->format('H:i:s').'</td>
        <td name="labhrto'.$count.'" id="labhrto'.$count.'" style="white-space: nowrap;" hidden>'.$labhrto->format('H:i:s').'</td>';
        $unitcount = $unitcount + $rows['units']; 
        echo $output;
      }

      }
  else
  {
    $output = '';
    echo $output;
  }
  }
  echo '<td id="unitcount" value="'.$unitcount.'" hidden>'.$unitcount.'</td></tr>';
  exit();
 }
?>