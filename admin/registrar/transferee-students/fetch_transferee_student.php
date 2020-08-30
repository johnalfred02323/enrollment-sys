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
      student_info.sisnum,
      student_info.student_number,
      CONCAT(student_info.lastname,", ",student_info.firstname," ", LEFT(student_info.middlename, 1),". ", student_info.suffix) AS fullname,
      student_info.school_year,
      student_info.semester,
      student_info.orientation,
      student_info.school_last_attended,
      course.course_abbreviation AS Course,
      course.course_major AS Major
    FROM student_info
    LEFT JOIN course ON student_info.course_id = course.course_id
 ) temp
EOT;

$primaryKey = 'sisnum'; 

$columns = array(
  array('db' => 'sisnum', 'dt' => 0),
  array('db' => 'student_number', 'dt' => 1),
  array('db' => 'fullname', 'dt' => 2),
  array('db' => 'school_last_attended', 'dt' => 3),
  array('db' => 'Course', 'dt' => 4),
  array('db' => 'Major', 'dt' => 5),
  array('db' => 'school_year', 'dt' => 6),
  array('db' => 'semester', 'dt' => 7),
  array('db' => 'sisnum', 'dt' => 8, 'formatter' => function($d,$row){return '<button id="'.$d.'"  class="view-user pull-xs-right view" ripple><i class="far fa-eye"></i> View Subjects</button>';})

);
require('../../../src/ssp1.class.php');
if(isset($_GET['schoolyear']) && isset($_GET['semester'])){
    $schoolyear = $_GET['schoolyear']; 
    $semester = $_GET['semester']; 
if($schoolyear =='' && $semester =='')
{
  $where = "orientation = 'Transferee' && school_year != '' && semester != ''";
}
else if($schoolyear !='' && $semester =='' )
{
  $where = "orientation = 'Transferee' && school_year = '".$schoolyear."' && semester != ''";
}
else
{
  $where = "orientation = 'Transferee' && school_year = '".$schoolyear."' && semester = '".$semester."'";
}
}
echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $where));
?>
