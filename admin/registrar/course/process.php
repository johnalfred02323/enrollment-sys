<?php

include('../../../config/config.php');

//add curriculum
if(isset($_POST['addcourse'])){

	$coursename = $_POST['coursename'];
	$abbriv = $_POST['abbriv'];
	$year = $_POST['year'];
  	$major = $_POST['major'];
  	$cid = $_POST['cid'];
    $uselab = $_POST['uselab'];
  	$buttonlbl = $_POST['buttonlbl'];


  if($buttonlbl == 'UPDATE')
  {
      $stmt = $pdo_conn->prepare("UPDATE course SET course_name = ?, course_abbreviation = ?, course_year = ?, use_lab = ? WHERE course_abbreviation = ?");
      $stmt->bindParam(1, $coursename);
      $stmt->bindParam(2, $abbriv);
      $stmt->bindParam(3, $year);
      $stmt->bindParam(4, $uselab);
      $stmt->bindParam(5, $cid);

      if($stmt->execute())
      {
        echo 'updated';
      }

  }
  else
  {
    	$check = mysqli_query($conn, "SELECT * FROM course WHERE course_abbreviation = '$abbriv' || course_name  = '$coursename'");
    	if(mysqli_num_rows($check)  > 0){
    		echo "0";
    	}
    	else
    	{
    		if($major == '')
    		{
    			$major = 'No Major';
    		}

    		$stmt = $pdo_conn->prepare("INSERT INTO course (course_name, course_major, course_abbreviation, course_year, use_lab, status) VALUES (?,?,?,?,?,'Inactive')");
    		$stmt->bindParam(1, $coursename);
    		$stmt->bindParam(2, $major);
    		$stmt->bindParam(3, $abbriv);
    		$stmt->bindParam(4, $year);
        $stmt->bindParam(5, $uselab);

    		if($stmt->execute())
    		{
    			echo "1";
    		}

    	 }
  }
    	exit();
}

//for showing of course to be edit

if(isset($_POST['editcourse'])){
  $cid = $_POST['cid'];
  $result = mysqli_query($conn, "SELECT * FROM course WHERE course_abbreviation = '$cid' GROUP BY course_abbreviation");
  $row = mysqli_fetch_assoc($result);
  $coursename = $row['course_name'];
  $year = $row['course_year'];
  $abbriv = $row['course_abbreviation'];
  $major = $row['course_major'];
  $uselab = $row['use_lab'];
  echo json_encode(array('coursename' => $coursename ,'year' => $year ,'abbriv' => $abbriv,'major' => $major,'uselab' => $uselab));
  exit();
}

//for curriculum search
 if(isset($_POST['majorpercourse']))  
 {  
      $cid = $_POST['cid'];
      $count = 0;

      $query = "SELECT * FROM course WHERE course_abbreviation = '$cid'"; 
      $result = mysqli_query($conn, $query); 

      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           { 
              $count++;
              if($row['status'] == "Active")
              {
                  $output = '
                  <tr id="tr'.$count.'">
                    <th id="major'.$count.'"><label id="id'.$count.'" hidden>'.$row['course_id'].'</label><label id="label'.$count.'">'.$row['course_major'].'</label><input id="majoredit'.$count.'" style="display:none;" value="'.$row['course_major'].'"></th>
                    <td><button type="button" class="edit-user editmajor" name="'.$count.'" id="edit'.$count.'" ripple>EDIT</button> <button type="button" class="delete-user statusmajor" name="'.$count.'" id="status'.$count.'" ripple>ACTIVE</button><button style="display:none;" type="button" name="'.$count.'" class="view-user pull-xs-right savemajor" id="save'.$count.'" ripple>SAVE</button> <button style="display:none;" type="button" name="'.$count.'" class="delete-user pull-xs-right cancelmajor" id="cancel'.$count.'" ripple>CANCEL</button></td>
                  </tr>';
              }
              else
              {
                  $output = '
                  <tr id="tr'.$count.'">
                    <th id="major'.$count.'"><label id="id'.$count.'" hidden>'.$row['course_id'].'</label><label id="label'.$count.'">'.$row['course_major'].'</label><input id="majoredit'.$count.'" style="display:none;" value="'.$row['course_major'].'"></th>
                    <td><button type="button" class="edit-user editmajor" name="'.$count.'" id="edit'.$count.'" ripple>EDIT</button> <button type="button" class="delete-user statusmajor" name="'.$count.'" id="status'.$count.'" ripple>INACTIVE</button><button style="display:none;" type="button" name="'.$count.'" class="view-user pull-xs-right savemajor" id="save'.$count.'" ripple>SAVE</button> <button style="display:none;" type="button" name="'.$count.'" class="delete-user pull-xs-right cancelmajor" id="cancel'.$count.'" ripple>CANCEL</button></td>
                  </tr>';
              }
              echo $output;
           }
       }
       else
       {      $output = '<tr><th scope="row" colspan="2">NO DATA RETRIEVED</th></tr>';
              echo $output;
       }

       echo $count;
       exit();
 }

//change status
if(isset($_POST['changestatus'])){
  $cid = $_POST['cid'];
  $status = $_POST['status'];
  if($status == 'ACTIVE')
  {
    $statusname = 'Inactive';
  }
  else
  {
    $statusname = 'Active';
  }

  $stmt = $pdo_conn->prepare("UPDATE course SET status = ? WHERE course_id = ?");
      $stmt->bindParam(1, $statusname);
      $stmt->bindParam(2, $cid);

      if($stmt->execute())
      {
        echo 'updated';
      }
  exit();
}
//add or update major
if(isset($_POST['majoradd'])){

  $text = $_POST['text'];
  $cid = $_POST['cid'];
  $cname = $_POST['cname'];
  $abbriv = $_POST['abbriv'];
  $year = $_POST['year'];


  if($cid != 0)
  {
      $stmt = $pdo_conn->prepare("UPDATE course SET course_major = ? WHERE course_id = ?");
      $stmt->bindParam(1, $text);
      $stmt->bindParam(2, $cid);

      if($stmt->execute())
      {
        echo 'updated';
      }

  }
  else
  {
      $check = mysqli_query($conn, "SELECT * FROM course WHERE  course_major  = '$text'");
      if(mysqli_num_rows($check)  > 0){
        echo "0";
      }
      else
      {
        $stmt = $pdo_conn->prepare("INSERT INTO course (course_name, course_major, course_abbreviation, course_year, status) VALUES (?,?,?,?,'Inactive')");
        $stmt->bindParam(1, $cname);
        $stmt->bindParam(2, $text);
        $stmt->bindParam(3, $abbriv);
        $stmt->bindParam(4, $year);

        if($stmt->execute())
        {
        }
        $check2 = mysqli_query($conn, "SELECT * FROM course WHERE  course_major  = '$text'");
        $row = mysqli_fetch_assoc($check2);
        echo $row['course_id']; 

       }
  }
      exit();
}
?>