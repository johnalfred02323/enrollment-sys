<?php
include('../config/config.php');

$table = <<<EOT
 (
    SELECT 
      faculty_user.id as fac_id,
      schedule.sched_id,
      schedule.section,
      schedule.subj_id,
      schedule.lecture_day,
      schedule.faculty_id,
      class_record.submitted,
      class_record.downloaded,
      class_record.id as cr_id,
      subject.subject_code
    FROM schedule
    LEFT JOIN faculty_user ON schedule.faculty_id = faculty_user.id
    LEFT JOIN class_record ON schedule.sched_id = class_record.sched_id
    LEFT JOIN subject ON schedule.subj_id = subject.subj_id
 ) tbl
EOT;

$primaryKey = 'sched_id'; 

$columns = array(
	array('db' => 'section', 'dt' => 0),
	array('db' => 'subject_code', 'dt' => 1),
	array('db' => 'lecture_day', 'dt' => 2),
	array('db' => 'cr_id', 'dt' => 3, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="view-user pull-xs-right view" ripple><i class="far fa-eye"></i> VIEW CLASS</button>';}),
  array('db' => 'sched_id', 'dt' => 4, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="view-user pull-xs-right download" ripple><i class="fas fa-file-download"></i> DOWNLOAD CLASS RECORD</button>';}),
  array('db' => 'submitted', 'dt' => 5, 'formatter' => function($d,$row){
    if($d == 1) {
      return 'Grades Already Submitted';
    }
    else {
      return 'Waiting for grades submission.';
    }
  })
);

$where = 'fac_id = '.$_GET['faculty_id'];

require('ssp.customized.class.php');


echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $where));
