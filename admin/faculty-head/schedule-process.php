<?php   
require '../../config/config.php';

 // Fourth-Year
if(isset($_POST['viewschedule-1styr']))  
 {
    //timeframe for checking of school year and semester
    $sy = "SELECT * FROM timeframe ORDER BY id DESC";
    $sysem = mysqli_query($conn, $sy); 
    $syrow = mysqli_fetch_assoc($sysem); 
    $schoolyear = $syrow['school_year'];
    $semester = $syrow['semester'];
    $year = $_POST['firstyear'];
    $course = $_POST['course'];
    $major = $_POST['major'];


    $query = "SELECT schedule.sched_id, schedule.section, schedule.semester, schedule.school_year, course.course_major AS major,course.course_abbreviation AS course,year_and_semester.year FROM schedule LEFT JOIN subject ON subject.subj_id =  schedule.subj_id LEFT JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title LEFT JOIN course ON course.course_id = curriculum.course_id LEFT JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id WHERE schedule.school_year = '$schoolyear' AND schedule.semester = '$semester' AND year_and_semester.year = '$year' AND schedule.section !='Petition' AND course.course_abbreviation ='$course' AND course.course_major = '$major' GROUP BY section,school_year,semester";

    $result = mysqli_query($conn, $query) OR die(mysqli_error($conn)); 
    if(mysqli_num_rows($result) > 0)  
    {
      while($row = mysqli_fetch_array($result))
        {
           $output ='<tr >
                <td nowrap>'.$row['section'].'</td>
                <td nowrap><button id="'.$row['section'].'" class="view-user pull-xs-right view1" data-toggle="modal" data-target="#view-mdoal" ripple><i class="fas fa-eye"></i> VIEW</button>
              </tr>';
            echo $output;
        }
      }

 }
 // Fourth-Year
if(isset($_POST['viewschedule-2ndyr']))  
 {
    //timeframe for checking of school year and semester
    $sy = "SELECT * FROM timeframe ORDER BY id DESC";
    $sysem = mysqli_query($conn, $sy); 
    $syrow = mysqli_fetch_assoc($sysem); 
    $schoolyear = $syrow['school_year'];
    $semester = $syrow['semester'];
    $year = $_POST['secondyear'];
    $course = $_POST['course'];
    $major = $_POST['major'];


    $query = "SELECT schedule.sched_id, schedule.section, schedule.semester, schedule.school_year, course.course_major AS major,course.course_abbreviation AS course, year_and_semester.year FROM schedule LEFT JOIN subject ON subject.subj_id =  schedule.subj_id LEFT JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title LEFT JOIN course ON course.course_id = curriculum.course_id LEFT JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id WHERE schedule.school_year = '$schoolyear' AND schedule.semester = '$semester' AND year_and_semester.year = '$year' AND schedule.section !='Petition' AND course.course_abbreviation ='$course' AND course.course_major = '$major' GROUP BY section,school_year,semester";

    $result = mysqli_query($conn, $query) OR die(mysqli_error($conn)); 
    if(mysqli_num_rows($result) > 0)  
    {
      while($row = mysqli_fetch_array($result))
        {
           $output ='<tr >
                <td nowrap>'.$row['section'].'</td>
                <td nowrap><button id="'.$row['section'].'" class="view-user pull-xs-right view2" data-toggle="modal" data-target="#view-mdoal" ripple><i class="fas fa-eye"></i> VIEW</button>
              </tr>';
            echo $output;
        }
      }

 }
 // Fourth-Year
if(isset($_POST['viewschedule-3rdyr']))  
 {
    //timeframe for checking of school year and semester
    $sy = "SELECT * FROM timeframe ORDER BY id DESC";
    $sysem = mysqli_query($conn, $sy); 
    $syrow = mysqli_fetch_assoc($sysem); 
    $schoolyear = $syrow['school_year'];
    $semester = $syrow['semester'];
    $year = $_POST['thirdyear'];
    $course = $_POST['course'];
    $major = $_POST['major'];


    $query = "SELECT schedule.sched_id, schedule.section, schedule.semester, schedule.school_year, course.course_major AS major,course.course_abbreviation AS course,year_and_semester.year FROM schedule LEFT JOIN subject ON subject.subj_id =  schedule.subj_id LEFT JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title LEFT JOIN course ON course.course_id = curriculum.course_id LEFT JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id WHERE schedule.school_year = '$schoolyear' AND schedule.semester = '$semester' AND year_and_semester.year = '$year' AND schedule.section !='Petition' AND course.course_abbreviation ='$course' AND course.course_major = '$major' GROUP BY section,school_year,semester";

    $result = mysqli_query($conn, $query) OR die(mysqli_error($conn)); 
    if(mysqli_num_rows($result) > 0)  
    {
      while($row = mysqli_fetch_array($result))
        {
           $output ='<tr >
                <td nowrap>'.$row['section'].'</td>
                <td nowrap><button id="'.$row['section'].'" class="view-user pull-xs-right view3" data-toggle="modal" data-target="#view-mdoal" ripple><i class="fas fa-eye"></i> VIEW</button>
              </tr>';
            echo $output;
        }
      }

 }
 // Fourth-Year
if(isset($_POST['viewschedule-4thyr']))  
 {
    //timeframe for checking of school year and semester
    $sy = "SELECT * FROM timeframe ORDER BY id DESC";
    $sysem = mysqli_query($conn, $sy); 
    $syrow = mysqli_fetch_assoc($sysem); 
    $schoolyear = $syrow['school_year'];
    $semester = $syrow['semester'];
    $year = $_POST['fourthyear'];
    $course = $_POST['course'];
    $major = $_POST['major'];


    $query = "SELECT schedule.sched_id, schedule.section, schedule.semester, schedule.school_year, course.course_major AS major,course.course_abbreviation AS course,year_and_semester.year FROM schedule LEFT JOIN subject ON subject.subj_id =  schedule.subj_id LEFT JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title LEFT JOIN course ON course.course_id = curriculum.course_id LEFT JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id WHERE schedule.school_year = '$schoolyear' AND schedule.semester = '$semester' AND year_and_semester.year = '$year' AND schedule.section !='Petition' AND course.course_abbreviation ='$course' AND course.course_major = '$major' GROUP BY section,school_year,semester";

    $result = mysqli_query($conn, $query) OR die(mysqli_error($conn)); 
    if(mysqli_num_rows($result) > 0)  
    {
      while($row = mysqli_fetch_array($result))
        {
           $output ='<tr >
                <td nowrap>'.$row['section'].'</td>
                <td nowrap><button id="'.$row['section'].'" class="view-user pull-xs-right view4" data-toggle="modal" data-target="#view-mdoal" ripple><i class="fas fa-eye"></i> VIEW</button>
              </tr>';
            echo $output;
        }
      }

 }
 // Fourth-Year
if(isset($_POST['viewschedule-5thyr']))  
 {
    //timeframe for checking of school year and semester
    $sy = "SELECT * FROM timeframe ORDER BY id DESC";
    $sysem = mysqli_query($conn, $sy); 
    $syrow = mysqli_fetch_assoc($sysem); 
    $schoolyear = $syrow['school_year'];
    $semester = $syrow['semester'];
    $year = $_POST['fifthyear'];
    $course = $_POST['course'];
    $major = $_POST['major'];


    $query = "SELECT schedule.sched_id, schedule.section, schedule.semester, schedule.school_year, course.course_major AS major,course.course_abbreviation AS course,year_and_semester.year FROM schedule LEFT JOIN subject ON subject.subj_id =  schedule.subj_id LEFT JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title LEFT JOIN course ON course.course_id = curriculum.course_id LEFT JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id WHERE schedule.school_year = '$schoolyear' AND schedule.semester = '$semester' AND year_and_semester.year = '$year' AND schedule.section !='Petition' AND course.course_abbreviation ='$course' AND course.course_major = '$major' GROUP BY section,school_year,semester";

    $result = mysqli_query($conn, $query) OR die(mysqli_error($conn)); 
    if(mysqli_num_rows($result) > 0)  
    {
      while($row = mysqli_fetch_array($result))
        {
           $output ='<tr >
                <td nowrap>'.$row['section'].'</td>
                <td nowrap><button id="'.$row['section'].'" class="view-user pull-xs-right view5" data-toggle="modal" data-target="#view-mdoal" ripple><i class="fas fa-eye"></i> VIEW</button>
              </tr>';
            echo $output;
        }
      }

 }
 // Fourth-Year
if(isset($_POST['viewschedule-petition']))  
 {
    //timeframe for checking of school year and semester
    $sy = "SELECT * FROM timeframe ORDER BY id DESC";
    $sysem = mysqli_query($conn, $sy); 
    $syrow = mysqli_fetch_assoc($sysem); 
    $schoolyear = $syrow['school_year'];
    $semester = $syrow['semester'];
    $year = $_POST['petition'];


    $query = " SELECT schedule.sched_id, subject.subject_code, subject.subject_title, subject.units, schedule.school_year, schedule.section, schedule.semester, year_and_semester.year As Year FROM schedule INNER JOIN subject ON subject.subj_id =  schedule.subj_id INNER JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id  WHERE schedule.school_year = '$schoolyear' AND schedule.semester = '$semester' AND schedule.section ='Petition'";

    $result = mysqli_query($conn, $query) OR die(mysqli_error($conn)); 
    if(mysqli_num_rows($result) > 0)  
    {
      while($row = mysqli_fetch_array($result))
        {
           $output ='<tr >
                <td >'.$row['subject_code'].'</td>
                <td >'.$row['subject_title'].'</td>
                <td nowrap><button id="'.$row['sched_id'].'" class="view-user pull-xs-right viewpet" data-toggle="modal" data-target="#petition-modal" ripple><i class="fas fa-eye"></i> VIEW</button>
              </tr>';
            echo $output;
        }
      }

 }


//for the index.php view
if(isset($_POST['viewsched'])){

    //timeframe for checking of school year and semester
    $sy = "SELECT * FROM timeframe ORDER BY id DESC";
    $sysem = mysqli_query($conn, $sy); 
    $syrow = mysqli_fetch_assoc($sysem); 
    $schoolyear = $syrow['school_year'];
    $sem = $syrow['semester'];
    $section = $_POST['section'];

      $query = "SELECT subject.subject_code, schedule.lecture_day, schedule.lecturehr_from, schedule.lecturehr_to, schedule.laboratory_day, schedule.laboratoryhr_from, schedule.laboratoryhr_to, schedule.semester, schedule.lec_room, schedule.lab_room, schedule.max_student, schedule.faculty_id, subject.subject_title,subject.units from schedule 
    INNER JOIN subject ON schedule.subj_id = subject.subj_id 
    where schedule.section ='$section' AND schedule.semester = '$sem' AND schedule.school_year = '$schoolyear'";
    $result = mysqli_query($conn, $query); 

    if(mysqli_num_rows($result) > 0)  
    {
      while($rows=mysqli_fetch_array($result))
      {
        $lechrfrom = new DateTime($rows['lecturehr_from']);
        $lechrto = new DateTime($rows['lecturehr_to']);
        $labhrfrom = new DateTime($rows['laboratoryhr_from']);
        $labhrto = new DateTime($rows['laboratoryhr_to']);

        if( $labhrfrom->format('h:ia') == '12:00am' && $labhrto->format('h:ia') == '12:00am')
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
        //for student count
        $subjcode = $rows['subject_code'];
        $query2 = "SELECT COUNT(student_enrollment_record.student_number) AS num FROM student_enrollment_record INNER JOIN subject ON subject.subj_id = student_enrollment_record.subj_id INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id WHERE subject.subject_code = '$subjcode' && schedule.section = '$section' && schedule.school_year = '$schoolyear' && schedule.semester = '$sem'"; 
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

        if( $labhrfrom->format('h:ia') == '12:00am' && $labhrto->format('h:ia') == '12:00am')
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
        //for student count
        $query2 = "SELECT COUNT(student_enrollment_record.student_number) AS num FROM student_enrollment_record INNER JOIN subject ON subject.subj_id = student_enrollment_record.subj_id INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id WHERE schedule.sched_id = '$subject' && schedule.school_year = '$schoolyear' && schedule.semester = '$sem'"; 
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
        $lechrfrom = new DateTime($rows['lecturehr_from']);
        $lechrto = new DateTime($rows['lecturehr_to']);
        $labhrfrom = new DateTime($rows['laboratoryhr_from']);
        $labhrto = new DateTime($rows['laboratoryhr_to']);

       if( $labhrfrom->format('h:ia') == '12:00am' && $labhrto->format('h:ia') == '12:00am')
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
        //for student count
        $subjcode = $rows['subject_code'];
        $query2 = "SELECT COUNT(student_enrollment_record.student_number) AS num FROM student_enrollment_record INNER JOIN subject ON subject.subj_id = student_enrollment_record.subj_id INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id WHERE subject.subject_code = '$subjcode' && schedule.school_year = '$schoolyear' && schedule.semester = '$sem'"; 
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
 ?>