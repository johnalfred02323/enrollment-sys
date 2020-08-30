<?php
require '../config/config.php';
require 'src/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Alignment;
use PhpOffice\PhpSpreadsheet\Style;

// get schedule id
$id = $_GET['id'];

// get template
$reader = IOFactory::createReader('Xlsx');
$spreadsheet = $reader->load('src/excel_files/genrec-temp.xlsx');

$spreadsheet->getSecurity()->setLockWindows(true);
$spreadsheet->getSecurity()->setLockStructure(true);
$spreadsheet->getSecurity()->setWorkbookPassword("bsit");

// get data
$query = "SELECT schedule.sched_id, student_info.student_number, student_info.firstname, student_info.lastname, student_info.middlename  
  FROM student_enrollment_record 
  INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id 
  INNER JOIN student_info ON student_enrollment_record.student_number = student_info.student_number 
  WHERE schedule.sched_id = $id AND status = 'Enrolled'
  ORDER BY lastname ASC";
$student_data = mysqli_query($conn, $query) or die(mysqli_error($conn));


// loopdata
$startRow = 13;
$currentRow = 13;
$sn = 1;

while ($row=mysqli_fetch_assoc($student_data)) {
	$name = ucfirst($row['lastname']).', '.ucfirst($row['firstname']).' '.ucfirst(substr($row['middlename'], 0, 1)).'.';
	$spreadsheet->getSheet(1)
		->setCellValue('B'.$currentRow, $name);
	$spreadsheet->getSheet(0)
		->setCellValue('Z'.$sn, $row['student_number']);
	$currentRow++;
	$sn++;
}
$spreadsheet->getSheet(1)
		->setCellValue('B'.$currentRow, '•••Nothing Follows•••');

$spreadsheet->getSheet(1)->getStyle('B13:B82')
		->getProtection()
		->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_UNPROTECTED);


$query2 = "SELECT faculty_user.firstname, faculty_user.lastname, faculty_user.middlename, subject.subject_title, subject.subject_code, subject.units, schedule.lecturehr_from, schedule.lecturehr_to, schedule.lecture_day, schedule.lec_room, schedule.laboratoryhr_from, schedule.laboratoryhr_to, schedule.laboratory_day, schedule.lab_room, schedule.school_year, schedule.semester, schedule.section, course.course_abbreviation as course, year_and_semester.year
	FROM schedule
	INNER JOIN subject ON schedule.subj_id = subject.subj_id
	INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title
	INNER JOIN course ON curriculum.course_id = course.course_id
	INNER JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id
	INNER JOIN faculty_user ON schedule.faculty_id = faculty_user.id
	WHERE schedule.sched_id = $id";
$query_get = mysqli_query($conn, $query2) or die(mysqli_error($conn));
$data = mysqli_fetch_assoc($query_get);

if($data['laboratory_day'] == '') {
	$time = date("g:i a", strtotime($data['lecturehr_from'])).'-'.date("g:i a", strtotime($data['lecturehr_to']));
	if($data['lecture_day'] == 'Thursday') {
		$day = substr($data['lecture_day'],0,2);
	}
	else{
		$day = substr($data['lecture_day'],0,1);
	}
	$room = $data['lec_room'];
}
else {
	$time = date("g:i a", strtotime($data['lecturehr_from'])).'-'.date("g:i a", strtotime($data['lecturehr_to'])).'/'.date("g:i a", strtotime($data['laboratoryhr_from'])).'-'.date("g:i a", strtotime($data['laboratoryhr_to']));
	if($data['lecture_day'] == $data['laboratory_day']) {
		if($data['lecture_day'] == 'Thursday'){
			$day = substr($data['lecture_day'],0,2);
		}
		else {
			$day = substr($data['lecture_day'],0,1);
		}
	}
	else {
		if($data['laboratory_day'] == 'Thursday'){
			if($data['lecture_day'] == 'Thursday') {
				$day = substr($data['lecture_day'],0,2).'/';
			}
			else {
				$day = substr($data['lecture_day'],0,1).'/';
			}

			$day .= substr($data['laboratory_day'],0,2);
		}
		else {
			if($data['lecture_day'] == 'Thursday') {
				$day = substr($data['lecture_day'],0,2).'/';
			}
			else {
				$day = substr($data['lecture_day'],0,1).'/';
			}
			
			$day .= substr($data['laboratory_day'],0,1);
		}
	}
	$room = $data['lec_room'].'/'.$data['lab_room'];
}

$spreadsheet->getSheet(1)
	->setCellValue('A3', $data['school_year'].' '.$data['semester'])
	->setCellValue('C5', $data['subject_title'])
	->setCellValue('C6', $data['subject_code'])
	->setCellValue('C7', strtoupper($data['lastname'].', '.$data['firstname'].' '.substr($data['middlename'],0,1)))
	->setCellValue('C8', $data['units'])
	->setCellValue('X5', $time)
	->setCellValue('X7', $day)
	->setCellValue('X8', $room)
	->setCellValue('BB5', $data['course'])
	->setCellValue('AN5', $data['year'])
	->setCellValue('AN6', $data['section'])
	->setCellValue('L88', strtoupper($data['lastname'].', '.$data['firstname'].' '.$data['middlename']));

$writer = IOFactory::createWriter($spreadsheet, "Xlsx");
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="'.$data['section'].'-'.$data['subject_code'].'.xlsx"');
$writer->save("php://output");

$query3 = mysqli_query($conn, "UPDATE class_record SET downloaded = 1 WHERE sched_id = $id");