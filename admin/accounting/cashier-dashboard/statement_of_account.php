<?php

include('../../../config/config.php');


$table = <<<EOT
 (
    SELECT 
      statement_of_account.sao_id,
      statement_of_account.student_number, 
      student_info.lastname, 
      student_info.firstname, 
      student_info.middlename,  
      student_info.course_id,
      course.course_abbreviation as course,
      statement_of_account.schoolyear,
      statement_of_account.semester,
      statement_of_account.date_created
    FROM statement_of_account
    LEFT JOIN student_info ON statement_of_account.student_number = student_info.student_number
    LEFT JOIN course ON student_info.course_id = course.course_id
 ) temp
EOT;

$primaryKey = 'sao_id'; 

$columns = array(
  array('db' => 'student_number', 'dt' => 0),
  array('db' => 'course', 'dt' => 1),
  array('db' => 'date_created', 'dt' => 2, 'formatter' => function($d,$row){return date('jS M Y', strtotime($d));}),
  array('db' => 'sao_id', 'dt' => 3, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="view-user pull-xs-right edit" data-toggle="modal" data-target="#ms_modal" ripple><i class="fas fa-eye"></i> VIEW</button>';})

);

$query = "SELECT * FROM timeframe WHERE status='Active' AND type='enrollment'";
$result = mysqli_query($conn, $query) OR die(mysqli_error($conn));
$result_data = mysqli_fetch_assoc($result);

require('../../../src/ssp1.class.php');
$WHERE = 'schoolyear = "'.$result_data['school_year'].'" AND semester = "'.$result_data['semester'].'" ';

echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $WHERE));

