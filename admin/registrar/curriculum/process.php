<?php

include('../../../config/config.php');

//add curriculum
if(isset($_POST['addcurr'])){
  $curid = $_POST['curid'];
	$curtitle = $_POST['curtitle'];
	$curcourse = $_POST['curcourse'];
	$curmajor = $_POST['curmajor'];
  $buttonlbl = $_POST['buttonlbl'];

  $result = mysqli_query($conn, "SELECT * FROM course WHERE course_abbreviation = '$curcourse' AND course_major = '$curmajor'");
  $row = mysqli_fetch_assoc($result);

  if($buttonlbl == ' Update')
  {
      $cid = $row['course_id'];
      $stmt = $pdo_conn->prepare("UPDATE curriculum SET curriculum_title = ?, course_id = ? WHERE curriculum_title = ?");
      $stmt->bindParam(1, $curtitle);
      $stmt->bindParam(2, $cid);
      $stmt->bindParam(3, $curid);

      if($stmt->execute())
      {
        echo 'updated';
      }

  }
  else
  {
    	$check = mysqli_query($conn, "SELECT * FROM curriculum WHERE curriculum_title = '$curtitle'");
    	if(mysqli_num_rows($check)  > 0){
    		echo "0";
    	}
    	else{
        $cid = $row['course_id'];
    		$stmt = $pdo_conn->prepare("INSERT INTO curriculum (curriculum_title, course_id, status) VALUES (?,?,'Inactive')");
    		$stmt->bindParam(1, $curtitle);
    		$stmt->bindParam(2, $cid);

    		if($stmt->execute())
    		{
    			echo "1";
    		}

    	 }
  }
    	exit();
}       

//add subject
if(isset($_POST['addsubject'])){

  $subjid = $_POST['subjid'];
  $subjcode = $_POST['subjcode'];
  $subjtitle = $_POST['subjtitle'];
  $subjlec = $_POST['subjlec'];
  $subjlab = $_POST['subjlab'];
  $subjyear = $_POST['subjyear'];
  $subjsem = $_POST['subjsem'];
  $subjpre = $_POST['subjpre'];
  $subjunits = $_POST['subjunits'];
  $currtitle = $_POST['currtitle'];
  $buttonlbl = $_POST['buttonlbl'];
  if($buttonlbl == ' Update')
  {
      $stmt = $pdo_conn->prepare("UPDATE subject SET subject_code = ?, subject_title = ?, lecture = ?, laboratory = ?, units = ?, pre_requisite = ? WHERE subj_id = ?");
      $stmt->bindParam(1, $subjcode);
      $stmt->bindParam(2, $subjtitle);
      $stmt->bindParam(3, $subjlec);
      $stmt->bindParam(4, $subjlab);
      $stmt->bindParam(5, $subjunits);
      $stmt->bindParam(6, $subjpre);
      $stmt->bindParam(7, $subjid);

      if($stmt->execute())
      {
        echo 'updated';
      }

  }
  else
  {
    $check = mysqli_query($conn, "SELECT * FROM subject WHERE subject_code = '$subjcode'");

    if($subjyear == '1styr' && $subjsem == '1stsem')
    {
      $yearsem = '1styr1stsem';
    }
    else if($subjyear == '1styr' && $subjsem == '2ndsem')
    {
      $yearsem = '1styr2ndsem';
    }
    else if($subjyear == '2ndyr' && $subjsem == '1stsem')
    {
      $yearsem = '2ndyr1stsem';
    }
    else if($subjyear == '2ndyr' && $subjsem == '2ndsem')
    {
      $yearsem = '2ndyr2ndsem';
    }
    else if($subjyear == '3rdyr' && $subjsem == '1stsem')
    {
      $yearsem = '3rdyr1stsem';
    }
    else if($subjyear == '3rdyr' && $subjsem == '2ndsem')
    {
      $yearsem = '3rdyr2ndsem';
    }
    else if($subjyear == '4thyr' && $subjsem == '1stsem')
    {
      $yearsem = '4thyr1stsem';
    }
    else if($subjyear == '4thyr' && $subjsem == '2ndsem')
    {
      $yearsem = '4thyr2ndsem';
    }
    else if($subjyear == '5thyr' && $subjsem == '1stsem')
    {
      $yearsem = '5thyr1stsem';
    }
    else if($subjyear == '5thyr' && $subjsem == '2ndsem')
    {
      $yearsem = '5thyr2ndsem';
    }
    else if($subjyear == '1styr' && $subjsem == 'summer')
    {
      $yearsem = '1styrsummer';
    }
    else if($subjyear == '2ndyr' && $subjsem == 'summer')
    {
      $yearsem = '2ndyrsummer';
    }
    else if($subjyear == '3rdyr' && $subjsem == 'summer')
    {
      $yearsem = '3rdyrsummer';
    }
    else if($subjyear == '4thyr' && $subjsem == 'summer')
    {
      $yearsem = '4thyrsummer';
    }
    else if($subjyear == '5thyr' && $subjsem == 'summer')
    {
      $yearsem = 'Fifthyrsummer';
    }
    else
    {
      $yearsem = 'Year or Semester is not Correct';
    }

if($yearsem == 'Year or Semester is not Correct')
{
  echo $yearsem;
}
else
{
    $stmt = $pdo_conn->prepare("INSERT INTO subject (subject_code, subject_title, yrsem_id, lecture, laboratory, units, pre_requisite, curriculum_title, Status) VALUES (?,?,?,?,?,?,?,?,'Inactive')");
    $stmt->bindParam(1, $subjcode);
    $stmt->bindParam(2, $subjtitle);
    $stmt->bindParam(3, $yearsem);
    $stmt->bindParam(4, $subjlec);
    $stmt->bindParam(5, $subjlab);
    $stmt->bindParam(6, $subjunits);
    $stmt->bindParam(7, $subjpre);
    $stmt->bindParam(8, $currtitle);

    if($stmt->execute())
    {
      echo "1";
    }
  }
  }
  exit();
}      

if(isset($_POST['deletecurr'])){
  $id = $_POST['id'];
  $result = mysqli_query($conn, "DELETE FROM curriculum WHERE curriculum_title = '$id'");
  $result = mysqli_query($conn, "DELETE FROM subject WHERE curriculum_title = '$id'");
  if($result){
    echo "Curriculum deleted succesfully";
    exit();
  }
  else{
    echo "0";
    exit();
  }
}

if(isset($_POST['editcurr'])){
  $id = $_POST['id'];
  $result = mysqli_query($conn, "SELECT curriculum.curriculum_title, course.course_year, course.course_abbreviation, course.course_major FROM curriculum INNER JOIN course ON course.course_id = curriculum.course_id WHERE curriculum.curriculum_title = '$id'");
  $row = mysqli_fetch_assoc($result);
  $curtitle = $row['curriculum_title'];
  $year = $row['course_year'];
  $course = $row['course_abbreviation'];
  $major = $row['course_major'];
  echo json_encode(array('curtitle' => $curtitle ,'year' => $year ,'course' => $course,'major' => $major));
  exit();
}
//delete first sem subject
if(isset($_POST['deletesubj'])){
  $id = $_POST['id'];
  $result = mysqli_query($conn, "DELETE FROM subject WHERE subj_id = '$id'");
  if($result){
    echo "Subject deleted succesfully";
    exit();
  }
  else{
    echo "0";
    exit();
  }
}
//delete second sem subject
if(isset($_POST['deletesubj2'])){
  $id = $_POST['id'];
  $result = mysqli_query($conn, "DELETE FROM subject WHERE subj_id = '$id'");
  if($result){
    echo "Subject deleted succesfully";
    exit();
  }
  else{
    echo "0";
    exit();
  }
}

//delete summer subject
if(isset($_POST['deletesubj3'])){
  $id = $_POST['id'];
  $result = mysqli_query($conn, "DELETE FROM subject WHERE subj_id = '$id'");
  if($result){
    echo "Subject deleted succesfully";
    exit();
  }
  else{
    echo "0";
    exit();
  }
}
//delete subject on subject tab
if(isset($_POST['deletesubject'])){
  $id = $_POST['id'];
  $result = mysqli_query($conn, "DELETE FROM subject WHERE subject_code = '$id'");
  if($result){
    echo "Subject deleted succesfully";
    exit();
  }
  else{
    echo "0";
    exit();
  }
}
//edit subject on curriculum-subject
if(isset($_POST['editsubj'])){
  $id = $_POST['id'];
  $result = mysqli_query($conn, "SELECT * FROM subject INNER JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id WHERE subj_id = '$id'");
  $row = mysqli_fetch_assoc($result);
  $subject_code = $row['subject_code'];
  $subject_title = $row['subject_title'];
  $lecture = $row['lecture'];
  $laboratory = $row['laboratory'];
  $units = $row['units'];
  $pre_requisite = $row['pre_requisite'];
  $year = $row['year'];
  $sem = $row['sem'];
  echo json_encode(array('subject_code' => $subject_code ,'subject_title' => $subject_title ,'lecture' => $lecture,'laboratory' => $laboratory,'units' => $units ,'pre_requisite' => $pre_requisite ,'year' => $year,'sem' => $sem));
  exit();
}

//edit subject on curriculum-subject
if(isset($_POST['editsubj2'])){
  $id = $_POST['id'];
  $result = mysqli_query($conn, "SELECT * FROM subject INNER JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id WHERE subj_id = '$id'");
  $row = mysqli_fetch_assoc($result);
  $subject_code = $row['subject_code'];
  $subject_title = $row['subject_title'];
  $lecture = $row['lecture'];
  $laboratory = $row['laboratory'];
  $units = $row['units'];
  $pre_requisite = $row['pre_requisite'];
  $year = $row['year'];
  $sem = $row['sem'];
  echo json_encode(array('subject_code' => $subject_code ,'subject_title' => $subject_title ,'lecture' => $lecture,'laboratory' => $laboratory,'units' => $units ,'pre_requisite' => $pre_requisite ,'year' => $year,'sem' => $sem));
  exit();
}

if(isset($_POST['getactivesubj'])){
  $course = $_POST['course'];
  $major = $_POST['major'];
  //First Year
  $result1 = mysqli_query($conn, "SELECT subject.curriculum_title FROM subject INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id INNER JOIN course ON course.course_id = curriculum.course_id where course.course_abbreviation ='$course' AND subject.status='Active' AND year_and_semester.year='First Year' AND course.course_major='$major'");
 
//2nd Year
  $result2 = mysqli_query($conn, "SELECT subject.curriculum_title FROM subject INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id INNER JOIN course ON course.course_id = curriculum.course_id where course.course_abbreviation ='$course' AND subject.status='Active' AND year_and_semester.year='Second Year' AND course.course_major='$major'");

//3rd Yer
  $result3 = mysqli_query($conn, "SELECT subject.curriculum_title FROM subject INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id INNER JOIN course ON course.course_id = curriculum.course_id where course.course_abbreviation ='$course' AND subject.status='Active' AND year_and_semester.year='Third Year' AND course.course_major='$major'");

//4th Year
  $result4 = mysqli_query($conn, "SELECT subject.curriculum_title FROM subject INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id INNER JOIN course ON course.course_id = curriculum.course_id where course.course_abbreviation ='$course' AND subject.status='Active' AND year_and_semester.year='Fourth Year' AND course.course_major='$major'");

//5th Year
  $result5 = mysqli_query($conn, "SELECT subject.curriculum_title FROM subject INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id INNER JOIN course ON course.course_id = curriculum.course_id where course.course_abbreviation ='$course' AND subject.status='Active' AND year_and_semester.year='Fifth Year' AND course.course_major='$major'");

if (mysqli_num_rows($result1) > 0) 
  {
        $row = mysqli_fetch_assoc($result1);
      //for displaying all curriculum
      $result11 = mysqli_query($conn, "SELECT DISTINCT subject.curriculum_title FROM subject INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id INNER JOIN course ON course.course_id = curriculum.course_id where course.course_abbreviation ='$course' AND year_and_semester.year='First Year' AND course.course_major='$major' ORDER BY curriculum.curriculum_title ASC");

      $output = '<tr id="1styr">
         <th>First Year</th>
           <td class="box1"><label id="1styrcurlbl">'.$row['curriculum_title'].'</label><input list="1styrcur" id="1stinput" style="display:none;"><datalist id="1styrcur" >';
        if (mysqli_num_rows($result11) > 0) 
        {
            while($row = mysqli_fetch_assoc($result11))
          {
            $output1 = $row['curriculum_title'];

          $output .='<option value="'.$output1.'">'.$output1.'</option>';
        }
      }
      else
      {

      }
         $output .='</datalist></td>
         <td>
         <button type="button" id="1" class="view-user pull-xs-right" ripple><i class="fas fa-exchange-alt"></i> CHANGE</button>
         <button style="display:none;" type="button" id="save1" class="delete-user pull-xs-right" ripple><i class="fas fa-save"></i> SAVE </button>
         <button style="display:none;" type="button" id="cancel1" class="view-user pull-xs-right" ripple><i class="fas fa-times"></i> CANCEL</button>

         </td>
         </tr>';
}
else
{
  $row = mysqli_fetch_assoc($result1);
      //for displaying all curriculum
      $result11 = mysqli_query($conn, "SELECT DISTINCT subject.curriculum_title FROM subject INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id INNER JOIN course ON course.course_id = curriculum.course_id where course.course_abbreviation ='$course' AND year_and_semester.year='First Year' AND course.course_major='$major' ORDER BY curriculum.curriculum_title ASC");

      $output = '<tr id="1styr">
         <th>First Year</th>
           <td class="box1"><label id="1styrcurlbl">There is no Active Curriculum</label><input list="1styrcur" id="1stinput" style="display:none;"><datalist id="1styrcur" >';
        if (mysqli_num_rows($result11) > 0) 
        {
            while($row = mysqli_fetch_assoc($result11))
          {
            $output1 = $row['curriculum_title'];

          $output .='<option value="'.$output1.'">'.$output1.'</option>';
        }
      }
      else
      {

      }
         $output .='</datalist></td>
         <td>
         <button type="button" id="1" class="view-user pull-xs-right" ripple><i class="fas fa-exchange-alt"></i> CHANGE</button>
         <button style="display:none;" type="button" id="save1" class="delete-user pull-xs-right" ripple><i class="fas fa-save"></i> SAVE </button>
         <button style="display:none;" type="button" id="cancel1" class="view-user pull-xs-right" ripple><i class="fas fa-times"></i> CANCEL</button>

         </td>
         </tr>';
}

  if (mysqli_num_rows($result2) > 0) 
  {
      $row = mysqli_fetch_assoc($result2);
      //for displaying all curriculum
      $result21 = mysqli_query($conn, "SELECT DISTINCT subject.curriculum_title FROM subject INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id INNER JOIN course ON course.course_id = curriculum.course_id where course.course_abbreviation ='$course' AND year_and_semester.year='Second Year' AND course.course_major='$major' ORDER BY curriculum.curriculum_title ASC");

      $output .= '<tr id="2ndyr">
         <th>Second Year</th>
         <td class="box1"><label id="2ndyrcurlbl">'.$row['curriculum_title'].'</label><input list="2ndyrcur" id="2ndinput" style="display:none;"><datalist id="2ndyrcur" >';
      if (mysqli_num_rows($result21) > 0) 
      {
          while($row = mysqli_fetch_assoc($result21))
        {
          $output1 = $row['curriculum_title'];

          $output .='<option value="'.$output1.'">'.$output1.'</option>';
        }
      }
      else
      {

      }
         $output .='</datalist></td>
         <td>
         <button type="button" id="2" class="view-user pull-xs-right" ripple><i class="fas fa-exchange-alt"></i> CHANGE</button>
         <button style="display:none;" type="button" id="save2" class="delete-user pull-xs-right" ripple><i class="fas fa-save"></i> SAVE </button>
         <button style="display:none;" type="button" id="cancel2" class="view-user pull-xs-right" ripple><i class="fas fa-times"></i> CANCEL</button>

         </td>
         </tr>';
  }
else
{
 $row = mysqli_fetch_assoc($result2);
      //for displaying all curriculum
      $result21 = mysqli_query($conn, "SELECT DISTINCT subject.curriculum_title FROM subject INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id INNER JOIN course ON course.course_id = curriculum.course_id where course.course_abbreviation ='$course' AND year_and_semester.year='Second Year' AND course.course_major='$major' ORDER BY curriculum.curriculum_title ASC");

      $output .= '<tr id="2ndyr">
         <th>Second Year</th>
         <td class="box1"><label id="2ndyrcurlbl">There is no Active Curriculum</label><input list="2ndyrcur" id="2ndinput" style="display:none;"><datalist id="2ndyrcur" >';
      if (mysqli_num_rows($result21) > 0) 
      {
          while($row = mysqli_fetch_assoc($result21))
        {
          $output1 = $row['curriculum_title'];

          $output .='<option value="'.$output1.'">'.$output1.'</option>';
        }
      }
      else
      {

      }
         $output .='</datalist></td>
         <td>
         <button type="button" id="2" class="view-user pull-xs-right" ripple><i class="fas fa-exchange-alt"></i> CHANGE</button>
         <button style="display:none;" type="button" id="save2" class="delete-user pull-xs-right" ripple><i class="fas fa-save"></i> SAVE </button>
         <button style="display:none;" type="button" id="cancel2" class="view-user pull-xs-right" ripple><i class="fas fa-times"></i> CANCEL</button>

         </td>
         </tr>';
}

 if (mysqli_num_rows($result3) > 0) 
  {
   $row = mysqli_fetch_assoc($result3);
      //for displaying all curriculum
      $result31 = mysqli_query($conn, "SELECT DISTINCT subject.curriculum_title FROM subject INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id INNER JOIN course ON course.course_id = curriculum.course_id where course.course_abbreviation ='$course' AND year_and_semester.year='Third Year' AND course.course_major='$major' ORDER BY curriculum.curriculum_title ASC");

      $output .= '<tr id="3rdyr">
         <th>Third Year</th>
         <td class="box1"><label id="3rdyrcurlbl">'.$row['curriculum_title'].'</label><input list="3rdyrcur" id="3rdinput" style="display:none;"><datalist id="3rdyrcur" >';
      if (mysqli_num_rows($result31) > 0) 
      {
          while($row = mysqli_fetch_assoc($result31))
        {
          $output1 = $row['curriculum_title'];

          $output .='<option value="'.$output1.'">'.$output1.'</option>';
        }
      }
      else
      {

      }
         $output .='</datalist></td>
         <td>
         <button type="button" id="3" class="view-user pull-xs-right" ripple><i class="fas fa-exchange-alt"></i> CHANGE</button>
         <button style="display:none;" type="button" id="save3" class="delete-user pull-xs-right" ripple><i class="fas fa-save"></i> SAVE </button>
         <button style="display:none;" type="button" id="cancel3" class="view-user pull-xs-right" ripple><i class="fas fa-times"></i> CANCEL</button>

         </td>
         </tr>';
}
else
{
 $row = mysqli_fetch_assoc($result3);
      //for displaying all curriculum
      $result31 = mysqli_query($conn, "SELECT DISTINCT subject.curriculum_title FROM subject INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id INNER JOIN course ON course.course_id = curriculum.course_id where course.course_abbreviation ='$course' AND year_and_semester.year='Third Year' AND course.course_major='$major' ORDER BY curriculum.curriculum_title ASC");

      $output .= '<tr id="3rdyr">
         <th>Third Year</th>
         <td class="box1"><label id="3rdyrcurlbl">There is No Active Curriculum</label><input list="3rdyrcur" id="3rdinput" style="display:none;"><datalist id="3rdyrcur" >';
      if (mysqli_num_rows($result31) > 0) 
      {
          while($row = mysqli_fetch_assoc($result31))
        {
          $output1 = $row['curriculum_title'];

          $output .='<option value="'.$output1.'">'.$output1.'</option>';
        }
      }
      else
      {

      }
         $output .='</datalist></td>
         <td>
         <button type="button" id="3" class="view-user pull-xs-right" ripple><i class="fas fa-exchange-alt"></i> CHANGE</button>
         <button style="display:none;" type="button" id="save3" class="delete-user pull-xs-right" ripple><i class="fas fa-save"></i> SAVE </button>
         <button style="display:none;" type="button" id="cancel3" class="view-user pull-xs-right" ripple><i class="fas fa-times"></i> CANCEL</button>

         </td>
         </tr>';
}
 
if (mysqli_num_rows($result4) > 0) 
  {
   $row = mysqli_fetch_assoc($result4);
     //for displaying all curriculum
      $result41 = mysqli_query($conn, "SELECT DISTINCT subject.curriculum_title FROM subject INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id INNER JOIN course ON course.course_id = curriculum.course_id where course.course_abbreviation ='$course' AND year_and_semester.year='Fourth Year' AND course.course_major='$major' ORDER BY curriculum.curriculum_title ASC");

      $output .= '<tr id="4thyr">
         <th>Fourth Year</th>
         <td class="box1"><label id="4thyrcurlbl">'.$row['curriculum_title'].'</label><input list="4thyrcur" id="4thinput" style="display:none;"><datalist id="4thyrcur" >';
      if (mysqli_num_rows($result41) > 0) 
      {
          while($row = mysqli_fetch_assoc($result41))
        {
          $output1 = $row['curriculum_title'];

          $output .='<option value="'.$output1.'">'.$output1.'</option>';
        }
      }
      else
      {

      }
         $output .='</datalist></td>
         <td>
         <button type="button" id="4" class="view-user pull-xs-right" ripple><i class="fas fa-exchange-alt"></i> CHANGE</button>
         <button style="display:none;" type="button" id="save4" class="delete-user pull-xs-right" ripple><i class="fas fa-save"></i> SAVE </button>
         <button style="display:none;" type="button" id="cancel4" class="view-user pull-xs-right" ripple><i class="fas fa-times"></i> CANCEL</button>

         </td>
         </tr>';
}
else
{
   $row = mysqli_fetch_assoc($result4);
     //for displaying all curriculum
      $result41 = mysqli_query($conn, "SELECT DISTINCT subject.curriculum_title FROM subject INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id INNER JOIN course ON course.course_id = curriculum.course_id where course.course_abbreviation ='$course' AND year_and_semester.year='Fourth Year' AND course.course_major='$major' ORDER BY curriculum.curriculum_title ASC");

      $output .= '<tr id="4thyr">
         <th>Fourth Year</th>
         <td class="box1"><label id="4thyrcurlbl">There is no Active Curriculum</label><input list="4thyrcur" id="4thinput" style="display:none;"><datalist id="4thyrcur" >';
      if (mysqli_num_rows($result41) > 0) 
      {
          while($row = mysqli_fetch_assoc($result41))
        {
          $output1 = $row['curriculum_title'];

          $output .='<option value="'.$output1.'">'.$output1.'</option>';
        }
      }
      else
      {

      }
         $output .='</datalist></td>
         <td>
         <button type="button" id="4" class="view-user pull-xs-right" ripple><i class="fas fa-exchange-alt"></i> CHANGE</button>
         <button style="display:none;" type="button" id="save4" class="delete-user pull-xs-right" ripple><i class="fas fa-save"></i> SAVE </button>
         <button style="display:none;" type="button" id="cancel4" class="view-user pull-xs-right" ripple><i class="fas fa-times"></i> CANCEL</button>

         </td>
         </tr>';
}

if($course== "BSA"){
    if (mysqli_num_rows($result5) > 0) 
      {
       $row .= mysqli_fetch_assoc($result5);
     //for displaying all curriculum
      $result51 = mysqli_query($conn, "SELECT DISTINCT subject.curriculum_title FROM subject INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id INNER JOIN course ON course.course_id = curriculum.course_id where course.course_abbreviation ='$course' AND year_and_semester.year='Fifth Year' AND course.course_major='$major' ORDER BY curriculum.curriculum_title ASC");

      $output .= '<tr id="5thyr">
         <th>Fifth Year</th>
         <td class="box1"><label id="5thyrcurlbl">'.$row['curriculum_title'].'</label><input list="5thyrcur" id="5thinput" style="display:none;"><datalist id="5thyrcur" >';
      if (mysqli_num_rows($result51) > 0) 
      {
          while($row = mysqli_fetch_assoc($result51))
        {
          $output1 = $row['curriculum_title'];

          $output .='<option value="'.$output1.'">'.$output1.'</option>';
        }
      }
      else
      {

      }
         $output .='</datalist></td>
         <td>
         <button type="button" id="5" class="view-user pull-xs-right" ripple><i class="fas fa-exchange-alt"></i> CHANGE</button>
         <button style="display:none;" type="button" id="save5" class="delete-user pull-xs-right" ripple><i class="fas fa-save"></i> SAVE </button>
         <button style="display:none;" type="button" id="cancel5" class="view-user pull-xs-right" ripple><i class="fas fa-times"></i> CANCEL</button>

         </td>
         </tr>';
}
else
{
       $row .= mysqli_fetch_assoc($result5);
     //for displaying all curriculum
      $result51 = mysqli_query($conn, "SELECT DISTINCT subject.curriculum_title FROM subject INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title INNER JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id INNER JOIN course ON course.course_id = curriculum.course_id where course.course_abbreviation ='$course' AND year_and_semester.year='Fifth Year' AND course.course_major='$major' ORDER BY curriculum.curriculum_title ASC");

      $output .= '<tr id="5thyr">
         <th>Fifth Year</th>
         <td class="box1"><label id="5thyrcurlbl">There is no Active Curriculum</label><input list="5thyrcur" id="5thinput" style="display:none;"><datalist id="5thyrcur" >';
      if (mysqli_num_rows($result51) > 0) 
      {
          while($row = mysqli_fetch_assoc($result51))
        {
          $output1 = $row['curriculum_title'];

          $output .='<option value="'.$output1.'">'.$output1.'</option>';
        }
      }
      else
      {

      }
         $output .='</datalist></td>
         <td>
         <button type="button" id="5" class="view-user pull-xs-right" ripple><i class="fas fa-exchange-alt"></i> CHANGE</button>
         <button style="display:none;" type="button" id="save5" class="delete-user pull-xs-right" ripple><i class="fas fa-save"></i> SAVE </button>
         <button style="display:none;" type="button" id="cancel5" class="view-user pull-xs-right" ripple><i class="fas fa-times"></i> CANCEL</button>

         </td>
         </tr>';    
}
}
  echo $output;
}

//getting pre req
if(isset($_POST['prereq']))
{
    $currtitle = $_POST['currtitle'];
    $result = mysqli_query($conn, "SELECT * FROM subject where curriculum_title = '$currtitle'");
    $rows = mysqli_num_rows($result);
    $output = '
    <option value="None">None</option>
    <option value="First Year">First Year</option>
    <option value="Second Year">Second Year</option>
    <option value="Third Year">Third Year</option>
    <option value="Fourth Year">Fourth Year</option>';
    while ($rows = mysqli_fetch_array($result))
    {
      $output .= "<option  value='". $rows['subject_code'] ."'>" .$rows['subject_code'] ."</option>" ;
    }
      echo $output;
}
//for saving new active curriculum
if(isset($_POST['save2ndyrcur']))
{
}

if(isset($_POST['autosearch']))  
 {  
      $output = '';  
      $count = 0;
      $query = "SELECT DISTINCT subject_code, subject_title, pre_requisite, lecture, laboratory, units FROM subject WHERE subject_code LIKE '%".$_POST["query"]."%'";  
      $result = mysqli_query($conn, $query);  
      $output .= '<ul class="list-unstyled" >';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {    $count++;  
                //(as)means add subject
                $output .= '<span id="ascode'.$count.'" hidden>'.$row["subject_code"].'</span>
                <span id="astitle'.$count.'" hidden>'.$row["subject_title"].'</span>
                <span id="aspre'.$count.'" hidden>'.$row["pre_requisite"].'</span>
                <span id="aslec'.$count.'" hidden>'.$row["lecture"].'</span>
                <span id="aslab'.$count.'" hidden>'.$row["laboratory"].'</span>
                <span id="asunit'.$count.'" hidden>'.$row["units"].'</span>
                <li id="'.$count.'">'.$row["subject_code"].' - '.$row["subject_title"].'</li>';
           }  
      }  
      else  
      {    
      }  
      $output .= '</ul>'; 
      echo $output;    
 }  

 //for major
if(isset($_POST['major'])) {
  $course = $_POST['course'];
   $query = "SELECT DISTINCT course_major FROM course where course_abbreviation = '$course' AND status ='Active'";
   $result = mysqli_query($conn, $query); 
    if($count=mysqli_num_rows($result) > 0)  
    {
    while($rows=mysqli_fetch_array($result))
    {
      if($rows['course_major'] == 'No Major')
      {
        echo '0';
      }
      else
      {
        echo '<a class="majorname dropdown-item" style="display:block;" >'.$rows['course_major'].'</a>';
      }
    }
    }
}

//for major
if(isset($_POST['major2'])) {
  $course = $_POST['course'];
   $query = "SELECT DISTINCT course_major FROM course where course_abbreviation = '$course' AND status ='Active'";
   $result = mysqli_query($conn, $query); 
    if($count=mysqli_num_rows($result) > 0)  
    {
    while($rows=mysqli_fetch_array($result))
    {
      if($rows['course_major'] == 'No Major')
      {
        echo '0';
      }
      else
      {
        echo '<option class="najorlist2" value="'.$rows['course_major'].'">'.$rows['course_major'].'</option>';
      }
    }
    }
}


//for year taken
if(isset($_POST['yeartaken'])) {
  $curtitle = $_POST['curtitle'];
   $query = "SELECT DISTINCT course.course_year FROM course INNER JOIN curriculum ON course.course_id = curriculum.course_id where curriculum.curriculum_title = '$curtitle'";
   $result = mysqli_query($conn, $query); 
    if($count=mysqli_num_rows($result) > 0)  
    {
    while($rows=mysqli_fetch_array($result))
    {
        $output = $rows['course_year'];
        echo $output;
    }
    }
}
?>