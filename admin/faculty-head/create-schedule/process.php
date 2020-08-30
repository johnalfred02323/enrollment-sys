<?php
require '../../../config/config.php';

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
}

if(isset($_POST['subjectlistforsched'])) {
	 $count=0;
	 $sem = $_POST['sem'];
	 $course = $_POST['course'];
	 $year = $_POST['year'];
	 $major = $_POST['major'];
	 $labuse = $_POST['labuse'];
	 $output = '';
	$query = mysqli_query($conn, "SELECT subject.subject_code, subject.subj_id, subject.subject_title, subject.units,subject.status from subject 
  INNER JOIN curriculum ON subject.curriculum_title = curriculum.curriculum_title
  INNER JOIN course ON course.course_id = curriculum.course_id
  INNER JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id
  where course.course_abbreviation='$course' AND course.course_major='$major' AND year_and_semester.year='$year' AND year_and_semester.sem ='$sem' AND subject.status = 'Active'") or die(mysqli_error($conn));
	if(mysqli_num_rows($query) > 0)
	{
	  if($labuse == 'yes')
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
	}
	else
	{	
		$output = '<tr><th colspan="13"><center>NO DATA</center></th></tr>';
		echo $output;
	}
	
}
//create schedule
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
		$query = mysqli_query($conn, "UPDATE schedule SET section = '".$data->section[$i]."', subj_id = '".$data->code[$i]."', lecture_day = '".$data->lecday[$i]."', lecturehr_from = '".$data->lecfrom[$i]."', lecturehr_to = '".$data->lecto[$i]."', laboratory_day = '".$data->labday[$i]."', laboratoryhr_from = '".$data->labfrom[$i]."', laboratoryhr_to = '".$data->labto[$i]."', lec_room = '".$data->lecroom[$i]."', lab_room = '".$data->labroom[$i]."', max_student = '".$data->lab[$i]."', faculty_id = '".$data->faculty[$i]."', school_year = '".$schoolyear."', semester = '".$semester."' WHERE section = '".$data->section[$i]."' AND school_year = '".$schoolyear."' AND subj_id='".$data->code[$i]."';") or die(mysqli_error($conn));
	}
	else {
		$query = mysqli_query($conn, "INSERT INTO schedule (section, subj_id, lecture_day, lecturehr_from, lecturehr_to, laboratory_day, laboratoryhr_from, laboratoryhr_to, lec_room, lab_room, max_student, faculty_id, school_year, semester) VALUES ('".$data->section[$i]."','".$data->code[$i]."','".$data->lecday[$i]."','".$data->lecfrom[$i]."','".$data->lecto[$i]."','".$data->labday[$i]."','".$data->labfrom[$i]."','".$data->labto[$i]."','".$data->lecroom[$i]."','".$data->labroom[$i]."','".$data->lab[$i]."','".$data->faculty[$i]."','".$schoolyear."','".$semester."');") or die(mysqli_error($conn));
		
			$get_schedule_id = mysqli_query($conn, "SELECT sched_id FROM schedule WHERE school_year = '".$schoolyear."' AND section='".$data->section[$i]."' AND subj_id='".$data->code[$i]."' AND semester='".$semester."'") or die(mysqli_error($conn));
			$get_schedule_id_data = mysqli_fetch_assoc($get_schedule_id);
			$class_record = mysqli_query($conn, "INSERT INTO class_record (sched_id, downloaded, submitted, excel_file) VALUES ('".$get_schedule_id_data['sched_id']."', 0, 0, '')") or die(mysqli_error($conn));
		
	}
}
exit();
}
//search faculty name
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


//for auto search of student number
 if(isset($_POST['searchsubject']))  
 {
 	$course = $_POST['course'];
 	$major = $_POST['major'];
      $query = "SELECT subject.subject_code FROM subject 
      INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title 
      INNER JOIN course ON course.course_id = curriculum.course_id
      WHERE course.course_abbreviation = '$course' AND course.course_major = '$major' AND subject.status = 'active'";  
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


//use for lab
if(isset($_POST['useoflab'])) {
$course = $_POST['course'];
$major = $_POST['major'];

$query=mysqli_query($conn, "SELECT * FROM course WHERE course_abbreviation = '$course' AND course_major = '$major'") or die(mysqli_error($conn));
if(mysqli_num_rows($query) > 0)
{
    $rows=mysqli_fetch_assoc($query);
    if($rows['use_lab'] == 'Yes')
    {
      echo '1';
    }
    else
    {
      echo '0';
    }
}
else
{
}
exit();
}
 //other subjects
if(isset($_POST['othersched'])) {
	$count = 0;
	 $uselab = $_POST['uselab'];
	 $data = json_decode($_POST['data']);
	 $total_num = count($data->subject);

for ($i=0; $i < $total_num; $i++) { 

	$query = mysqli_query($conn, "SELECT subject.subject_code, subject.subj_id, subject.subject_title, subject.units,subject.status, course.use_lab from subject 
		  INNER JOIN curriculum ON subject.curriculum_title = curriculum.curriculum_title
		  INNER JOIN course ON course.course_id = curriculum.course_id
		  INNER JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id
		  where subject.subject_code = '".$data->subject[$i]."' GROUP BY subject_code") or die(mysqli_error($conn));
	if(mysqli_num_rows($query) > 0)
	{

		while($rows=mysqli_fetch_array($query))
		{
			if($uselab == 'yes')
			{
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
			}
			else
			{
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


			  <td><input type="time" class="time-table" id="lecfrom'.$rows['subj_id'].'"></td>

			  <td><input type="time" class="time-table" id="lecto'.$rows['subj_id'].'"></td>


			  <td><input type="text" class="input-table" placeholder="Insert Room" id="lecroom'.$rows['subj_id'].'"></td>


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

			}
			$count++;
		}
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

	echo '<tr hidden><th id="count">'.$count.'</th></tr>';
	exit();
}

?>