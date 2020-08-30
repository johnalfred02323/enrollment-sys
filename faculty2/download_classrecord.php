<?php
include('../config/config.php');

require 'vendor/autoload.php';

// use phpoffice\phpspreadsheet\src\PhpSpreadsheet\Spreadsheet;
// use phpoffice\phpspreadsheet\src\PhpSpreadsheet\IOFactory;
// use phpoffice\phpspreadsheet\src\PhpSpreadsheet\Alignment;
// use phpoffice\phpspreadsheet\src\PhpSpreadsheet\Fill;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Alignment;
use PhpOffice\PhpSpreadsheet\Fill;

// get schedule id
$id = $_GET['id'];

// get template
// $reader = src\phpspreadsheet\IOFactory::createReader('Xlsx');
$reader = IOFactory::createReader('Xlsx');
$spreadsheet = $reader->load('src/excel_files/class-record-template.xlsx');
// get data
$query = "SELECT schedule.sched_id, schedule.section, schedule.lec_room, schedule.school_year, schedule.semester, student_info.student_number, student_info.firstname as st_fname, student_info.lastname as st_lname, student_info.middlename as st_mname
FROM student_enrollment_record 
INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id
INNER JOIN student_info ON student_enrollment_record.student_number = student_info.student_number 
WHERE schedule.sched_id = $id";
$data = mysqli_query($conn, $query) or die(mysqli_error($conn));


// loopdata
$startRow = 16;
$currentRow = 16;

while ($row=mysqli_fetch_assoc($data)) {
	$spreadsheet->getActiveSheet()->insertNewRowBefore($currentRow+1,1);
	$name = $row['st_lname'].', '.$row['st_fname'].' '.substr($row['st_mname'], 0, 1).'.';
	$spreadsheet->getActiveSheet()
		->setCellValue('A'.$currentRow, $row['student_number'])
		->setCellValue('B'.$currentRow, $name);

	$currentRow++;
}

$query1 = "SELECT schedule.section, subject.curriculum_title, subject.subject_code, schedule.lecture_day, schedule.lecturehr_to, schedule.lecturehr_from, schedule.laboratory_day, schedule.laboratoryhr_from, schedule.laboratoryhr_to, schedule.lab_room, schedule.lec_room, schedule.school_year, schedule.semester, subject.subject_title, subject.units, subject.subject_code, user.firstname, user.lastname, user.middlename, curriculum.curriculum_title, curriculum.course, curriculum.year
FROM schedule 
INNER JOIN subject ON schedule.subj_id = subject.subj_id
INNER JOIN curriculum ON subject.curriculum_title = curriculum.curriculum_title
INNER JOIN user ON schedule.faculty_id = user.id
WHERE schedule.sched_id = $id";
$solo = mysqli_query($conn, $query1) or die(mysqli_error($conn));
$solo_data = mysqli_fetch_assoc($solo);

$time = '';
$day = '';
$room = '';

if($solo_data['lecture_day'] == $solo_data['laboratory_day']) { 
	$day = $solo_data['lecture_day']; 
} 
else if($solo_data['lecture_day'] == '') {
	$day = $solo_data['laboratory_day'];
}
else if($solo_data['laboratory_day'] == '') {
	$day = $solo_data['lecture_day'];
}
else { 
	$day = $solo_data['lecture_day'].'/'.$solo_data['laboratory_day'];
}

if($solo_data['lec_room'] == $solo_data['lab_room']) { 
	$room = $solo_data['lec_room']; 
} 
else if($solo_data['lec_room'] == '') {
	$room = $solo_data['lab_room'];
}
else if($solo_data['lab_room'] == '') {
	$room = $solo_data['lec_room'];
}
else { 
	$room = $solo_data['lec_room'].'/'.$solo_data['lab_room'];
}

if($solo_data['lecturehr_from'] == '00:00:00' && $solo_data['lecturehr_to'] == '00:00:00') {
	$time = $solo_data['laboratoryhr_from'].'-'.$solo_data['laboratoryhr_to'];
}
else if($solo_data['laboratoryhr_from'] == '00:00:00' && $solo_data['laboratoryhr_to'] == '00:00:00') {
	$time = $solo_data['lecturehr_from'].'-'.$solo_data['lecturehr_to'];
}
else { 
	$time = $solo_data['lecturehr_from'].'-'.$solo_data['lecturehr_to'].'/'.$solo_data['laboratoryhr_from'].'-'.$solo_data['laboratoryhr_to'];
}
$spreadsheet->getActiveSheet()
	->setCellValue('B8', $solo_data['subject_title'])
	->setCellValue('B9', $solo_data['subject_code'])
	->setCellValue('B10', $solo_data['lastname'].', '.$solo_data['firstname'].' '.substr($solo_data['middlename'], 0,1).'.')
	->setCellValue('L92', $solo_data['lastname'].', '.$solo_data['firstname'].' '.substr($solo_data['middlename'], 0,1).'.')
	->setCellValue('B11', $solo_data['units'])
	->setCellValue('X8', $time)
	->setCellValue('X10', $day)
	->setCellValue('X11', $room)
	->setCellValue('AO8', $solo_data['year'])
	->setCellValue('AO9', $solo_data['section'])
	->setCellValue('BC8', $solo_data['course']);

$f_name = $solo_data['course'].'-'.$solo_data['subject_code'];

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet.sheet');
header('Content-Disposition: attachment;filename="'.$f_name.'.xlsx"');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');

$update_cr = mysqli_query($conn, "UPDATE class_record SET downloaded = 1 WHERE sched_id = $id");