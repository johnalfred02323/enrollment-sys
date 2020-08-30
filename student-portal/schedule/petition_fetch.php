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
      subject.subject_code, 
      subject.subject_title, 
      subject.units,
      schedule.school_year,
      schedule.section,
      schedule.semester,
      year_and_semester.year As Year 
    FROM schedule
    LEFT JOIN subject ON subject.subj_id =  schedule.subj_id
    LEFT JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id 
 ) temp
EOT;

$primaryKey = 'sched_id'; 

$columns = array(
  array('db' => 'subject_code', 'dt' => 0),
  array('db' => 'subject_title', 'dt' => 1),
  array('db' => 'units', 'dt' => 2),
  array('db' => 'Year', 'dt' => 3),
    array('db' => 'sched_id', 'dt' => 4, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="btn btn-primary view2" data-toggle="modal" data-target="#pet-modal" ripple><i class="fas fa-eye"></i>&nbsp;VIEW</button>';})

);
require('../../src/ssp1.class.php');

if(isset($_GET['schoolyear']) && isset($_GET['semester']))
{
    $schoolyear = $_GET['schoolyear']; 
    $semester = $_GET['semester']; 

    $where = "school_year = '".$schoolyear."' && semester = '".$semester."' && section = 'Petition'";
 
}
echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $where));
?>
