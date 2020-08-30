<?php
include('../../config/config.php');

$table = <<<EOT
	(
		SELECT
			DISTINCT curriculum.course_id,
			course.course_abbreviation as course,			
			schedule.school_year,
			schedule.semester
		FROM schedule 
		LEFT JOIN subject ON schedule.subj_id = subject.subj_id 
		LEFT JOIN curriculum ON subject.curriculum_title = curriculum.curriculum_title
		INNER JOIN course ON curriculum.course_id	= course.course_id
	) temp
EOT;

$primaryKey = 'course';

$columns = array(
	array('db' => 'course', 'dt' => 0),
	array('db' => 'semester', 'dt' => 1),
	array('db' => 'course', 'dt' => 2, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="view-user pull-xs-right generate-course" ripple> Generate Grade Slip</button>';})
);

require 'ssp.customized.php';

$where = '';
if(isset($_GET['school_year'])) {
	$where .= 'school_year = "'.$_GET['school_year'].'"';
}



if($where == '') {
	echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns));
}
else {
	echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $where));
}
?>