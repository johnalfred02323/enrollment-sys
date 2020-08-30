<?php
include('../../config/config.php');
require '../../faculty/src/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;


if($_FILES["file"]["name"] != '') {
	$file = $_FILES["file"]["name"];
	
	if($file == $_POST["def"]) {
		$name = pathinfo($file, PATHINFO_FILENAME).'_updated';
		$ext = pathinfo($file, PATHINFO_EXTENSION);
		$new_file = $name.'.'.$ext;
		$query = "UPDATE class_record SET excel_file = '".$new_file."' WHERE id =".$_POST["cr_id"];
		move_uploaded_file($_FILES["file"]["tmp_name"], "../../faculty/src/excel_files/$new_file");

		if(mysqli_query($conn, $query)) {
			$grades = [];
			$midgrade = array();
			$fingrade = array();
			$tfg = array();
			$student_num = array();
			$reader = IOFactory::createReader('Xlsx');
			$spreadsheet = $reader->load("../../faculty/src/excel_files/".$new_file);
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
			}

			echo json_encode($grades);
		}
		else{
			echo "3";
		}
	}
	else {
		echo "0";
	}
}
else {
	echo "2";
}