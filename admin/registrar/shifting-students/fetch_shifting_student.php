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
      shifting_student.student_number,
      CONCAT(student_info.lastname,", ",student_info.firstname," ", LEFT(student_info.middlename, 1),". ", student_info.suffix) AS fullname,
      shifting_student.school_year,
      shifting_student.semester,
      shifting_student.status,
      CONCAT(a.course_abbreviation," - ",a.course_major) course_from,
      CONCAT(b.course_abbreviation," - ",b.course_major) course_to
    FROM shifting_student
    LEFT JOIN student_info ON student_info.student_number =  shifting_student.student_number
    LEFT JOIN course a ON shifting_student.course_from = a.course_id
    LEFT JOIN course b ON shifting_student.course_to = b.course_id
 ) temp
EOT;

$primaryKey = 'student_number'; 

$columns = array(
  array('db' => 'student_number', 'dt' => 0),
  array('db' => 'fullname', 'dt' => 1),
  array('db' => 'course_from', 'dt' => 2),
  array('db' => 'course_to', 'dt' => 3),
  array('db' => 'school_year', 'dt' => 4),
  array('db' => 'semester', 'dt' => 5),
  array('db' => 'status', 'dt' => 6),
  array('db' => 'student_number', 'dt' => 7, 'formatter' => function($d,$row){return '<button id="'.$d.'"  class="view-user pull-xs-right viewstud" ripple><i class="far fa-eye"></i> View</button>';})

);
require('../../../src/ssp1.class.php');
if(isset($_GET['schoolyear']) && isset($_GET['semester']) && isset($_GET['view'])){
    $schoolyear = $_GET['schoolyear']; 
    $semester = $_GET['semester']; 
    $view = $_GET['view']; 
if($schoolyear =='' && $semester =='')
{
  $where = "school_year != '' && semester != ''";
}
else if($schoolyear !='' && $semester =='' )
{
  $where = "school_year = '".$schoolyear."' && semester != ''";
}
else if($schoolyear !='' && $semester !='' && $view =='ALL')
{
  $where = "school_year != '' && semester = '".$semester."' && status != ''";
}
else if($schoolyear !='' && $semester !='' && $view =='Requested')
{
  $where = "school_year != '' && semester = '".$semester."' && status = 'Requested'";
}
else if($schoolyear !='' && $semester !='' && $view =='Approved')
{
  $where = "school_year != '' && semester = '".$semester."' && status = 'Approved'";
}
else if($schoolyear !='' && $semester !='' && $view =='With Credited Subjects')
{
  $where = "school_year != '' && semester = '".$semester."' && status = 'Credited'";
}
else
{
  $where = "school_year = '".$schoolyear."' && semester = '".$semester."'";
}
}
echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $where));
?>
