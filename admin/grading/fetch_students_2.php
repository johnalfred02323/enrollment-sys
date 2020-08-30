<?php
include('../../config/config.php');

$table = <<<EOT
	(
		SELECT
			DISTINCT student_enrollment_record.student_number,
			CONCAT(student_info.lastname,', ',student_info.firstname, ' ', SUBSTR(student_info.middlename,1,1),'.') as full_name,
			student_info.course_id,
			course.course_abbreviation as course,		
			schedule.school_year,
			schedule.semester
		FROM student_enrollment_record
		INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id
		INNER JOIN student_info ON student_info.student_number = student_enrollment_record.student_number
		INNER JOIN course ON course.course_id = student_info.course_id
        INNER JOIN class_record ON class_record.sched_id = schedule.sched_id
	) temp
EOT;

$primaryKey = 'student_number';

$columns = array(
	array('db' => 'student_number', 'dt' => 0),
	array('db' => 'full_name', 'dt' => 1),
	array('db' => 'semester', 'dt' => 2),
	array('db' => 'student_number', 'dt' => 3, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="view-user pull-xs-right generate-student" ripple> Generate Grade Slip</button>';})
);

require 'ssp.customized.php';

$where = '';

if(isset($_GET["school_year"])){
	$where .= "school_year = '".$_GET["school_year"]."'";
}

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

if($where == '') {
	echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns));
}
else {
	echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $where));
}


