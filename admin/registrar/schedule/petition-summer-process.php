<?php
include('../../../config/config.php');

if(isset($_POST['viewpetsched'])){
$id = $_POST['id'];

 $query = "SELECT schedule.subj_id, subject.subject_code, schedule.lecture_day, schedule.lecturehr_from, schedule.lecturehr_to, schedule.laboratory_day, schedule.laboratoryhr_from, schedule.laboratoryhr_to, schedule.lec_room, schedule.lab_room, CONCAT(user.lastname,', ',user.firstname,' ', LEFT(user.middlename, 1),'. ') AS fullname, subject.subject_title, subject.units FROM schedule 
    INNER JOIN user ON user.id = schedule.faculty_id
    INNER JOIN subject ON schedule.subj_id = subject.subj_id 
    WHERE schedule.sched_id ='$id'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn)); 

    if(mysqli_num_rows($result) > 0)  
    {
	   	while($rows=mysqli_fetch_array($result))
	    {
	    	$query2 = "SELECT COUNT(student_enrollment_record.student_number) AS num FROM student_enrollment_record 
            INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id
            INNER JOIN subject ON subject.subj_id = schedule.subj_id 
            WHERE schedule.sched_id='$id'"; 
            $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn)); 
            if(mysqli_num_rows($result2) > 0)  
            {
                $num=mysqli_fetch_assoc($result2);
            }

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
			      <td style="white-space: nowrap;">'.$num['num'].'</td>        
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

//saving and updating of petition request
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
		$query = mysqli_query($conn, "UPDATE schedule SET section = 'Petition', subject_code = '".$subid."', lecture_day = '".$lecday."', lecturehr_from = '".$lecfrom."', lecturehr_to = '".$lecto."', laboratory_day = '".$labday."', laboratoryhr_from = '".$labfrom."', laboratoryhr_to = '".$labto."', lec_room = '".$lecroom."', lab_room = '".$labroom."', faculty_id = '".$faculty."', school_year = '".$schoolyear."', semester = '".$semester."' WHERE subject_code = '".$subid." && section = 'Petition' AND school_year = '".$schoolyear."' AND subject_code='".$subcode."';") or die(mysqli_error($conn));
	}
	else {
		$query = mysqli_query($conn, "INSERT INTO schedule (section, subj_id, 	lecture_day, lecturehr_from,	lecturehr_to, laboratory_day,	laboratoryhr_from, laboratoryhr_to, lec_room, lab_room, faculty_id, school_year, semester) VALUES ('Petition','".$subid."','".$lecday."','".$lecfrom."','".$lecto."','".$labday."','".$labfrom."','".$labto."','".$lecroom."','".$labroom."','".$faculty."','".$schoolyear."','".$semester."');") or die(mysqli_error($conn));
		
		$check1 = mysqli_query($conn, "SELECT * FROM schedule ORDER BY sched_id DESC") or die(mysqli_error($conn));
		$row1 = mysqli_fetch_assoc($check1);

		$query = mysqli_query($conn, "UPDATE petition_request SET status = 'Approved', sched_id='".$row1['sched_id']."' WHERE subject_code = '".$subcode."' AND status = 'Requested';") or die(mysqli_error($conn));
	}
	exit();
}

//viewing of summer sched
if(isset($_POST['viewsummersched'])){
$id = $_POST['id'];

 $query = "SELECT schedule.subj_id, subject.subject_code, schedule.lecture_day, schedule.lecturehr_from, schedule.lecturehr_to, schedule.laboratory_day, schedule.laboratoryhr_from, schedule.laboratoryhr_to, schedule.lec_room, schedule.lab_room, CONCAT(user.lastname,', ',user.firstname,' ', LEFT(user.middlename, 1),'. ') AS fullname, subject.subject_title,subject.units from schedule 
    INNER JOIN user ON user.id = schedule.faculty_id
    INNER JOIN subject ON schedule.subj_id = subject.subj_id 
    where schedule.section ='$id'";
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
			      <td style="white-space: nowrap; text-align:left">'.$rows['subject_title'].'</td> 
			      <td style="white-space: nowrap;">'.$rows['units'].'</td>
			      <td style="white-space: nowrap;">'.$rows['lecture_day'].'</td>
			      <td style="white-space: nowrap;">'.$lechr.'</td>
			      <td style="white-space: nowrap;">'.$rows['lec_room'].'</td>
			      <td style="white-space: nowrap;">'.$rows['laboratory_day'].'</td>
			      <td style="white-space: nowrap;">'.$labhr.'</td>
			      <td style="white-space: nowrap;">'.$rows['lab_room'].'</td>
			      <td style="white-space: nowrap;" text-align:left>'.$rows['fullname'].'</td>       
			      </tr>';
				  echo $output;
    	}
	}
	else
	{
		$output = '<tr><th colspan="10">NO SCHEDULE</th></tr>';
		echo $output;
	}
	exit();
}

//for saving and updating of summer class
if(isset($_POST['createsummersched']))
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

	$check = mysqli_query($conn, "SELECT * FROM schedule WHERE school_year = '".$schoolyear."' AND section='Summer' AND subj_id='".$subid."' AND semester='".$semester."'") or die(mysqli_error($conn));
	$row = mysqli_num_rows($check);

	if($row == 1) {
		$query = mysqli_query($conn, "UPDATE schedule SET section = 'Summer', subject_code = '".$subid."', lecture_day = '".$lecday."', lecturehr_from = '".$lecfrom."', lecturehr_to = '".$lecto."', laboratory_day = '".$labday."', laboratoryhr_from = '".$labfrom."', laboratoryhr_to = '".$labto."', lec_room = '".$lecroom."', lab_room = '".$labroom."', faculty_id = '".$faculty."', school_year = '".$schoolyear."', semester = '".$semester."' WHERE subject_code ='".$subid."' &&  section = 'Summer' AND school_year = '".$schoolyear."' AND subject_code='".$subcode."';") or die(mysqli_error($conn));
	}
	else {
		$query = mysqli_query($conn, "INSERT INTO schedule (section, subj_id, 	lecture_day, lecturehr_from,	lecturehr_to, laboratory_day,	laboratoryhr_from, laboratoryhr_to, lec_room, lab_room, faculty_id, school_year, semester) VALUES ('Summer','".$subid."','".$lecday."','".$lecfrom."','".$lecto."','".$labday."','".$labfrom."','".$labto."','".$lecroom."','".$labroom."','".$faculty."','".$schoolyear."','".$semester."');") or die(mysqli_error($conn));
	}
	exit();
}

if(isset($_POST['summersched'])) {
	$count = 0;
	 $data = json_decode($_POST['data']);
	 $total_num = count($data->subject);

for ($i=0; $i < $total_num; $i++) { 

	$query = mysqli_query($conn, "SELECT subject.subject_code, subject.subj_id, subject.subject_title, subject.units,subject.status from subject 
		  INNER JOIN curriculum ON subject.curriculum_title = curriculum.curriculum_title
		  INNER JOIN course ON course.course_id = curriculum.course_id
		  INNER JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id
		  where subject.subject_code = '".$data->subject[$i]."' GROUP BY subjecT_code") or die(mysqli_error($conn));
	if(mysqli_num_rows($query) > 0)
	{

		while($rows=mysqli_fetch_array($query))
		{
			$count++;
				$output = '<tr class="checked ccc'.$count.'">
			  <th scope="row" id="'.$rows['subj_id'].'">'.$rows['subject_code'].'</th>

			  <td style="white-space: nowrap;">'.$rows['subject_title'].'</td>

			  <td>'.$rows['units'].'</td>

			  <td>     
			    <select class="select-table" id="lecday'.$rows['subj_id'].'">
			      <option selected disabled hidden>Choose Day</option>
			      <option value="Monday">Monday</option>
			      <option value="Tuesday">Tuesday</option>
			      <option value="Wednesday">Wednesday</option>
			      <option value="Thursday">Thursday</option>
			      <option value="Friday">Friday</option>
			      <option value="Saturday">Saturday</option>
			      <option value="Sunday">Sunday</option>
			    </select>    
			  </td>

			  <td><input type="time" class="time-table" id="lecfrom'.$rows['subj_id'].'"></td>

			  <td><input type="time" class="time-table" id="lecto'.$rows['subj_id'].'"></td>


			  <td><input type="text" class="input-table" placeholder="Insert Room" id="lecroom'.$rows['subj_id'].'"></td>

			  <td>     
			    <select class="select-table" id="labday'.$rows['subj_id'].'">
			      <option selected disabled hidden>Choose Day</option>
			      <option value="Monday">Monday</option>
			      <option value="Tuesday">Tuesday</option>
			      <option value="Wednesday">Wednesday</option>
			      <option value="Thursday">Thursday</option>
			      <option value="Friday">Friday</option>
			      <option value="Saturday">Saturday</option>
			      <option value="Sunday">Sunday</option>
			    </select>    
			  </td>


			  <td><input type="time" class="time-table" id="labfrom'.$rows['subj_id'].'"></td>

			  <td><input type="time" class="time-table" id="labto'.$rows['subj_id'].'"></td>


			  <td><input type="text" class="input-table" placeholder="Insert Room" id="labroom'.$rows['subj_id'].'"></td>

			   <td><center><label class="container-check"><input type="checkbox" id="check'.$rows['subj_id'].'"><span class="checkmark-check"></span> </label></center></td>

			  <td><div class="close-div">
			  <input type="text" class="input-table2 faculty" placeholder="Faculty Name" id="faculty'.$rows['subj_id'].'" >
			    <div class="sample-line" style="overflow: auto;">
			      <div class="show-result-search">
			          <span id="faculty_list'.$rows['subj_id'].'" class="faculty_list_ss faculty'.$rows['subj_id'].'"></span>
			      </div>  
			      </div>            
			    </div>
			  </td>
			</tr>';
			$count++;	
		}
	$output .= '<tr hidden><th id="count">'.$count.'</th></tr>';
		$output .= "<script>
			$('.faculty').keyup(function(){
		    var val = $(this).val();
		    var id_with = $(this).attr('id');
		    var id = id_with.substring(7, id_with.length);
		    if(val != '') {
		      $.ajax({
		        url:'process.php',
		        method:'POST',
		        data:{'search_faculty':1,val:val},
		        success:function(data) {
		          $('#faculty_list'+id).fadeIn();
		          $('#faculty_list'+id).html(data);
		        }
		      });
		    }
		    else{
		      $('#faculty_list'+id).hide();
		    }

		    $(document).on('click', '#faculty_list'+id+' li', function(){  
		      var fac_id = $(this).attr('id');
		      var get_name = $('#full_name'+fac_id).html();
		      $('.faculty[id='+id_with+']').val(get_name);
		      $('.faculty[id='+id_with+']').attr('name',fac_id);
		      $('#faculty_list'+id).hide();
		    });
		  });
		  </script>";

		echo $output;
	}
	else
	{	
		$output = '<tr><th colspan="12"><center>NO DATA</center></th></tr>';
		echo $output;
	}
 }
}


//for auto search of student number
 if(isset($_POST['searchsubject']))  
 {
      $query = "SELECT subject.subject_code FROM subject INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title GROUP BY subject_code";  
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

//for auto search of subjects
 if(isset($_POST['searchsubjectdetails']))  
 {
      $query = $_POST['query']; 
      $query = "SELECT subject.subject_title, subject.units FROM subject INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title WHERE subject.subject_code = '$query' GROUP BY subject_code";  
      $result = mysqli_query($conn, $query);    
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           { 
              echo $row['subject_title'];
           }
       }
       else
       {
         echo '';
       }
       exit();
 }
?>