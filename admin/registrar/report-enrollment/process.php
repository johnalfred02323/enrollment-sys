<?php
include('../../../config/config.php');

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
if(isset($_POST['gender'])) {
$num =0;
  $gender = $_POST['gender'];
  $sy = $_POST['sy'];
  $sem = $_POST['sem'];
  $type = $_POST['type'];
if($gender == 'All')
{
	if($type == 'Student'){$type2 = 'DISTINCT'; $type3 = '';}
	else{$type2 = ''; $type3 = ', subject.subject_code, subject.subject_title, subject.units';}
	$query =  mysqli_query($conn, "SELECT $type2 student_info.student_number, student_info.lastname, student_info.firstname, student_info.middlename, student_info.suffix, student_info.gender, course.course_abbreviation AS course, course.course_major AS major $type3 FROM student_info 
	INNER JOIN student_enrollment_record ON student_enrollment_record.student_number = student_info.student_number
	INNER JOIN course ON course.course_id = student_info.course_id
	INNER JOIN schedule ON schedule.sched_id = student_enrollment_record.sched_id
	INNER JOIN subject ON subject.subj_id = schedule.subj_id
	WHERE schedule.school_year='$sy' AND schedule.semester = '$sem' AND student_info.gender != ''") or die(mysqli_error($conn));
}
else
{
	if($type == 'Student'){$type2 = 'DISTINCT'; $type3 = '';}
	else{$type2 = ''; $type3 = ', subject.subject_code, subject.subject_title, subject.units';}
	$query =  mysqli_query($conn, "SELECT $type2 student_info.student_number, student_info.lastname, student_info.firstname, student_info.middlename, student_info.suffix, student_info.gender, course.course_abbreviation AS course, course.course_major AS major $type3 FROM student_info 
	INNER JOIN student_enrollment_record ON student_enrollment_record.student_number = student_info.student_number
	INNER JOIN course ON course.course_id = student_info.course_id
	INNER JOIN schedule ON schedule.sched_id = student_enrollment_record.sched_id
	INNER JOIN subject ON subject.subj_id = student_enrollment_record.subj_id
	WHERE schedule.school_year='$sy' AND schedule.semester = '$sem' AND student_info.gender = '$gender'") or die(mysqli_error($conn));
}
	if($type == 'Student')
	{
		  $output = '<table class="table table-striped">
          <thead>
              <tr class="table-borderless">
                <th scope="col" colspan="10" class="text-center">GLOBAL RECIPROCAL COLLEGES</th>
              </tr>
              <tr class="table-bordered">
                <th colspan="5">School Year : '.$sy.'</th>
                <th colspan="5">Semester : '.$sem.'</th>
              </tr>
              <tr class="table-bordered">
                <th scope="col">No.</th>
                <th scope="col" style="white-space: nowrap;">Student No.</th>
                <th scope="col" style="white-space: nowrap;">Lastname</th>
                <th scope="col" style="white-space: nowrap;">Firstname</th>
                <th scope="col" style="white-space: nowrap;">Middlename</th>
                <th scope="col" style="white-space: nowrap;">Suffix</th>
                <th scope="col" style="white-space: nowrap;">Gender</th>
                <th scope="col" style="white-space: nowrap;">Course</th>
                <th scope="col" style="white-space: nowrap;">Major</th>
                <th scope="col" style="white-space: nowrap;">Units</th>
              </tr>
            </thead>
			<tbody>';
			if(mysqli_num_rows($query) > 0)
				{
					while($rows=mysqli_fetch_array($query))
					{
						$studnum = '';
						if($studnum == $rows['student_number'])
						{
			          	}
			          	else
			          	{
							$studnum = $rows['student_number'];
			          		$query1 =  mysqli_query($conn, "SELECT SUM(units) AS Units FROM student_info INNER JOIN student_enrollment_record ON student_enrollment_record.student_number = student_info.student_number INNER JOIN schedule ON schedule.sched_id = student_enrollment_record.sched_id INNER JOIN subject ON subject.subj_id = student_enrollment_record.subj_id WHERE student_info.student_number='$studnum' AND schedule.school_year='$sy' AND schedule.semester = '$sem'	") or die(mysqli_error($conn));
			          		$rows1=mysqli_fetch_array($query1);
							$num++;
							$output .='
				              <tr>
				                <th scope="row">'.$num.'</th>
				                <td style="white-space: nowrap;">'.$rows['student_number'].'</td>
				                <td style="white-space: nowrap;">'.$rows['lastname'].'</td>
				                <td style="white-space: nowrap;">'.$rows['firstname'].'</td>
				                <td style="white-space: nowrap;">'.$rows['middlename'].'</td>
				                <td style="white-space: nowrap;">'.$rows['suffix'].'</td>
				                <td style="white-space: nowrap;">'.$rows['gender'].'</td>
				                <td style="white-space: nowrap;">'.$rows['course'].'</td>
				                <td style="white-space: nowrap;">'.$rows['major'].'</td>
				                <td>'.$rows1['Units'].'</td>
				              </tr>';
			          	}
					}
				}
			else
				{
						$output .='	
			              <tr>
			                <th scope="row">0</th>
			                <th colspan="8"><center>No Student Enrolled</center></th>
			              </tr>';
				}
						$output .= '
			            </tbody>
		          		</table>';
						echo $output;
		}
		else
		{

		  $output = '<table class="table table-striped">
          <thead>
              <tr class="table-borderless">
                <th scope="col" colspan="10" class="text-center">GLOBAL RECIPROCAL COLLEGES</th>
              </tr>
              <tr class="table-bordered">
                <th colspan="6">School Year : '.$sy.'</th>
                <th colspan="7">Semester : '.$sem.'</th>
              </tr>
              <tr class="table-bordered">
                <th scope="col">No.</th>
                <th scope="col" style="white-space: nowrap;">Student No.</th>
                <th scope="col" style="white-space: nowrap;">Lastname</th>
                <th scope="col" style="white-space: nowrap;">Firstname</th>
                <th scope="col" style="white-space: nowrap;">Middlename</th>
                <th scope="col" style="white-space: nowrap;">Suffix</th>
                <th scope="col" style="white-space: nowrap;">Gender</th>
                <th scope="col" style="white-space: nowrap;">Course</th>
                <th scope="col" style="white-space: nowrap;">Major</th>
                <th scope="col" style="white-space: nowrap;">Subject Code</th>
                <th scope="col" style="white-space: nowrap;">Subject Title</th>
                <th scope="col" style="white-space: nowrap;">Units</th>
              </tr>
            </thead>
			<tbody>';
			if(mysqli_num_rows($query) > 0)
				{
					while($rows=mysqli_fetch_array($query))
					{
						$studnum = '';
						if($studnum == $rows['student_number'])
						{
			          	}
			          	else
			          	{
							$num++;
							$output .='
				              <tr>
				                <th scope="row">'.$num.'</th>
				                <td style="white-space: nowrap;">'.$rows['student_number'].'</td>
				                <td style="white-space: nowrap;">'.$rows['lastname'].'</td>
				                <td style="white-space: nowrap;">'.$rows['firstname'].'</td>
				                <td style="white-space: nowrap;">'.$rows['middlename'].'</td>
				                <td style="white-space: nowrap;">'.$rows['suffix'].'</td>
				                <td style="white-space: nowrap;">'.$rows['gender'].'</td>
				                <td style="white-space: nowrap;">'.$rows['course'].'</td>
				                <td style="white-space: nowrap;">'.$rows['major'].'</td>
				                <td style="white-space: nowrap;">'.$rows['subject_code'].'</td>
				                <td style="white-space: nowrap;">'.$rows['subject_title'].'</td>
				                <td style="white-space: nowrap;">'.$rows['units'].'</td>
				              </tr>';
			          	}
					}
				}
			else
				{
						$output .='	
			              <tr>
			                <th scope="row">0</th>
			                <th colspan="10"><center>No Student Enrolled</center></th>
			              </tr>';
				}
						$output .= '
			            </tbody>
		          		</table>';
						echo $output;
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


//for search table list
if(isset($_POST['search-year-list'])) {
$num = 0;
$sy = $_POST['sy'];

	if($sy != '')
	{
		$query = mysqli_query($conn, "SELECT DISTINCT school_year,semester FROM schedule WHERE school_year LIKE '%$sy%' ORDER BY school_year DESC") or die(mysqli_error($conn));
	}
	else
	{
		$query = mysqli_query($conn, "SELECT DISTINCT school_year,semester FROM schedule ORDER BY school_year DESC") or die(mysqli_error($conn));
	}

	if(mysqli_num_rows($query) > 0)
	{
		while($rows=mysqli_fetch_array($query))
		{
			$num++;
			$output = ' <tr>
              <td id="sy'.$num.'">'.$rows['school_year'].'</td>
              <td id="sem'.$num.'">'.$rows['semester'].'</td>
              <td><button id="'.$num.'" class="view-user pull-xs-right view" ripple><i class="far fa-eye"></i> VIEW </button> <button id="'.$num.'" class="delete-user pull-xs-right print" ripple><i class="fas fa-print"></i> PRINT</button> <button id="'.$num.'" class="edit-user pull-xs-right excel" ripple><i class="far fa-file-excel"></i> EXCEL</button></td>
            </tr>';
			echo $output;
		}	
	}
	else
	{
		echo '<tr><td colspan="3"><center>No data available in table</center></td></tr>';
	}
	exit();
}


//for major
if(isset($_POST['majorquery'])) {
  $majorcount = 0;
  $course = $_POST['course'];
   $query = "SELECT DISTINCT course_major FROM course where course_abbreviation = '$course'";
   $result = mysqli_query($conn, $query); 
    if($count=mysqli_num_rows($result) > 0)  
    {
    $output = '<option id="cm" value="" hidden>Choose Major</option>';
    while($rows=mysqli_fetch_array($result))
    {
      if($rows['course_major'] == 'No Major')
      {
        // for no major output
        $majorcount++; 
      }
      else
      {
        $output .= '<option value="'.$rows['course_major'].'" >'.$rows['course_major'].'</option>';
      }
    }
    if($majorcount == 0){echo $output;}
      else {echo '<option>No Major</option>';}
    }
    else
    {
    	echo '0';
    }
        
}
//for list of day
if(isset($_POST['yearquery'])) {
  $course = $_POST['course'];
   $query = "SELECT * FROM course where course_abbreviation = '$course'";
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

//for list of day
if(isset($_POST['daylist'])) {
  $sy = $_POST['sy'];
  $sem = $_POST['sem'];
  $date2 = '';
   $query = "SELECT DISTINCT * FROM student_enrollment_record INNER JOIN schedule On schedule.sched_id = student_enrollment_record.sched_id WHERE schedule.school_year = '$sy' AND schedule.semester = '$sem' ORDER BY student_enrollment_record.date DESC";
   $result = mysqli_query($conn, $query); 

    $output = '<option id="cd" value="" hidden>Choose Day</option>';
    $output .= '<option id="all" value="ALL">ALL</option>';
    if($count=mysqli_num_rows($result) > 0)  
    {
    while($rows=mysqli_fetch_array($result))
    {
    	$dt = new DateTime($rows['date']);
    	$date = $dt->format('M d, Y');
    	$date3 = $dt->format('Y-m-d');
    	if($date != $date2)
    	{ 
    		$date2 = $date;
        	$output .= '<option value="'.$date3.'" >'.$date.'</option>';
        }
      
    }
    }   
    echo $output;
}
?>