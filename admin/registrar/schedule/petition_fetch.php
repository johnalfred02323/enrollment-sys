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
      subject.subject_code,
      subject.subject_title,
      schedule.semester, 
      schedule.school_year, 
      course.course_abbreviation As Course,
      year_and_semester.year As Year 
    FROM schedule
    LEFT JOIN subject ON subject.subj_id =  schedule.subj_id
    LEFT JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title
    LEFT JOIN course ON curriculum.course_id = course.course_id
    LEFT JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id 
 ) temp
EOT;

$primaryKey = 'sched_id'; 

$columns = array(
  array('db' => 'subject_code', 'dt' => 0),
  array('db' => 'subject_title', 'dt' => 1),
  array('db' => 'school_year', 'dt' => 2),
  array('db' => 'semester', 'dt' => 3),
  array('db' => 'section', 'dt' => 4),
    array('db' => 'sched_id', 'dt' => 5, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="view-user pull-xs-right view" data-toggle="modal" data-target="#view-modal" ripple><i class="far fa-eye"></i> VIEW DETAILS</button>';})

);
require('../../../src/ssp1.class.php');
if(isset($_GET['schoolyear']) && isset($_GET['semester'])){
    $schoolyear = $_GET['schoolyear']; 
    $semester = $_GET['semester']; 
if($schoolyear =='' && $semester =='')
{
  $where = "section = 'Petition' && school_year != '' && semester != ''";
}
else if($schoolyear !='' && $semester =='')
{
  $where = "section = 'Petition' && school_year = '".$schoolyear."' && semester != ''";
}
else if($schoolyear =='' && $semester !='')
{
  $where = "section = 'Petition' && school_year != '' && semester = '".$semester."'";
}
else
{
  $where = "section = 'Petition' && school_year = '".$schoolyear."' && semester = '".$semester."'";
}
}
echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $where));
?>
