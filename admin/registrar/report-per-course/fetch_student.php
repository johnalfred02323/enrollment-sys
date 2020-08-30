<?php
$dbDetails = array(
'host' => 'localhost',
'user' => 'root',
'pass' => '',
'db'   => 'grc_db'
);

$table = <<<EOT
 (
    SELECT DISTINCT
      schedule.school_year,
      schedule.semester,
      course.course_id,
      course.course_abbreviation As Course,
      course.course_major As Major
    FROM schedule
    LEFT JOIN subject ON subject.subj_id =  schedule.subj_id
    LEFT JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title
    LEFT JOIN course ON course.course_id = curriculum.course_id
 ) temp
EOT;

$primaryKey = 'course_id'; 

$columns = array(
  array('db' => 'Course', 'dt' => 0),
  array('db' => 'Major', 'dt' => 1),
  array('db' => 'school_year', 'dt' => 2),
  array('db' => 'semester', 'dt' => 3),
  array('db' => 'course_id', 'dt' => 4, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="view-user pull-xs-right view" data-toggle="modal" data-target="#viewmodal" ripple><i class="far fa-eye"></i> View</button> 
    <button id="'.$d.'" class="delete-user pull-xs-right print" ripple><i class="fas fa-print"></i> PRINT</button> 
    <button id="'.$d.'" class="edit-user pull-xs-right excel" ripple><i class="far fa-file-excel"></i> Excel</button>';})

);
require('../../../src/ssp1.class.php');
if(isset($_GET['schoolyear']) && isset($_GET['semester'])){
    $schoolyear = $_GET['schoolyear']; 
    $semester = $_GET['semester']; 
if($schoolyear =='' && $semester =='')
{
  $where = "school_year != '' && semester != ''";
}
else if($schoolyear !='' && $semester =='')
{
  $where = "school_year = '".$schoolyear."' && semester != ''";
}
else if($schoolyear =='' && $semester !='')
{
  $where = "school_year != '' && semester = '".$semester."'";
}
else
{
  $where = "school_year = '".$schoolyear."' && semester = '".$semester."'";
}
}
echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $where));
?>
