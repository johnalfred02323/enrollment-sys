<?php
include('../../config/config.php');

$table = <<<EOT
	(
		SELECT
			user.id as u_id,
			CONCAT(user.lastname,', ',user.firstname, ' ', SUBSTR(user.middlename,1,1),'.') as full_name,
			schedule.sched_id,
			schedule.faculty_id,
			schedule.school_year,
			schedule.semester,
			schedule.subject_code,
			schedule.section,
			class_record.id as cr_id,
			class_record.sched_id as cr_scid,
			class_record.excel_file
		FROM class_record
		LEFT JOIN schedule ON schedule.sched_id = class_record.sched_id
		LEFT JOIN user ON user.id = schedule.faculty_id
	) temp
EOT;

$primaryKey = 'cr_id';

$columns = array(
	array('db' => 'full_name', 'dt' => 0),
	array('db' => 'section', 'dt' => 1),
	array('db' => 'subject_code', 'dt' => 2),
	array('db' => 'school_year', 'dt' => 3),
	array('db' => 'semester', 'dt' => 4),
	array('db' => 'excel_file', 'dt' => 5, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="view-user pull-xs-right download" ripple><i class="fas fa-download"></i> DOWNLOAD</button>';})
);

$where = 'excel_file <> ""';
if(isset($_GET['sy'])) {
	$where .= ' AND school_year = "'.$_GET['sy'].'"';
}

require 'ssp.customized.php';

echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $where));
?>