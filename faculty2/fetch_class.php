<?php
include('../config/config.php');

$table = <<<EOT
 (
    SELECT 
      user.id as fac_id,
      schedule.sched_id,
      schedule.section,
      schedule.lecture_day,
      schedule.faculty_id,
      subject.subject_code,
      subject.units,
      class_record.submitted,
      class_record.downloaded,
      class_record.id as cr_id
    FROM schedule
    LEFT JOIN user ON schedule.faculty_id = user.id
    LEFT JOIN class_record ON schedule.sched_id = class_record.sched_id
    LEFT JOIN subject ON schedule.subj_id = subject.subj_id
 ) tbl
EOT;

$primaryKey = 'sched_id'; 

$columns = array(
	array('db' => 'section', 'dt' => 0),
	array('db' => 'subject_code', 'dt' => 1),
	array('db' => 'lecture_day', 'dt' => 2),
	array('db' => 'cr_id', 'dt' => 3, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="view-user pull-xs-right view" ripple><i class="far fa-eye"></i> VIEW</button>';}),
  array('db' => 'sched_id', 'dt' => 4, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="view-user pull-xs-right download" ripple><i class="fas fa-file-download"></i> DOWNLOAD CLASS RECORD</button>';})
);

$where = 'fac_id = '.$_GET['faculty_id'];

require('ssp.customized.class.php');


echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $where));
