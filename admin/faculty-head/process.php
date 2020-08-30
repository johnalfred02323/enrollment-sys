<?php
require '../../config/config.php';

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

      exit();  
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


//for school year
if(isset($_POST['sysem'])) {
    //timeframe for checking of school year and semester
    $sy = "SELECT * FROM timeframe ORDER BY id DESC";
    $sysem = mysqli_query($conn, $sy); 
    $syrow = mysqli_fetch_assoc($sysem); 
    $schoolyear = $syrow['school_year'];
    $semester = $syrow['semester'];
      echo json_encode(array('semester' => $semester ,'schoolyear' => $schoolyear));
  exit();
}

//for the index.php view
if(isset($_POST['viewsched'])){
$section = $_POST['section'];
$sy = $_POST['sy'];
$sem = $_POST['sem'];
 $query = "SELECT subject.subject_code, schedule.lecture_day, schedule.lecturehr_from, schedule.lecturehr_to, schedule.laboratory_day, schedule.laboratoryhr_from, schedule.laboratoryhr_to, schedule.semester, schedule.lec_room, schedule.lab_room,  CONCAT(user.lastname,', ',user.firstname,' ', LEFT(user.middlename, 1),'. ') AS fullname, subject.subject_title,subject.units from schedule 
    INNER JOIN subject ON schedule.subj_id = subject.subj_id 
    INNER JOIN user ON user.id = schedule.faculty_id
    where schedule.section ='$section' AND schedule.semester = '$sem' AND schedule.school_year = '$sy'";
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
          $labhr = '';
        }
        else
        {
          $labhr = $labhrfrom->format('h:ia')."-".$labhrto->format('h:ia');
        }

         if( $lechrto->format('h:ia') == '12:00am' && $lechrfrom->format('h:ia') == '12:00am')
        {
          $lechr = '';
        }
        else
        {
          $lechr = $lechrfrom->format('h:ia')."-".$lechrto->format('h:ia');
        }


        $output = '<tr>
        <th scope="row" style="white-space: nowrap;">'.$rows['subject_code'].'</th>
        <td style="white-space: nowrap;">'.$rows['subject_title'].'</td> 
        <td style="white-space: nowrap;">'.$rows['units'].'</td>
        <td style="white-space: nowrap;">'.$rows['lecture_day'].'</td>
        <td style="white-space: nowrap;">'.$lechr.'</td>
        <td style="white-space: nowrap;">'.$rows['lec_room'].'</td>
        <td style="white-space: nowrap;">'.$rows['laboratory_day'].'</td>
        <td style="white-space: nowrap;">'.$labhr.'</td>
        <td style="white-space: nowrap;">'.$rows['lab_room'].'</td>
        <td style="white-space: nowrap;">'.$rows['fullname'].'</td>     
        <td style="white-space: nowrap;"></td>        
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
?>