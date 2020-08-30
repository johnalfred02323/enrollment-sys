<?php 
include('../../../config/config.php');

if(isset($_POST['createsched'])){
$data = json_decode($_POST['data']);
$total_num = count($data->code);

for ($i=0; $i < $total_num; $i++) {
	//check for school year 
     $schoolyear = $_POST['schoolyear'];
     $semester = $_POST['semester'];
	//inserting of schedule to database
	$check = mysqli_query($conn, "SELECT * FROM schedule WHERE school_year = '".$schoolyear."' AND section='".$data->section[$i]."' AND subj_id='".$data->code[$i]."' AND semester='".$semester."'") or die(mysqli_error($conn));
	$row = mysqli_num_rows($check);

	if($row == 1) {
		$query = mysqli_query($conn, "UPDATE schedule SET section = '".$data->section[$i]."', subj_id = '".$data->code[$i]."', lecture_day = '".$data->lecday[$i]."', lecturehr_from = '".$data->lecfrom[$i]."', lecturehr_to = '".$data->lecto[$i]."', laboratory_day = '".$data->labday[$i]."', laboratoryhr_from = '".$data->labfrom[$i]."', laboratoryhr_to = '".$data->labto[$i]."', lec_room = '".$data->lecroom[$i]."', lab_room = '".$data->labroom[$i]."', faculty_id = '".$data->faculty[$i]."', school_year = '".$schoolyear."', semester = '".$semester."' WHERE section = '".$data->section[$i]."' AND school_year = '".$schoolyear."' AND subj_id='".$data->code[$i]."';") or die(mysqli_error($conn));
	}
	else {
		$query = mysqli_query($conn, "INSERT INTO schedule (section, subj_id, lecture_day, lecturehr_from, lecturehr_to, laboratory_day, laboratoryhr_from, laboratoryhr_to, lec_room, lab_room, faculty_id, school_year, semester) VALUES ('".$data->section[$i]."','".$data->code[$i]."','".$data->lecday[$i]."','".$data->lecfrom[$i]."','".$data->lecto[$i]."','".$data->labday[$i]."','".$data->labfrom[$i]."','".$data->labto[$i]."','".$data->lecroom[$i]."','".$data->labroom[$i]."','".$data->faculty[$i]."','".$schoolyear."','".$semester."');") or die(mysqli_error($conn));
		
			$get_schedule_id = mysqli_query($conn, "SELECT sched_id FROM schedule WHERE school_year = '".$schoolyear."' AND section='".$data->section[$i]."' AND subj_id='".$data->code[$i]."' AND semester='".$semester."'") or die(mysqli_error($conn));
			$get_schedule_id_data = mysqli_fetch_assoc($get_schedule_id);
			$class_record = mysqli_query($conn, "INSERT INTO class_record (sched_id, downloaded, submitted, excel_file) VALUES ('".$get_schedule_id_data['sched_id']."', 0, 0, '')") or die(mysqli_error($conn));
		
	}
}
exit();
}

if(isset($_POST['viewsched'])){
$section = $_POST['section'];
 $query = "SELECT subject.subject_code, schedule.lecture_day, schedule.lecturehr_from, schedule.lecturehr_to, schedule.laboratory_day, schedule.laboratoryhr_from, schedule.laboratoryhr_to, schedule.lec_room, schedule.lab_room, schedule.faculty_id, subject.subject_title,subject.units from schedule 
    INNER JOIN subject ON schedule.subj_id = subject.subj_id 
    where schedule.section ='$section' AND subject.status = 'Active'";
    $result = mysqli_query($conn, $query); 

    if(mysqli_num_rows($result) > 0)  
    {
	   	while($rows=mysqli_fetch_array($result))
	    {
	      $lechrfrom = new DateTime($rows['lecturehr_from']);
	      $lechrto = new DateTime($rows['lecturehr_to']);
	      $labhrfrom = new DateTime($rows['laboratoryhr_from']);
	      $labhrto = new DateTime($rows['laboratoryhr_to']);

	      $output = '<tr>
	      <th scope="row" style="white-space: nowrap;">'.$rows['subject_code'].'</th>
	      <td style="white-space: nowrap;">'.$rows['subject_title'].'</td> 
	      <td style="white-space: nowrap;">'.$rows['units'].'</td>
	      <td style="white-space: nowrap;">'.$rows['lecture_day'].'</td>
	      <td style="white-space: nowrap;">'.$lechrfrom->format('h:ia').'-'.$lechrto->format('h:ia').'</td>
	      <td style="white-space: nowrap;">'.$rows['lec_room'].'</td>
	      <td style="white-space: nowrap;">'.$rows['laboratory_day'].'</td>
	      <td style="white-space: nowrap;">'.$labhrfrom->format('h:ia').'-'.$labhrto->format('h:ia').'</td>
	      <td style="white-space: nowrap;">'.$rows['lab_room'].'</td>
	      <td style="white-space: nowrap;">'.$rows['faculty_id'].'</td>     
	      <td style="white-space: nowrap;"></td>        
	      </tr>';
		echo $output;

    	}
	}
	else
	{
		$output = '<tr><th colspan="9">NO SCHEDULE</th></tr>';
		echo $output;
	}
	exit();
}

if(isset($_POST['subjectlistforsched'])) {
	 $count=0;
	 $sem = $_POST['sem'];
	 $course = $_POST['course'];
	 $year = $_POST['year'];
	 $major = $_POST['major'];
	 $output = '';
	$query = mysqli_query($conn, "SELECT subject.subject_code, subject.subj_id, subject.subject_title, subject.units,subject.status from subject 
  INNER JOIN curriculum ON subject.curriculum_title = curriculum.curriculum_title
  INNER JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id
  where course='$course' AND major='$major' AND year_and_semester.year='$year' AND year_and_semester.sem ='$sem' AND subject.status = 'Active'") or die(mysqli_error($conn));
	if(mysqli_num_rows($query) > 0)
	{

		while($rows=mysqli_fetch_array($query))
		{
				$output .= '<tr class="checked ccc'.$count.'">
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

			  <td>
			  <div class="close-div">
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

//for school year value
if(isset($_POST['schoolyearvalue'])) {
$query = mysqli_query($conn, "SELECT DISTINCT school_year FROM schedule ORDER BY school_year ASC") or die(mysqli_error($conn));
	if(mysqli_num_rows($query) > 0)
	{
		while($rows=mysqli_fetch_array($query))
		{
			$output = $rows['school_year'];
		}
			echo $output;	
	}
	else
	{

	}
	exit();
}
//for schedule semester search
if(isset($_POST['semester'])) {
	$query = mysqli_query($conn, "SELECT DISTINCT semester FROM schedule ORDER BY semester DESC") or die(mysqli_error($conn));
	if(mysqli_num_rows($query) > 0)
	{
		while($rows=mysqli_fetch_array($query))
		{
		$output = $rows['semester'];
		}
		echo $output;
	}
	else
	{

	}
	exit();

}

if(isset($_POST['search_faculty'])) {
	if(isset($_POST['val'])) {
		$search = $_POST['val'];
		$query = 'SELECT * FROM user WHERE  usertype = "Faculty" AND department = "Faculty" AND (lastname LIKE "%'.$search.'%" OR firstname LIKE "%'.$search.'%")';
	}
	else {
		$query = 'SELECT * FROM user WHERE usertype = "Faculty" AND department = "Faculty"';
	}
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$output = '<ul class="list-unstyled" style="background-color: #fff; cursor: pointer;">';
	if(mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$output .= '<li id="'.$row['id'].'" style="border-bottom: 1px solid #ccc; padding: 5px; width: 100%;
"><span id="full_name'.$row['id'].'">'.$row['lastname'].', '.$row['firstname'].' '.substr($row['middlename'],0,1).'.</span></li>';
		}
	}
	else {
		$output .= '<li>No Faculty</li>';
	}
	$output .= '</ul>';
	echo $output;
}
?>