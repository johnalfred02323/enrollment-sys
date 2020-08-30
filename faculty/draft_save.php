<?php
require '../config/config.php';

$data = json_decode($_POST['data']);
$total_num = count($data->stud_num);
$cr_id = $_POST['cr_id'];

for ($i=0; $i < $total_num; $i++) { 
	// $a .= $data->stud_num[$i] . ' = ' . $data->grades[$i] . ' (' . $data->remarks[$i] . '), ';
	$check = mysqli_query($conn, "SELECT student_number FROM grade_report_draft WHERE student_number = '".$data->stud_num[$i]."';") or die(mysqli_error($conn));
	$row = mysqli_num_rows($check);
	if($row > 0) {
		$query = mysqli_query($conn, "UPDATE grade_report_draft SET final_grade = '".$data->grades[$i]."', remarks = '".$data->remarks[$i]."' WHERE student_number = '".$data->stud_num[$i]."';") or die(mysqli_error($conn));
	}
	else {
		$query = mysqli_query($conn, "INSERT INTO grade_report_draft (student_number,cr_id,final_grade,remarks) VALUES ('".$data->stud_num[$i]."',$cr_id,'".$data->grades[$i]."','".$data->remarks[$i]."');") or die(mysqli_error($conn));
	}

	if($data->grades[$i] == ""){
		$total_num = $total_num - 1;
	}
}

echo $total_num;