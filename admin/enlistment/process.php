<?php   
require '../../config/config.php';
//for lock code
if(isset($_POST['login']))  
 {
  $uname = $_POST['username'];
  $pass = $_POST['password'];

  $stmt = $pdo_conn->prepare("SELECT username, password FROM user WHERE username = ?");
  $stmt->bindParam(1, $uname);
  $stmt->execute();
  $data = $stmt->fetch();
  $password = $data['password'];
  $verify = password_verify($pass, $password);
  if($verify)
  {
    echo '0';
  }
  else
  {
    echo '1';
  }

 }

//for auto search of student number
 if(isset($_POST['autosearch']))  
 {
      $course = $_POST['course'];  
      $major = $_POST['major'];  
      $output = '';  
      $query = "SELECT student_info.student_number FROM student_info INNER JOIN course ON course.course_id = student_info.course_id WHERE (student_info.student_number LIKE '%".$_POST["query"]."%' OR Lastname LIKE '%".$_POST["query"]."%') AND course.course_abbreviation = '$course' AND course.course_major = '$major'";  
      $result = mysqli_query($conn, $query);  
      $output = '<ul class="list-unstyled" >';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li>'.$row["student_number"].'</li>';
           }  
      }  
      else  
      {  
           $output .= '<li>Student Number Not Found</li>';  
      }  
      $output .= '</ul>'; 
      echo $output;    
      exit();
 }  

//for getting student information
  if(isset($_POST['getstuddata']))  
 {  
     $output = '';  
      $query = "SELECT student_info.student_number,student_info.firstname, student_info.middlename, student_info.lastname, course.course_abbreviation AS course, course.course_major AS major FROM student_info INNER JOIN course ON course.course_id = student_info.course_id WHERE student_info.student_number LIKE '%".$_POST["query"]."%' OR Lastname LIKE '%".$_POST["query"]."%'";  
      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                 $output = '<div class="row"><div class="col-sm">Name: '.$row["lastname"].', '.$row["firstname"].' '.$row["middlename"].'</div> <div class="col-sm">Course: '.$row["course"].'</div> <div class="col-sm">Major: '.$row["major"].' </div></div>';


           }  
      }  
      else  
      {  
        if($row ="")
                 {
                  $output = '<div class="row"><div class="col-sm">Name: No Record </div> <div class="col-sm">Course: No Record </div> <div class="col-sm">Major: No Record </div></div>';
                 }
        else
        {
           $output = '<div class="row"><div class="col-sm">Name: No Record </div> <div class="col-sm">Course: No Record </div> <div class="col-sm">Major: No Record </div></div>';
        }
 
      }  
      echo $output;  
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

      $query1 = "SELECT * FROM timeframe where status='Active' AND type='enrollment'";  
      $result1 = mysqli_query($conn, $query1); 
      $row = mysqli_fetch_array($result1);
      $schoolyear = $row['school_year'];
      $semester = $row['semester'];
      //check if student is already enlisted
       $check = mysqli_query($conn, "SELECT student_enrollment_record.student_number, schedule.school_year, schedule.semester FROM student_enrollment_record INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id WHERE student_enrollment_record.student_number ='$studnum' AND schedule.school_year = '$schoolyear' AND schedule.semester = '$semester'") or die(mysqli_error($conn));
        if(mysqli_num_rows($check) > 0)
        {
          echo '0';
        }
        else
        {
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
                              $output = '<tr id="er'.$rowcount.'">
                                <td class="checked" style="display:none"><label class="container-check">
                                <input  type="checkbox" id="'.$rowcount.'"  name="subcheck[]" class=" subcheck"><span class="checkmark-check"></span></label></td>
                                <th id="sid'.$rowcount.'" hidden>'.$row1['subj_id'].'</th>
                                <th name="sc[]" id="sc'.$rowcount.'" nowrap>'.$row1['subject_code'].'</th>
                                <td id="st'.$rowcount.'" nowrap>'.$row1['subject_title'].'</td>
                                <td nowrap>'.$row1['year'].'</td>
                                <td nowrap>'.$row1['lecture'].'</td>
                                <td nowrap>'.$row1['laboratory'].'</td>
                                <td id="un'.$rowcount.'" nowrap>'.$row1['units'].'</td>
                                <td nowrap>'.$row1['pre_requisite'].'</td>
                                <td nowrap class="availbtn"><button id="'.$rowcount.'" class="view-user pull-xs-right edit scheddetail" data-toggle="modal" data-target="#available-modal" ripple><i class="fas fa-eye"></i> SCHEDULE</button></td>
                                </tr>';
                              echo $output;
                      }
                    }
                    else
                    {
                      if($prereq == 'None' || $prereq == 'First Year' || $prereq == 'Second Year' || $prereq == 'Third Year' || $prereq == 'Fourth Year' || $prereq == 'Fifth Year' )
                          {
                            $rowcount++;
                              $output = '<tr id="er'.$rowcount.'">
                              <td class="checked" style="display:none"><label class="container-check">
                                <input  type="checkbox" id="check'.$rowcount.'"  name="subcheck[]" class=" subcheck"><span class="checkmark-check"></span></label></td>
                                <th id="sid'.$rowcount.'" hidden>'.$row1['subj_id'].'</th>
                                <th name="sc[]" id="sc'.$rowcount.'" nowrap>'.$row1['subject_code'].'</th>
                                <td id="st'.$rowcount.'" nowrap>'.$row1['subject_title'].'</td>
                                <td nowrap>'.$row1['year'].'</td>
                                <td nowrap>'.$row1['lecture'].'</td>
                                <td nowrap>'.$row1['laboratory'].'</td>
                                <td id="un'.$rowcount.'" nowrap>'.$row1['units'].'</td>
                                <td nowrap>'.$row1['pre_requisite'].'</td>
                                <td nowrap class="availbtn"><button id="'.$rowcount.'" class="view-user pull-xs-right edit scheddetail" data-toggle="modal" data-target="#available-modal" ripple><i class="fas fa-eye"></i> SCHEDULE</button></td>
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
        }
}


//for getting schedule of a subject
if(isset($_POST['getscheddata']))  
{
      $subjectcode = $_POST['subjectcode'];
      $subjtitle = $_POST['subjtitle'];
      $units = $_POST['units'];
      $rowid = $_POST['rowid'];
      $output='';
      $count = 0;
      //get semester and school year
       $query1 = "SELECT * FROM timeframe where status='Active' AND type='enrollment'";  
      $result1 = mysqli_query($conn, $query1); 
      $row = mysqli_fetch_array($result1);
      $schoolyear = $row['school_year'];
      $semester = $row['semester'];
      //get schedule
      $query = "SELECT DISTINCT subject.subj_id, schedule.sched_id, schedule.section, course.course_abbreviation AS course, course.course_major AS major,  schedule.lecture_day, schedule.lecturehr_from,  schedule.lecturehr_to, schedule.laboratory_day, schedule.laboratoryhr_from, schedule.laboratoryhr_to, schedule.lec_room, schedule.lab_room, schedule.max_student From schedule INNER JOIN subject ON schedule.subj_id = subject.subj_id INNER JOIN  curriculum ON subject.curriculum_title = curriculum.curriculum_title INNER JOIN  course ON course.course_id = curriculum.course_id where subject.subject_code='$subjectcode' AND schedule.semester='$semester' AND schedule.school_year='$schoolyear'";  
      $result = mysqli_query($conn, $query); 
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
                 $output = '<div id="er" hidden>'.$rowid.'</div><div id="scode" hidden>'.$row['subj_id'].'</div><div id="stitle" hidden>'.$subjtitle.'</div><div id="unit" hidden>'.$units.'</div>
              <tr><th scope="row">FULL</th>';
              }
              else
              {
                 $output = '<div id="er" hidden>'.$rowid.'</div><div id="scode" hidden>'.$row['subj_id'].'</div><div id="stitle" hidden>'.$subjtitle.'</div><div id="unit" hidden>'.$units.'</div>
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

//edit including adding, dropping and change of schedule
if(isset($_POST['edit-stud-enrollment-data']))  
{
  $id = $_POST['id'];
  $totalunit = 0;
  $count = 0;

      //get semester and school year
       $query1 = "SELECT * FROM timeframe where status='Active' AND type='enrollment'";  
      $result1 = mysqli_query($conn, $query1); 
      $row = mysqli_fetch_array($result1);
      $schoolyear = $row['school_year'];
      $semester = $row['semester'];

  $query = "SELECT student_enrollment_record.id, student_enrollment_record.sched_id, subject.subj_id, subject.subject_code, subject.subject_title, subject.units, schedule.section, course.course_abbreviation AS course, course.course_major AS major, schedule.lecture_day, schedule.lecturehr_from,  schedule.lecturehr_to, schedule.laboratory_day, schedule.laboratoryhr_from, schedule.laboratoryhr_to, schedule.lec_room, schedule.lab_room FROM student_enrollment_record INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id 
    INNER JOIN subject ON subject.subj_id = schedule.subj_id 
    INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title 
    INNER JOIN course ON curriculum.course_id = course.course_id 
    WHERE student_enrollment_record.student_number='$id' AND schedule.semester='$semester' AND schedule.school_year='$schoolyear' ";
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
              <th colspan="10" id="hide'.$count.'" style="display:none; text-align:right">Subject (" '.$row['subject_code'].'- '.$row['subject_title'].' ") will be Dropped</th>
              <th colspan="5" id="hide2'.$count.'" style="display:none">
              <button id="'.$count.'" class="delete-user pull-xs-right undo" ripple><i class="fas fa-undo-alt"></i> UNDO</button></th>
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
              <td nowrap id="'.$count.'" name="'.$row['id'].'"><button id="'.$count.'" name="'.$row['id'].'" class="edit-user pull-xs-right changesched" data-toggle="modal" data-target="#available-modal1" ripple><i class="fas fa-edit"></i> Change</button> <button id="'.$count.'" name="'.$row['id'].'" class="delete-user pull-xs-right drop" data-toggle="modal" data-target="#yesorno" ripple><i class="fas fa-trash-alt"></i> DROP</button></td></tr>';
            echo $output;
        }
    }
  else
    {
        $output = '<tr><th colspan="15"><center> NO DATA </center></th></tr>';
        echo $output;
    }
    exit();
}

//get student name
 if(isset($_POST['studentname']))  
{
  $id = $_POST['id'];

  $query = "SELECT student_info.firstname, student_info.lastname, student_info.middlename, student_info.student_number, course.course_abbreviation AS course, course.course_major AS major FROM student_info INNER JOIN course ON course.course_id = student_info.course_id WHERE student_info.student_number='$id'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  $studnum = $row['student_number'];
  $firstname = $row['firstname'];
  $lastname = $row['lastname'];
  $middlename = $row['middlename'];
  $course = $row['course'];
  $major = $row['major'];

  echo json_encode(array('student_number' => $studnum ,'firstname' => $firstname ,'lastname' => $lastname,'middlename' => $middlename,'course' => $course,'major' => $major));
}

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
    }
    if($majorcount == 0){echo $output;}
      else {echo '<option>No Major</option>';}
        
}

//for year
if(isset($_POST['year'])) {
  $course = $_POST['course'];
   $query = "SELECT DISTINCT course_year FROM course where course_abbreviation = '$course'";
   $result = mysqli_query($conn, $query); 
    if($count=mysqli_num_rows($result) > 0)  
    {
    while($rows=mysqli_fetch_array($result))
    {
      if($rows['course_year'] > 4)
      {
        echo '1';
      }
      else
      {
        echo '0';
      }
    }
    }
    exit();
}

//for getting students created schedule
if(isset($_POST['getstudsched']))  
{
      $count = 0;
      $query = $_POST['query'];
      //get semester and school year
      $query1 = "SELECT * FROM timeframe where status='Active' AND type='enrollment'";  
      $result1 = mysqli_query($conn, $query1); 
      $row = mysqli_fetch_array($result1);
      $schoolyear = $row['school_year'];
      $semester = $row['semester'];
      //get schedule
      $query = "SELECT subject.subj_id, subject.subject_code,subject.subject_title, subject.units, schedule.sched_id, schedule.section, course.course_abbreviation AS course, course.course_major AS major, schedule.sched_id,  schedule.lecture_day, schedule.lecturehr_from,  schedule.lecturehr_to, schedule.laboratory_day, schedule.laboratoryhr_from, schedule.laboratoryhr_to, schedule.lec_room, schedule.lab_room, schedule.max_student From schedule INNER JOIN subject ON schedule.subj_id = subject.subj_id  INNER JOIN chosen_schedule ON schedule.sched_id = chosen_schedule.sched_id INNER JOIN curriculum ON subject.curriculum_title = curriculum.curriculum_title INNER JOIN  course ON course.course_id = curriculum.course_id where chosen_schedule.student_number = '$query' AND schedule.semester='$semester' AND schedule.school_year='$schoolyear'";  
      $result = mysqli_query($conn, $query); 
      if(mysqli_num_rows($result) > 0)  
      {
        while($rows = mysqli_fetch_array($result))
          {
            $count++;
            $lechrfrom = new DateTime($rows['lecturehr_from']);
            $lechrto = new DateTime($rows['lecturehr_to']);
            $labhrfrom = new DateTime($rows['laboratoryhr_from']);
            $labhrto = new DateTime($rows['laboratoryhr_to']);

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
            
              $query2 = "SELECT COUNT(student_enrollment_record.student_number) AS num FROM student_enrollment_record 
                INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id
                INNER JOIN subject ON subject.subj_id = schedule.subj_id WHERE subject.subject_code = '".$rows['subject_code']."' AND schedule.section = '".$rows['section']."' AND schedule.school_year = '$schoolyear' AND schedule.semester = '$semester'"; 
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

                if($num['num'] >= $max && $rows['section'] != 'Petition')
                {
                  $output = '<tr><th>FULL</th>';
                }
                else
                {
                  $output = '<tr><td><label class="container-check">
                    <input  type="checkbox" name="checked[]" id="'.$rows['sched_id'].'" checked><span class="checkmark-check"></span></label></td>';
                }

              $output .='
              <th name="sid[]" hidden>'.$rows['subj_id'].'</th>
              <th name="sec[]" scope="row" style="white-space: nowrap;">'.$rows['section'].'</th>
              <td name="id[]" hidden>'.$rows['sched_id'].'</td>
              <td name="code[]" scope="row" style="white-space: nowrap;">'.$rows['subject_code'].'</td>
              <td name="title[]" style="white-space: nowrap;">'.$rows['subject_title'].'</td> 
              <td name="unit[]" style="white-space: nowrap;">'.$rows['units'].'</td>
              <td name="cou[]" style="white-space: nowrap;">'.$rows['course'].'</td>
              <td name="maj[]" style="white-space: nowrap;">'.$rows['major'].'</td>
              <td name="lecd[]" style="white-space: nowrap;">'.$rows['lecture_day'].'</td>
              <td name="lecf[]" style="white-space: nowrap;">'.$lechrfrom1.'</td>
              <td name="lect[]" style="white-space: nowrap;">'.$lechrto1.'</td>
              <td name="lecroom[]" style="white-space: nowrap;">'.$rows['lec_room'].'</td>
              <td name="labd[]" style="white-space: nowrap;">'.$rows['laboratory_day'].'</td>
              <td name="labf[]" style="white-space: nowrap;">'.$labhrfrom1.'</td>
              <td name="labt[]" style="white-space: nowrap;">'.$labhrto1.'</td>
              <td name="labroom[]" style="white-space: nowrap;">'.$rows['lab_room'].'</td>
              <td name="stud[]" nowrap>'.$num['num'].'</td>
              <td name="max[]" nowrap>'.$max.'</td>
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
          $output = '<tr><th scope="col" colspan="12"><center>NO SCHEDULE AVAILABLE</center></th></tr>';
          echo $output;
      }
      exit();
}
//if student has created his/her own schedule
if(isset($_POST['schedulecheck']))  
{
      $query = $_POST['query'];
      //get semester and school year
      $query1 = "SELECT * FROM timeframe where status='Active' AND type='enrollment'";  
      $result1 = mysqli_query($conn, $query1); 
      $row = mysqli_fetch_array($result1);
      $schoolyear = $row['school_year'];
      $semester = $row['semester'];

      $query2 = "SELECT * FROM chosen_schedule WHERE student_number = '$query' AND school_year = '$schoolyear' AND semester = '$semester'";
      $result = mysqli_query($conn, $query2); 
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

//for multiple subject choosen
if(isset($_POST['multi-section']))  
{
     $count = 0;
     $data = json_decode($_POST['data']);
     $total_num = count($data->subjcode);
      //get semester and school year
      $query1 = "SELECT * FROM timeframe where status='Active' AND type='enrollment'";  
      $result1 = mysqli_query($conn, $query1); 
      $row = mysqli_fetch_array($result1);
      $schoolyear = $row['school_year'];
      $semester = $row['semester'];

    $query2 = "SELECT DISTINCT schedule.section, course.course_abbreviation AS course, course.course_major AS major FROM schedule INNER JOIN subject ON subject.subj_id = schedule.subj_id 
    INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title 
    INNER JOIN course ON course.course_id = curriculum.course_id WHERE  schedule.school_year = '$schoolyear' AND schedule.semester = '$semester'";
    $result = mysqli_query($conn, $query2); 


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
                  $output = '<a href="#collapse'.$rows["section"].'" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <div class="d-flex align-items-center p-0">
                  <h6 class="m-0 font-weight-bold" id="multi-course'.$rows["section"].'">'.$rows["course"].'</h6>&nbsp;|&nbsp;
                  <h6 class="m-0 font-weight-bold" id="multi-major'.$rows["section"].'">'.$rows["major"].'</h6>&nbsp;|&nbsp;
                  <h6 class="m-0 font-weight-bold" id="multi-section">'.$rows["section"].'</h6>
                  <button type="button" class="delete-user delete ml-4 take" id="'.$rows["section"].'" ripple><i class="fas fa-check"></i> TAKE</button></div></a>

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

            $query = "SELECT subject.subj_id, subject.subject_code,subject.subject_title, subject.units, schedule.sched_id, schedule.section, course.course_abbreviation AS course, course.course_major AS major, schedule.sched_id,  schedule.lecture_day, schedule.lecturehr_from,  schedule.lecturehr_to, schedule.laboratory_day, schedule.laboratoryhr_from, schedule.laboratoryhr_to, schedule.lec_room, schedule.lab_room, schedule.max_student From schedule INNER JOIN subject ON schedule.subj_id = subject.subj_id INNER JOIN curriculum ON subject.curriculum_title = curriculum.curriculum_title INNER JOIN  course ON course.course_id = curriculum.course_id WHERE schedule.section = '".$rows['section']."' AND subject.subject_code = '".$data->subjcode[$i]."' AND schedule.school_year = '$schoolyear' AND schedule.semester = '$semester'";
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
 ?>  
