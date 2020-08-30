<?php

include('../../../config/config.php');

//add subject
if(isset($_POST['addsubject'])){

  $subjcode = $_POST['subjcode'];
  $subjtitle = $_POST['subjtitle'];
  $subjlec = $_POST['subjlec'];
  $subjlab = $_POST['subjlab'];
  $subjyear = $_POST['subjyear'];
  $subjsem = $_POST['subjsem'];
  $subjpre = $_POST['subjpre'];
  $subjunits = $_POST['subjunits'];
  $currtitle = $_POST['currtitle'];
  $check = mysqli_query($conn, "SELECT * FROM subject WHERE subject_code = '$subjcode'");
  if(mysqli_num_rows($check) > 0){
    echo "0";
  }
  else{
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
    $stmt = $pdo_conn->prepare("INSERT INTO subject (subject_code, subject_title, yrsem_id, lecture, laboratory, units, pre_requisite, curriculum_title) VALUES (?,?,?,?,?,?,?,?)");
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

if(isset($_POST['updateuser'])){
	$id = $_POST['id'];
	$user = $_POST['uname'];
	$pass = password_hash($_POST['pass'], PASSWORD_ARGON2I);
	$usertype = $_POST['usertype'];
	$dept = $_POST['dept'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$mname = $_POST['mname'];

	$check = mysqli_query($conn, "SELECT * FROM user WHERE username = '$user'");

	if (mysqli_num_rows($check) > 0) {
		$chk = mysqli_fetch_assoc($check);
		if($chk['id'] == $id){
			$stmt = $pdo_conn->prepare("UPDATE user SET firstname = ?, lastname = ?, middlename = ?, username = ?, password = ?,  usertype = ?, department = ? WHERE id = ?");
			$stmt->bindParam(1, $fname);
			$stmt->bindParam(2, $lname);
			$stmt->bindParam(3, $mname);
			$stmt->bindParam(4, $user);
			$stmt->bindParam(5, $pass);
			$stmt->bindParam(6, $usertype);
			$stmt->bindParam(7, $dept);
			$stmt->bindParam(8, $id);

			if($stmt->execute())
			{
				echo '1';
			}
		}
		else{
			echo '0';
		}
	}
	else{
		$stmt = $pdo_conn->prepare("UPDATE user SET firstname = ?, lastname = ?, middlename = ?, username = ?, password = ?,  usertype = ?, department = ? WHERE id = ?");
		$stmt->bindParam(1, $fname);
		$stmt->bindParam(2, $lname);
		$stmt->bindParam(3, $mname);
		$stmt->bindParam(4, $user);
		$stmt->bindParam(5, $pass);
		$stmt->bindParam(6, $usertype);
		$stmt->bindParam(7, $dept);
		$stmt->bindParam(8, $id);

		if($stmt->execute())
		{
			echo '1';
		}
	}
}

if(isset($_POST['deletesubject']))
{
  $studnum = $_POST['studnum'];
  $result = mysqli_query($conn, "DELETE FROM subject WHERE subject_code = '$studnum'");
  if($result){
    echo "Subject deleted successfully";
    exit();
  }
  else{
    echo "0";
    exit();
  }
}
if(isset($_POST['prereq']))
{
    $currtitle = $_POST['currtitle'];
    $result = mysqli_query($conn, "SELECT * FROM subject where curriculum_title = '$currtitle'");
    $rows = mysqli_num_rows($result);
    $output = '
    <option hidden>Choose Pre-Req</option>
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

?>