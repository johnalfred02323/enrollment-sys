<?php
include('../config/config.php');
require 'src/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;


if($_FILES["file"]["name"] != '') {
	$filename = $_FILES["file"]["name"];
	$file = realpath($_FILES["file"]["tmp_name"]);
	if($filename == $_POST["def"]) {
		// $query = "UPDATE class_record SET excel_file = '".$filename."' WHERE id =".$_POST["cr_id"];
		// move_uploaded_file($_FILES["file"]["tmp_name"], "src/excel_files/$file");
		// if(mysqli_query($conn, $query)) {
			$grades = [];
			$midgrade = array();
			$fingrade = array();
			$tfg = array();
			$remarks = array();
			$student_num = array();
			$reader = IOFactory::createReader('Xlsx');
			$spreadsheet = $reader->load($file);
			$sn = $spreadsheet->getSheet(0)
			->namedRangeToArray(
				'studentnum',
				NULL,
				TRUE,
				TRUE,
				TRUE
			);
			$get_mid = $spreadsheet->getSheet(1)
			->namedRangeToArray(
				'midgrade',
				NULL,
				TRUE,
				TRUE,
				TRUE
			);
			$get_fin = $spreadsheet->getSheet(1)
			->namedRangeToArray(
				'fingrade',
				NULL,
				TRUE,
				TRUE,
				TRUE
			);
			$get_tfg = $spreadsheet->getSheet(0)
			->namedRangeToArray(
				'tfg',
				NULL,
				TRUE,
				TRUE,
				TRUE
			);
			$get_remarks = $spreadsheet->getSheet(0)
			->namedRangeToArray(
				'remarks',
				NULL,
				TRUE,
				TRUE,
				TRUE
			);

			foreach ($get_mid as $key) {
				foreach ($key as $next=>$value) {
					if($value != null) {
						$midgrade[] = $value;
					}
				}
			}

			foreach ($get_fin as $key) {
				foreach ($key as $next=>$value) {
					if($value != null) {
						$fingrade[] = $value;
					}
				}
			}

			foreach ($get_tfg as $key) {
				foreach ($key as $next=>$value) {
					if($value != null) {
						$tfg[] = $value;
					}
				}
			}

			foreach ($get_remarks as $key) {
				foreach ($key as $next=>$value) {
					if($value != null) {
						$remarks[] = $value;
					}
				}
			}

			foreach ($sn as $key) {
				foreach ($key as $next=>$value) {
					if($value != null) {
						$student_num[] = $value;
					}
				}
			}

			for ($i=0; $i < count($student_num); $i++) {
				$grades['midterm'][$student_num[$i]] = $midgrade[$i];
				$grades['final'][$student_num[$i]] = $fingrade[$i];
				$grades['tfg'][$student_num[$i]] = $tfg[$i];
				$grades['remarks'][$student_num[$i]] = $remarks[$i];
			}
			
			$grades['filename'][0] = $filename;

			echo json_encode($grades);
		// }
		// else{
		// 	echo "Error in uploading file.";
		// }
	}
	else {
		echo "0";
	}
}
else {
	echo "ERROR";
}
