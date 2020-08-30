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
      course.course_major As Major,
      year_and_semester.year As Year,
      year_and_semester.yrsem_id 
    FROM schedule
    LEFT JOIN subject ON subject.subj_id =  schedule.subj_id
    LEFT JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title
    LEFT JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id 
    LEFT JOIN course ON course.course_id = curriculum.course_id 
    GROUP BY section ORDER BY yrsem_id DESC
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
if(isset($_GET['schoolyear']) && isset($_GET['semester']) && isset($_GET['course']) && isset($_GET['major']) && isset($_GET['year'])){
    $schoolyear = $_GET['schoolyear']; 
    $semester = $_GET['semester']; 
    $course = $_GET['course']; 
    $major = $_GET['major']; 
    $year = $_GET['year']; 
if($schoolyear =='' && $semester =='')
{
  if($year == 'ALL')
  {
    $where = "school_year != '' && semester != '' && Course = '".$course."' && Major = '".$major."' && Year != ''";
  }
  else
  {
    $where = "school_year != '' && semester != '' && Course = '".$course."' && Major = '".$major."' && Year = '".$year."'";
  }
}
else if($schoolyear !='' && $semester =='')
{
  if($year == 'ALL')
  {
    $where = "school_year = '".$schoolyear."' && semester != ' && Course = '".$course."' && Major = '".$major."'";
  }
  else
  {
    $where = "school_year = '".$schoolyear."' && semester != ' && Course = '".$course."' && Major = '".$major."' && Year = '".$year."'";
  }
}
else if($schoolyear =='' && $semester !='')
{
  if($year == 'ALL')
  {
    $where = "school_year != '' && semester = '".$semester."' && Course = '".$course."' && Major = '".$major."'";
  }
  else
  {
    $where = "school_year != '' && semester = '".$semester."' && Course = '".$course."' && Major = '".$major."' && Year = '".$year."'";
  }
}
else
{

  if($course == 'ALL')
  {
      if($year == 'ALL')
      {
        $where = "school_year = '".$schoolyear."' && semester = '".$semester."' && Course != '' && Major != ''";
      }
      else
      {
        $where = "school_year = '".$schoolyear."' && semester = '".$semester."' && Course != '' && Major != '' && Year = '".$year."'";
      }
  }
  else
  {
      if($year == 'ALL')
      {
        $where = "school_year = '".$schoolyear."' && semester = '".$semester."' && Course = '".$course."' && Major = '".$major."'";
      }
      else
      {
        $where = "school_year = '".$schoolyear."' && semester = '".$semester."' && Course = '".$course."' && Major = '".$major."' && Year = '".$year."'";
      }
  }
}
}
echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $where));
?>
