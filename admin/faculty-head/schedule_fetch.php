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
      schedule.semester, 
      schedule.school_year, 
      course.course_abbreviation As Course,
      year_and_semester.year As Year 
    FROM schedule
    LEFT JOIN subject ON subject.subj_id =  schedule.subj_id
    LEFT JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title
    LEFT JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id 
    LEFT JOIN course ON course.course_id = curriculum.course_id 
    GROUP BY section,semester
 ) temp
EOT;

$primaryKey = 'section'; 

$columns = array(
  array('db' => 'section', 'dt' => 0),
  array('db' => 'Course', 'dt' => 1),
  array('db' => 'Year', 'dt' => 2),
  array('db' => 'school_year', 'dt' => 3),
  array('db' => 'semester', 'dt' => 4),
    array('db' => 'section', 'dt' => 5, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="view-user pull-xs-right viewdetails" data-toggle="modal" data-target="#view-modal" ripple><i class="far fa-eye"></i> VIEW DETAILS</button>';})

);
require('../../src/ssp1.class.php');
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
