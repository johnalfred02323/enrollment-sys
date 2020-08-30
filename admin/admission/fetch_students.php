<?php
include('../../config/config.php');

$table = <<<EOT
	(
		SELECT
			student_info.sisnum,
			student_info.student_number,
			CONCAT(student_info.lastname,', ',student_info.firstname, ' ', SUBSTR(student_info.middlename,1,1),'.', student_info.suffix) as full_name,
			course.course_abbreviation AS course,
			student_info.email
		FROM student_info
		INNER JOIN course ON course.course_id = student_info.course_id
	) temp
EOT;

$primaryKey = 'sisnum';

$columns = array(
	array('db' => 'student_number', 'dt' => 0),
	array('db' => 'full_name', 'dt' => 1),
	array('db' => 'course', 'dt' => 2),
	array('db' => 'email', 'dt' => 3, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="view-user pull-xs-right create" ripple> Create Account</button>';})
);

require 'ssp.customized.php';

$where = '';
if(isset($_GET['course'])) {
	$course = json_decode($_GET['course']);
	if(count($course) > 0) { 
		for($i = 0; $i < count($course); $i++) {
			$where .= "student_number != '' && course = '".$course[$i]."' OR ";
		}
		$where = substr($where, 0, -3);
	echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $where));
	}
	else {
		$where .= "student_number != ''";
		echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $where));
	}
}
else {
	$where .= "student_number != ''";
	echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $where));
}
