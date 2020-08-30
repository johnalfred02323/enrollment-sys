<?php
require '../../../config/config.php';
require '../../../phpspreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Alignment;
use PhpOffice\PhpSpreadsheet\Style;

// get schedule id

// get template
$reader = IOFactory::createReader('Xlsx');
$spreadsheet = $reader->load('../enrollment_report_temp.xlsx');

$spreadsheet->getSecurity()->setLockWindows(true);
$spreadsheet->getSecurity()->setLockStructure(true);

// get data
  $num =0;
  $gender = $_GET['data'];
  $sy = $_GET['data2'];
  $sem = $_GET['data3'];
  $course = $_GET['data4'];
  $major = $_GET['data5'];
  $year = $_GET['data6'];
  $date = $_GET['data7'];

  if($course != 'ALL')
  {
  		$query2 =  mysqli_query($conn, "SELECT * FROM course WHERE course_abbreviation = '$course' AND course_major = '$major'") or die(mysqli_error($conn));
  		$row2=mysqli_fetch_assoc($query2);
  		$spreadsheet->getActiveSheet()
		->setCellValue('D5', $row2['course_name']."(".$course.")")
		->setCellValue('D6', $year);	
  }
  else
  {
		$spreadsheet->getActiveSheet()
		->setCellValue('D5', $course)
		->setCellValue('D6', $year);	
  }
  


if($gender == 'ALL'){ $genderq = " AND student_info.gender != ''"; }
else{ $genderq = " AND student_info.gender = '$gender'"; }
if($course == 'ALL') {$courseq = "";}
else {$courseq = " AND course.course_abbreviation = '$course' AND course.course_major = '$major'";}
if($year == 'ALL') { $yearq = "";}
else{ $yearq = "AND year_and_semester.year = '$year'";}
if($date == 'ALL'){$dateq = "";}
else{ $dateq = "AND DATE(student_enrollment_record.date) = '$date'"; }

	$query =  mysqli_query($conn, "SELECT student_info.student_number, student_info.lastname, student_info.firstname, student_info.middlename, student_info.suffix, student_info.gender, course.course_abbreviation, course.course_major, subject.subject_code, subject.subject_title, subject.units FROM student_info 
	INNER JOIN student_enrollment_record ON student_enrollment_record.student_number = student_info.student_number
	INNER JOIN course ON course.course_id = student_info.course_id
	INNER JOIN schedule ON schedule.sched_id = student_enrollment_record.sched_id
	INNER JOIN subject ON subject.subj_id = schedule.subj_id
	INNER JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id
	WHERE schedule.school_year='$sy' AND schedule.semester = '$sem' $genderq $courseq $yearq $dateq ") or die(mysqli_error($conn));



// loopdata
$startRow = 10;
$currentRow = 10;
$count = 1;
while ($row=mysqli_fetch_array($query)) {
	$spreadsheet->getActiveSheet()
		->setCellValue('B'.$currentRow, $count)
		->setCellValue('C'.$currentRow, $row['student_number'])
		->setCellValue('D'.$currentRow, $row['lastname'])
		->setCellValue('E'.$currentRow, $row['firstname'])
		->setCellValue('F'.$currentRow, $row['suffix'])
		->setCellValue('G'.$currentRow, $row['middlename'])
		->setCellValue('H'.$currentRow, $row['gender'])
		->setCellValue('I'.$currentRow, $row['subject_code'])
		->setCellValue('J'.$currentRow, $row['subject_title'])
		->setCellValue('K'.$currentRow, $row['units']);
	$currentRow++;
	$count++;
}

$writer = IOFactory::createWriter($spreadsheet, "Xlsx");
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="'.$sy.'-'.$sem.'-Gender:'.$gender.'.xlsx"');
$writer ->save('php://output');
?>
