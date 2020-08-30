<?php
$dbDetails = array(
'host' => 'localhost',
'user' => 'root',
'pass' => '',
'db'   => 'grc_db'
);

$table = <<<EOT
 (
    SELECT 
      schedule.sched_id, 
      schedule.section, 
      curriculum.course As Course,
      year_and_semester.year As Year 
    FROM schedule
    LEFT JOIN subject ON subject.subj_id =  schedule.subj_id
    LEFT JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title
    LEFT JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id 
    GROUP BY section
 ) temp
EOT;

$primaryKey = 'section'; 

$columns = array(
  array('db' => 'section', 'dt' => 0),
  array('db' => 'Course', 'dt' => 1),
  array('db' => 'Year', 'dt' => 2),
    array('db' => 'section', 'dt' => 3, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="view-user pull-xs-right viewdetails" data-toggle="modal" data-target="#view-modal" ripple><i class="far fa-eye"></i> VIEW DETAILS</button>';})

);
require('../../../src/ssp1.class.php');
echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns));
?>
