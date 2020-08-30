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
      student_enrollment_record.student_number,
      student_info.firstname, 
      student_info.lastname, 
      student_info.middlename, 
      schedule.school_year,
      schedule.semester,
      course.course_abbreviation As Course,
      course.course_major As Major
    FROM student_enrollment_record
    LEFT JOIN student_info ON student_info.student_number =  student_enrollment_record.student_number
    LEFT JOIN schedule ON student_enrollment_record.sched_id =  schedule.sched_id
    LEFT JOIN curriculum ON curriculum.curriculum_title = student_info.curriculum_title
    LEFT JOIN course ON curriculum.course_id = course.course_id
 ) temp
EOT;

$primaryKey = 'student_number'; 
$sy = 'school_year';

$columns = array(
  array('db' => 'student_number', 'dt' => 0),
  array('db' => 'lastname', 'dt' => 1),
  array('db' => 'firstname', 'dt' => 2),
  array('db' => 'middlename', 'dt' => 3),
  array('db' => 'Course', 'dt' => 4),
  array('db' => 'Major', 'dt' => 5),
  array('db' => 'school_year', 'dt' => 6),
  array('db' => 'semester', 'dt' => 7),
  array('db' => 'student_number', 'dt' => 8, 'formatter' => function($d,$row){return '<button id="'.$d.'"  class="view-user pull-xs-right view " data-toggle="modal" data-target="#viewmodal" ripple><i class="far fa-eye"></i> View</button> 
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
