<?php
include('../config/config.php');

if($_FILES["file"]["name"] != '') {
	$file = $_FILES["file"]["name"];

	$query = "UPDATE class_record SET excel_file = '".$file."' WHERE id =".$_POST["cr_id"];
	// $query = "INSERT INTO sample_ss VALUES (NULL,'".$file."')";
	if(mysqli_query($conn, $query)) {
		move_uploaded_file($_FILES["file"]["tmp_name"], "src/excel_files/$file");
		echo "Class Record Uploaded Successfully";
	}
	else{
		echo "Error in uploading file.";
	}
}
else {
	echo "0";
}