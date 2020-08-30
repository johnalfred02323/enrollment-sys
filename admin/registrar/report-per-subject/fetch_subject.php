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
      subject.subject_code,
      schedule.sched_id, 
      CONCAT(user.lastname,", ",user.firstname," ", LEFT(user.middlename, 1),". ") AS fullname,
      schedule.section, 
      schedule.school_year,
      schedule.semester,
      course.course_abbreviation As Course,
      course.course_major As Major,
      year_and_semester.year As Year 
    FROM schedule
    LEFT JOIN subject ON subject.subj_id =  schedule.subj_id
    LEFT JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title
    LEFT JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id 
    LEFT JOIN course ON curriculum.course_id = course.course_id
    LEFT JOIN user ON user.id = schedule.faculty_id 
 ) temp
EOT;

$primaryKey = 'sched_id'; 

$columns = array(
  array('db' => 'subject_code', 'dt' => 0),
  array('db' => 'section', 'dt' => 1),
  array('db' => 'Course', 'dt' => 2),
  array('db' => 'Major', 'dt' => 3),
  array('db' => 'Year', 'dt' => 4),
  array('db' => 'fullname', 'dt' => 5),
  array('db' => 'sched_id', 'dt' => 6, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="view-user pull-xs-right view" data-toggle="modal" data-target="#viewmodal" ripple><i class="far fa-eye"></i> View</button> 
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
