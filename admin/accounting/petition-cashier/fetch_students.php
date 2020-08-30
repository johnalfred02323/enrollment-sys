<?php

include('../../../config/config.php');


$table = <<<EOT
 (
    SELECT 
      petition_request.student_number, 
      CONCAT(student_info.lastname,', ',student_info.firstname, ' ', SUBSTR(student_info.middlename,1,1),'.') as full_name,
      student_info.course_id,
      course.course_abbreviation as course,
      petition_request.school_year,
      petition_request.semester,
      petition_request.status,
      petition_request.subject_code,
      petition_request.subj_id,
      petition_price.amount
      FROM petition_request
      INNER JOIN student_info ON student_info.student_number = petition_request.student_number
      INNER JOIN petition_price ON petition_price.subj_id = petition_request.subj_id
      LEFT JOIN course ON student_info.course_id = course.course_id
    
 ) temp
EOT;

$primaryKey = 'student_number'; 

$columns = array(
  array('db' => 'student_number', 'dt' => 0),
  array('db' => 'full_name', 'dt' => 1),
  array('db' => 'student_number', 'dt' => 2, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="view-user pull-xs-right transact" ripple>Transact</button>';})
);

require('../../../src/ssp1.class.php');

$where = "status = 'Approved' AND school_year = '".$_GET["school_year"]."' AND semester = '".$_GET["semester"]."'";

if(isset($_GET['course'])) {
  $course = json_decode($_GET['course']);
  if(count($course) > 0) { 
    $where .= ' AND (';
    for($i = 0; $i < count($course); $i++) {
      $where .= " course = '".$course[$i]."' OR";
    }
    $where = substr($where, 0, -3);
    $where .= ')';
  }
}

echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $where));