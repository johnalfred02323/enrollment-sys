<?php

include('../../../config/config.php');


$table = <<<EOT
 (
    SELECT 
      DISTINCT student_enrollment_record.student_number, 
      CONCAT(student_info.lastname,', ',student_info.firstname, ' ', SUBSTR(student_info.middlename,1,1),'.') as full_name,
      student_info.course_id,
      course.course_abbreviation as course,
      schedule.school_year,
	  schedule.semester,
	  student_enrollment_record.status
    FROM student_enrollment_record
    INNER JOIN student_info ON student_info.sisnum = student_enrollment_record.student_number
    INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id
    INNER JOIN course ON student_info.course_id = course.course_id
    
 ) temp
EOT;

$primaryKey = 'student_number'; 

$columns = array(
  array('db' => 'student_number', 'dt' => 0),
  array('db' => 'full_name', 'dt' => 1),
  array('db' => 'student_number', 'dt' => 2, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="view-user pull-xs-right transact" ripple>Transact</button>';})
);

require('../../../src/ssp1.class.php');

$where = "status = 'Enlisted' AND school_year = '".$_GET["school_year"]."' AND semester = '".$_GET["semester"]."'";

if(isset($_GET['course'])) {
	$course = json_decode($_GET['course']);
	if(count($course) > 0) { 
		$where .= ' AND (';
		for($i = 0; $i < count($course); $i++) {
			$where .= " course = '".$course[$i]."' OR";
		}
		$where = substr($where, 0, -3);
		$where .= ')';
	}
}

echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $where));