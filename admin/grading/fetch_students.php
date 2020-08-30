<?php
include('../../config/config.php');

$table = <<<EOT
	(
		SELECT
			DISTINCT student_enrollment_record.student_number,
			CONCAT(student_info.lastname,', ',student_info.firstname, ' ', SUBSTR(student_info.middlename,1,1),'.') as full_name,
			student_info.course_id,
			course.course_abbreviation as course,
			CONCAT(grade_viewing_code.status,grade_viewing_code.code) as code_stat,			
			schedule.school_year,
			schedule.semester
		FROM student_enrollment_record
		INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id
		INNER JOIN student_info ON student_info.student_number = student_enrollment_record.student_number
		LEFT JOIN grade_viewing_code ON grade_viewing_code.student_number = student_info.student_number
		INNER JOIN course ON student_info.course_id	= course.course_id
	) temp
EOT;

$primaryKey = 'student_number';

$columns = array(
	array('db' => 'student_number', 'dt' => 0),
	array('db' => 'full_name', 'dt' => 1),
	array('db' => 'code_stat', 'dt' => 2, 'formatter' => function($d,$row){ 
		$stat = substr($d, 0,1);
		$code = substr($d, 1,strlen($d));
		if($stat == 1){
		 	return '<span style="color:green;">'.$code.'</span>';
		} 
		else if($stat == 0) { 
			return '<span style="color:red;">'.$code.'</span>';
		}
	}),
	array('db' => 'student_number', 'dt' => 3, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="view-user pull-xs-right generate" ripple> Generate</button>';})
);

require 'ssp.customized.php';

$where = "school_year = '".$_GET["school_year"]."' AND semester = '".$_GET["semester"]."'";

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


