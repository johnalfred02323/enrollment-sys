<?php
$dbDetails = array(
'host' => 'localhost',
'user' => 'root',
'pass' => '',
'db'   => 'grc_db'
);

$table = <<<EOT
 (
    SELECT 
      student_enrollment_record.student_number,  
      CONCAT(student_info.lastname,", ",student_info.firstname," ", LEFT(student_info.middlename, 1),". ", student_info.suffix) AS fullname,
      course.course_abbreviation AS course, 
      course.course_major AS major, 
      student_enrollment_record.status, 
      student_enrollment_record.date,
      schedule.school_year, schedule.semester
    FROM student_enrollment_record
    LEFT JOIN student_info ON student_enrollment_record.student_number = student_info.student_number
    LEFT JOIN course ON course.course_id = student_info.course_id
    LEFT JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id
    GROUP BY student_enrollment_record.student_number
 ) temp
EOT;

$primaryKey = 'student_number'; 

$columns = array(
	array('db' => 'student_number', 'dt' => 0),
	array('db' => 'fullname', 'dt' => 1),
	array('db' => 'course', 'dt' => 2),
	array('db' => 'major', 'dt' => 3),
	array('db' => 'status', 'dt' => 4),
	array('db' => 'date', 'dt' => 5, 'formatter' => function($d,$row){return date('jS M Y', strtotime($d));}),
		array('db' => 'student_number', 'dt' => 6, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="view-user pull-xs-right viewdata" ripple><i class="fas fa-eye"></i> VIEW</button> <button id="'.$d.'" class="edit-user pull-xs-right editdata" ripple><i class="far fa-edit"></i> Edit</button>';})

);
require('../../src/ssp1.class.php');

if(isset($_GET['course']) && isset($_GET['major']) && isset($_GET['sy']) && isset($_GET['sem']) )
{
    $course = $_GET['course'];  
    $sy = $_GET['sy'];  
    $sem = $_GET['sem']; 
    $major = $_GET['major']; 
    $where = "school_year = '$sy' AND semester = '$sem' AND course = '$course' AND major = '$major' AND status = 'Enrolled'";
  }
echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $where));
?>
