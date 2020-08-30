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
      course.course_major As Major,
      course.course_abbreviation As Course,
      year_and_semester.year As Year 
    FROM schedule
    LEFT JOIN subject ON subject.subj_id =  schedule.subj_id
    LEFT JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title
    LEFT JOIN course ON curriculum.course_id = course.course_id
    LEFT JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id 
    GROUP BY section
 ) temp
EOT;

$primaryKey = 'section'; 

$columns = array(
  array('db' => 'section', 'dt' => 0),
  array('db' => 'Course', 'dt' => 1),
  array('db' => 'Major', 'dt' => 2),
  array('db' => 'Year', 'dt' => 3),
    array('db' => 'section', 'dt' => 4, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="btn btn-primary view" data-toggle="modal" data-target="#modal" ripple><i class="fas fa-eye"></i>&nbsp;VIEW</button>';})

);
require('../../src/ssp1.class.php');
if(isset($_GET['schoolyear']) && isset($_GET['semester']) && isset($_GET['course']) && isset($_GET['major']) && isset($_GET['year'])){
    $schoolyear = $_GET['schoolyear']; 
    $semester = $_GET['semester']; 
    $course = $_GET['course']; 
    $major = $_GET['major']; 
    $year = $_GET['year']; 

  if($course == 'Choose Course' && $major == 'Choose Major' && $year == '')
  {
    $where = "school_year = '".$schoolyear."' && semester = '".$semester."' && section != 'Petition'";
  }

  else if($course != 'Choose Course' && $major == 'Choose Major' && $year == '')
  {
    if($course == 'ALL')
    {
      $where = "school_year = '".$schoolyear."' && semester = '".$semester."' && section != 'Petition'";
    }
    else
    {
      $where = "school_year = '".$schoolyear."' && semester = '".$semester."' && Course = '".$course."' && section != 'Petition'";
    }
  }

  else if($course != 'Choose Course' && $major != 'Choose Major' && $year == '')
  {
      $where = "school_year = '".$schoolyear."' && semester = '".$semester."' && Course = '".$course."' && Major = '".$major."' && section != 'Petition'";
  }

  else if($course == 'Choose Course' && $major == 'Choose Major' && $year != '')
  {
    $where = "school_year = '".$schoolyear."' && semester = '".$semester."' && Year = '".$year."' && section != 'Petition'";
  }


  else if($course != 'Choose Course' && $major == 'Choose Major' && $year != '')
  {
    if($course == 'ALL')
    {
      $where = "school_year = '".$schoolyear."' && semester = '".$semester."' && Year = '".$year."' && section != 'Petition'";
    }
    else
    {
      $where = "school_year = '".$schoolyear."' && semester = '".$semester."' && Course = '".$course."' && Year = '".$year."' && section != 'Petition'";
    }
  }

  else
  {
    $where = "school_year = '".$schoolyear."' && semester = '".$semester."' && Course = '".$course."' && Major = '".$major."' && Year = '".$year."' && section != 'Petition'";
  }
  
}
echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $where));
?>
