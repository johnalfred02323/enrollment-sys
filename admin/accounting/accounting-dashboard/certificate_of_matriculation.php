<?php

include('../../../config/config.php');


$table = <<<EOT
 (
    SELECT 
      payment_com.paycom,
      payment_com.student_number, 
      student_info.lastname, 
      student_info.firstname, 
      student_info.middlename, 
      student_info.course_id,
      course.course_abbreviation,
      payment_com.schoolyr,
      payment_com.semester,
      payment_com.date_enrolled
    FROM payment_com
    LEFT JOIN student_info ON payment_com.student_number = student_info.student_number
    INNER JOIN course ON student_info.course_id = course.course_id
    
 ) temp
EOT;

$primaryKey = 'paycom'; 

$columns = array(
  array('db' => 'student_number', 'dt' => 0),
  array('db' => 'course_abbreviation', 'dt' => 1),
  array('db' => 'date_enrolled', 'dt' => 2, 'formatter' => function($d,$row){return date('jS M Y', strtotime($d));}),
  array('db' => 'paycom', 'dt' => 3, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="view-user pull-xs-right edit" data-toggle="modal" data-target="#ms_modal" ripple><i class="fas fa-eye"></i> VIEW</button>';})

);

$query = "SELECT * FROM timeframe WHERE status='Active' AND type='enrollment'";
$result = mysqli_query($conn, $query) OR die(mysqli_error($conn));
$result_data = mysqli_fetch_assoc($result);

require('../../../src/ssp1.class.php');
$WHERE = 'schoolyr = "'.$result_data['school_year'].'" AND semester = "'.$result_data['semester'].'" ';

echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $WHERE));

