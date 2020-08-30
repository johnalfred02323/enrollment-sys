<?php
include('../../config/config.php');

$table = <<<EOT
	(
		SELECT
			faculty_user.id as u_id,
			CONCAT(faculty_user.lastname,', ',faculty_user.firstname, ' ', SUBSTR(faculty_user.middlename,1,1),'.') as full_name,
			schedule.sched_id,
			schedule.faculty_id,
			schedule.school_year,
			schedule.semester,
			subject.subject_code,
			schedule.section,
			class_record.id as cr_id,
			class_record.sched_id as cr_scid,
			class_record.excel_file,
			class_record.submitted_at
		FROM class_record
		LEFT JOIN schedule ON schedule.sched_id = class_record.sched_id
		LEFT JOIN faculty_user ON faculty_user.id = schedule.faculty_id
		LEFT JOIN subject ON schedule.subj_id = subject.subj_id
	) temp
EOT;

$primaryKey = 'cr_id';

$columns = array(
	array('db' => 'full_name', 'dt' => 0),
	array('db' => 'section', 'dt' => 1),
	array('db' => 'subject_code', 'dt' => 2),
	array('db' => 'school_year', 'dt' => 3),
	array('db' => 'semester', 'dt' => 4),
	array('db' => 'cr_id', 'dt' => 5, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="view-user pull-xs-right change-gr" ripple><i class="far fa-exchange-alt"></i> Change Grade</button>';})
);

$where = 'excel_file <> "" AND DATE_ADD(`submitted_at`, INTERVAL 1 YEAR) >= NOW()';
if(isset($_GET['sy'])) {
	$where .= ' AND school_year = "'.$_GET['sy'].'"';
}

require 'ssp.customized.php';

echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $where));
?>
