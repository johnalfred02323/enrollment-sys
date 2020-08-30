<?php
include('../../../config/config.php');

if(isset($_POST['firstyearsched']))
{
	$sy = $_POST['sy'];
	$sem = $_POST['sem'];
	$major = $_POST['major'];
	$course = $_POST['course'];
	$cou = 0;

      if($sem == "First Semester"){ $yrsem = "1styr1stsem"; }
      else { $yrsem = "1styr2ndsem";}

    $query = "SELECT DISTINCT schedule.section From schedule 
    INNER JOIN subject ON schedule.subj_id = subject.subj_id
    INNER JOIN curriculum ON subject.curriculum_title = curriculum.curriculum_title
    INNER JOIN course ON course.course_id = curriculum.course_id 
    where course.course_abbreviation = '$course' AND subject.yrsem_id LIKE '%".$yrsem."%' AND course.course_major = '".$major."' AND schedule.section != 'Petition' AND schedule.semester != 'Summer' AND schedule.school_year LIKE '%".$sy."%' ORDER BY schedule.section ASC";
    $result = mysqli_query($conn, $query); 
    if($count=mysqli_num_rows($result) > 0)  
    {
    while($rows=mysqli_fetch_array($result))
    { $cou++;
  
      $output = '<tr id="first'.$cou.'">
      <th scope="row" id="section1'.$cou.'">'.$rows['section'].'</th>
      <td><button id="'.$cou.'" class="view-user pull-xs-right view1" data-toggle="modal" data-target="#view-modal" ripple><i class="fas fa-eye"></i> VIEW</button>
      </td>
    </tr>';
    echo $output;
	} }
    else
    {
      $output = '<tr><th colspan="2"><center></center></th>';
    echo $output;
	}

exit();
}

if(isset($_POST['secondyearsched']))
{
	$sy = $_POST['sy'];
	$sem = $_POST['sem'];
	$major = $_POST['major'];
	$course = $_POST['course'];
	$cou = 0;

      if($sem == "First Semester"){ $yrsem = "2ndyr1stsem"; }
      else { $yrsem = "2ndyr2ndsem";}

    $query = "SELECT DISTINCT schedule.section From schedule 
    INNER JOIN subject ON schedule.subj_id = subject.subj_id
    INNER JOIN curriculum ON subject.curriculum_title = curriculum.curriculum_title
    INNER JOIN course ON course.course_id = curriculum.course_id 
    where course.course_abbreviation = '$course' AND subject.yrsem_id LIKE '%".$yrsem."%' AND course.course_major = '".$major."' AND schedule.section != 'Petition' AND schedule.semester != 'Summer' AND schedule.school_year LIKE '%".$sy."%' ORDER BY schedule.section ASC";
    $result = mysqli_query($conn, $query); 
    if($count=mysqli_num_rows($result) > 0)  
    {
    while($rows=mysqli_fetch_array($result))
    { $cou++;
  
      $output = '<tr id="second'.$cou.'">
      <th scope="row" id="section2'.$cou.'">'.$rows['section'].'</th>
      <td><button id="'.$cou.'" class="view-user pull-xs-right view2" data-toggle="modal" data-target="#view-modal" ripple><i class="fas fa-eye"></i> VIEW</button>
      </td>
    </tr>';
    echo $output;
	} }
    else
    {
      $output = '<tr><th colspan="2"><center></center></th>';
    echo $output;
	}

exit();
}

if(isset($_POST['thirdyearsched']))
{
	$sy = $_POST['sy'];
	$sem = $_POST['sem'];
	$major = $_POST['major'];
	$course = $_POST['course'];
	$cou = 0;

      if($sem == "First Semester"){ $yrsem = "3rdyr1stsem"; }
      else { $yrsem = "3rdyr2ndsem";}

    $query = "SELECT DISTINCT schedule.section From schedule 
    INNER JOIN subject ON schedule.subj_id = subject.subj_id
    INNER JOIN curriculum ON subject.curriculum_title = curriculum.curriculum_title
    INNER JOIN course ON course.course_id = curriculum.course_id 
    where course.course_abbreviation = '$course' AND subject.yrsem_id LIKE '%".$yrsem."%' AND course.course_major = '".$major."' AND schedule.section != 'Petition' AND schedule.semester != 'Summer' AND schedule.school_year LIKE '%".$sy."%' ORDER BY schedule.section ASC";
    $result = mysqli_query($conn, $query); 
    if($count=mysqli_num_rows($result) > 0)  
    {
    while($rows=mysqli_fetch_array($result))
    { $cou++;
  
      $output = '<tr id="third'.$cou.'">
      <th scope="row" id="section3'.$cou.'">'.$rows['section'].'</th>
      <td><button id="'.$cou.'" class="view-user pull-xs-right view3" data-toggle="modal" data-target="#view-modal" ripple><i class="fas fa-eye"></i> VIEW</button>
      </td>
    </tr>';
    echo $output;
	} }
    else
    {
      $output = '<tr><th colspan="2"><center></center></th>';
    echo $output;
	}

exit();
}

if(isset($_POST['fourthyearsched']))
{
	$sy = $_POST['sy'];
	$sem = $_POST['sem'];
	$major = $_POST['major'];
	$course = $_POST['course'];
	$cou = 0;

      if($sem == "First Semester"){ $yrsem = "4thyr1stsem"; }
      else { $yrsem = "4thyr2ndsem";}

    $query = "SELECT DISTINCT schedule.section From schedule 
    INNER JOIN subject ON schedule.subj_id = subject.subj_id
    INNER JOIN curriculum ON subject.curriculum_title = curriculum.curriculum_title
    INNER JOIN course ON course.course_id = curriculum.course_id 
    where course.course_abbreviation = '$course' AND subject.yrsem_id LIKE '%".$yrsem."%' AND course.course_major = '".$major."' AND schedule.section != 'Petition' AND schedule.semester != 'Summer' AND schedule.school_year LIKE '%".$sy."%' ORDER BY schedule.section ASC";
    $result = mysqli_query($conn, $query); 
    if($count=mysqli_num_rows($result) > 0)  
    {
    while($rows=mysqli_fetch_array($result))
    { $cou++;
  
      $output = '<tr id="fourth'.$cou.'">
      <th scope="row" id="section4'.$cou.'">'.$rows['section'].'</th>
      <td><button id="'.$cou.'" class="view-user pull-xs-right view4" data-toggle="modal" data-target="#view-modal" ripple><i class="fas fa-eye"></i> VIEW</button>
      </td>
    </tr>';
    echo $output;
	} }
    else
    {
      $output = '<tr><th colspan="2"><center></center></th>';
    echo $output;
	}

exit();
}

if(isset($_POST['fifthyearsched']))
{
	$sy = $_POST['sy'];
	$sem = $_POST['sem'];
	$major = $_POST['major'];
	$course = $_POST['course'];
	$cou = 0;

      if($sem == "First Semester"){ $yrsem = "5thyr1stsem"; }
      else { $yrsem = "5thyr2ndsem";}

    $query = "SELECT DISTINCT schedule.section From schedule 
    INNER JOIN subject ON schedule.subj_id = subject.subj_id
    INNER JOIN curriculum ON subject.curriculum_title = curriculum.curriculum_title
    INNER JOIN course ON course.course_id = curriculum.course_id 
    where course.course_abbreviation = '$course' AND subject.yrsem_id = '".$yrsem."' AND course.course_major = '".$major."' AND schedule.section != '	Petition' AND schedule.semester != 'Summer' AND schedule.school_year LIKE '%".$sy."%' ORDER BY schedule.section ASC";
    $result = mysqli_query($conn, $query); 
    if($count=mysqli_num_rows($result) > 0)  
    {
    while($rows=mysqli_fetch_array($result))
    { $cou++;
  
      $output = '<tr id="fifth'.$cou.'">
      <th scope="row" id="section5'.$cou.'">'.$rows['section'].'</th>
      <td><button id="'.$cou.'" class="view-user pull-xs-right view5" data-toggle="modal" data-target="#view-modal" ripple><i class="fas fa-eye"></i> VIEW</button>
      </td>
    </tr>';
    echo $output;
	} }
    else
    {
      $output = '<tr><th colspan="2"><center></center></th>';
    echo $output;
	}

exit();
}


if(isset($_POST['petitionsched']))
{
  $sy = $_POST['sy'];
  $sem = $_POST['sem'];
  $leadcount = 0;
  $cou = 0;


    $query = "SELECT DISTINCT schedule.sched_id,schedule.section, subject.subject_code, schedule.subj_id, subject.subject_title From schedule 
    INNER JOIN subject ON schedule.subj_id = subject.subj_id
    INNER JOIN curriculum ON subject.curriculum_title = curriculum.curriculum_title
    INNER JOIN course ON course.course_id = curriculum.course_id  where schedule.section = 'Petition' AND schedule.semester = '$sem' AND schedule.school_year = '$sy'";
    $result = mysqli_query($conn, $query); 

    if($count=mysqli_num_rows($result) > 0)  
    {
    while($rows=mysqli_fetch_array($result))
    {
      $schedid = $rows['sched_id'];

       $query1 = "SELECT * From student_enrollment_record WHERE sched_id = '$schedid'";
      $result1 = mysqli_query($conn, $query1); 
      $count1=mysqli_num_rows($result1);

       $cou++;
      $subcode = $rows['subj_id'];

            if($subcode == 'LEAD 1')
            {
              $leadcount++;
            }
            if($leadcount > 1 && $subcode == "LEAD 1")
            {

            }
            else
            {
            $output = '<tr>
              <th scope="row" id="code'.$cou.'">'.$rows['subject_code'].'</th>
              <td>'.$rows['subject_title'].'</td> 
              <td id="section'.$cou.'">'.$rows['section'].'</td>
              <td id="section'.$cou.'">'.$count1.'</td>
              <td><button id="'.$cou.'" class="view-user pull-xs-right view" data-toggle="modal" data-target="#view-modal" ripple><i class="fas fa-eye"></i> VIEW</button>
                  <button id="e'.$cou.'" class="edit-user pull-xs-right edit" ripple><i class="fas fa-edit"></i> EDIT</button>
                </td>   
              </tr>';
            echo $output;
            }
  } }
    else
    {
      $output = '<tr><th colspan="4"><center>NO PETITION SCHEDULE</center></th>';
    echo $output;
  }
exit();
}
?>