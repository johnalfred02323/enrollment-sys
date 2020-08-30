<?php
include('../config/config.php');

$table = <<<EOT
	(
		SELECT
			faculty_user.id as u_id,
			CONCAT(faculty_user.lastname,', ',faculty_user.firstname, ' ', SUBSTR(faculty_user.middlename,1,1),'.') as full_name,
			schedule.sched_id,
			schedule.faculty_id,
			schedule.school_year,
			CONCAT(schedule.school_year,' (',schedule.semester,')') as sy_sem,			
			subject.subject_code,
			schedule.section,
			class_record.id as cr_id,
			class_record.sched_id as cr_scid,
			class_record.excel_file
		FROM class_record
		LEFT JOIN schedule ON schedule.sched_id = class_record.sched_id
		LEFT JOIN faculty_user ON faculty_user.id = schedule.faculty_id
		LEFT JOIN subject ON schedule.subj_id = subject.subj_id
	) temp
EOT;

$primaryKey = 'cr_id';

$columns = array(
	array('db' => 'section', 'dt' => 0),
	array('db' => 'subject_code', 'dt' => 1),
	array('db' => 'sy_sem', 'dt' => 2),
	array('db' => 'full_name', 'dt' => 3),
	array('db' => 'cr_id', 'dt' => 4, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="view-user pull-xs-right view" ripple><i class="fas fa-eye"></i> View Grade Report</button>';})
);

$where = 'excel_file <> "" AND u_id = "'.$_GET['fac_id'].'" AND school_year = "'.$_GET['sy'].'"';

require('../src/ssp1.class.php');

echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $where));
?>