<?php

include('../../../config/config.php');


$table = <<<EOT
 (
    SELECT 
      payment.payid,
      payment.student_number, 
      CONCAT(student_info.lastname,', ',student_info.firstname, ' ', SUBSTR(student_info.middlename,1,1),'.') as full_name,
      student_info.course_id,
      course.course_abbreviation as course,
      payment.year_level,
      payment.balance, 
      payment.schoolyr,
      payment.semester,
      payment.enrolled_date,
      payment.fd,
      payment.date_paid
    FROM payment
    LEFT JOIN student_info ON payment.student_number = student_info.student_number
    LEFT JOIN course ON student_info.course_id = course.course_id
    
 ) temp
EOT;

$primaryKey = 'payid'; 

$columns = array(
  array('db' => 'student_number', 'dt' => 0),
  array('db' => 'full_name', 'dt' => 1),
  array('db' => 'course', 'dt' => 2),
  array('db' => 'year_level', 'dt' => 3),
  array('db' => 'date_paid', 'dt' => 4, 'formatter' => function($d,$row){return date('jS M Y', strtotime($d));})

);

$query = "SELECT * FROM timeframe WHERE status='Active' AND type='enrollment'";
$result = mysqli_query($conn, $query) OR die(mysqli_error($conn));
$result_data = mysqli_fetch_assoc($result);

require('../../../src/ssp1.class.php');
$WHERE = 'fd = 1 AND schoolyr = "'.$result_data['school_year'].'" AND semester = "'.$result_data['semester'].'" ';


echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $WHERE));