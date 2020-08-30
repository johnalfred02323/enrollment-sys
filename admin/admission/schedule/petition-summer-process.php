<?php
include('../../../config/config.php');

if(isset($_POST['viewpetsched'])){
$subjcode = $_POST['subjcode'];
$leadcount=0;
 $query = "SELECT schedule.subj_id, subject.subject_code, schedule.lecture_day, schedule.lecturehr_from, schedule.lecturehr_to, schedule.laboratory_day, schedule.laboratoryhr_from, schedule.laboratoryhr_to, schedule.lec_room, schedule.lab_room, schedule.faculty_id, subject.subject_title,subject.units from schedule 
    INNER JOIN subject ON schedule.subj_id = subject.subj_id 
    where schedule.subj_id ='$subjcode' AND subject.status = 'Active' AND schedule.section = 'Petition'";
    $result = mysqli_query($conn, $query); 

    if(mysqli_num_rows($result) > 0)  
    {
	   	while($rows=mysqli_fetch_array($result))
	    {
	    	$subcode = $rows['subject_code'];
            if($subcode == 'LEAD 1')
            {
              $leadcount++;
            }
            if($leadcount > 1 && $subcode == "LEAD 1")
            {

            }
            else
            {
			      $lechrfrom = new DateTime($rows['lecturehr_from']);
			      $lechrto = new DateTime($rows['lecturehr_to']);
			      $labhrfrom = new DateTime($rows['laboratoryhr_from']);
			      $labhrto = new DateTime($rows['laboratoryhr_to']);

			      $output = '<tr>
			      <th scope="row">'.$rows['subject_code'].'</th>
			      <td>'.$rows['subject_title'].'</td> 
			      <td>'.$rows['units'].'</td>
			      <td>'.$rows['lecture_day'].'</td>
			      <td>'.$lechrfrom->format('h:ia').'-'.$lechrto->format('h:ia').'</td>
			      <td>'.$rows['lec_room'].'</td>
			      <td>'.$rows['laboratory_day'].'</td>
			      <td>'.$labhrfrom->format('h:ia').'-'.$labhrto->format('h:ia').'</td>
			      <td>'.$rows['lab_room'].'</td>
			      <td>'.$rows['faculty_id'].'</td>       
			      </tr>';
				  echo $output;
			}

    	}
	}
	else
	{
		$output = '<tr><th colspan="9">NO SCHEDULE</th></tr>';
		echo $output;
	}
	exit();
}

if(isset($_POST['viewpetitionsched'])){
 $query1 = "SELECT * FROM schedule ORDER BY sched_id DESC";  
      $result1 = mysqli_query($conn, $query1); 
      $row = mysqli_fetch_array($result1);
      $cou = 0;
      $leadcount = 0;
      $semester = $row['semester'];
      $sy = $row['school_year'];
      if($semester == "First Semester"){ $yrsem = "2ndyr1stsem"; }
      else { $yrsem = "2ndyr2ndsem";}
    $query = "SELECT DISTINCT schedule.section, schedule.subj_id, subject.subject_code, subject.subject_title From schedule 
    INNER JOIN subject ON schedule.subj_id = subject.subj_id
    INNER JOIN curriculum ON subject.curriculum_title = curriculum.curriculum_title where schedule.section = 'Petition' AND schedule.semester = '$semester' AND schedule.school_year = '$sy' GROUP BY schedule.subj_id";
    $result = mysqli_query($conn, $query); 

    if(mysqli_num_rows($result) > 0)  
    {
	   	while($rows=mysqli_fetch_array($result))
	    {	
			  $output = '<tr>
		      <th scope="row" id="code'.$cou.'">'.$rows['subject_code'].'</th>
		      <td>'.$rows['subject_title'].'</td> 
		      <td id="section'.$cou.'">'.$rows['section'].'</td>
		      <td><button id="'.$cou.'" class="view-user pull-xs-right view" data-toggle="modal" data-target="#view-modal" ripple><i class="fas fa-eye"></i> VIEW</button>
      			  <button id="e'.$cou.'" class="edit-user pull-xs-right edit" ripple><i class="fas fa-edit"></i> EDIT</button>
      		  </td>   
		      </tr>';
			  echo $output;
			
	    }
	}
	else
	{
		$output = '<tr><th colspan="9"><center>NO SCHEDULE FOR PETITION</center></th></tr>';
		echo $output;
	}
	exit();
}

if(isset($_POST['createpetitionsched']))
{
	 $subid = $_POST['subid'];
	 $subcode = $_POST['subcode'];
     $lecday = $_POST['lecday'];
     $lecfrom = $_POST['lecfrom'];
     $lecto = $_POST['lecto'];
     $labday = $_POST['labday'];
     $labfrom = $_POST['labfrom'];
     $labto = $_POST['labto'];
     $lecroom = $_POST['lecroom'];
     $labroom = $_POST['labroom'];
     $faculty = $_POST['faculty'];
     $schoolyear = $_POST['schoolyear'];
     $semester = $_POST['semester'];

	$check = mysqli_query($conn, "SELECT * FROM schedule WHERE school_year = '".$schoolyear."' AND section='Petition' AND subj_id='".$subid."' AND semester='".$semester."'") or die(mysqli_error($conn));
	$row = mysqli_num_rows($check);

	if($row == 1) {
		$query = mysqli_query($conn, "UPDATE schedule SET section = 'Petition', subject_code = '".$subid."', lecture_day = '".$lecday."', lecturehr_from = '".$lecfrom."', lecturehr_to = '".$lecto."', laboratory_day = '".$labday."', laboratoryhr_from = '".$labfrom."', laboratoryhr_to = '".$labto."', lec_room = '".$lecroom."', lab_room = '".$labroom."', faculty_id = '".$faculty."', school_year = '".$schoolyear."', semester = '".$semester."' WHERE section = 'Petition' AND school_year = '".$schoolyear."' AND subject_code='".$subcode."';") or die(mysqli_error($conn));
	}
	else {
		$query = mysqli_query($conn, "INSERT INTO schedule (section, subj_id, 	lecture_day, lecturehr_from,	lecturehr_to, laboratory_day,	laboratoryhr_from, laboratoryhr_to, lec_room, lab_room, faculty_id, school_year, semester) VALUES ('Petition','".$subid."','".$lecday."','".$lecfrom."','".$lecto."','".$labday."','".$labfrom."','".$labto."','".$lecroom."','".$labroom."','".$faculty."','".$schoolyear."','".$semester."');") or die(mysqli_error($conn));
		
		$check1 = mysqli_query($conn, "SELECT * FROM schedule ORDER BY sched_id DESC") or die(mysqli_error($conn));
		$row1 = mysqli_fetch_assoc($check1);

		$query = mysqli_query($conn, "UPDATE petition_request SET status = 'Approved', sched_id='".$row1['sched_id']."' WHERE subject_code = '".$subcode."' AND status = 'Requested';") or die(mysqli_error($conn));
	}
	exit();
}
?>