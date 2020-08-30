<?php

include('../../../config/config.php');


$table = <<<EOT
 (
    SELECT 
      payment_com.paycom,
      payment_com.student_number, 
      CONCAT(student_info.lastname,', ',student_info.firstname, ' ', SUBSTR(student_info.middlename,1,1),'.') as full_name,
      student_info.course,
      payment_com.scholar,
      payment_com.schoolyr,
      payment_com.semester,
      payment_com.date_enrolled
    FROM payment_com
    LEFT JOIN student_info ON payment_com.student_number = student_info.student_number
    
 ) temp
EOT;

$primaryKey = 'paycom'; 

$columns = array(
  array('db' => 'student_number', 'dt' => 0),
  array('db' => 'full_name', 'dt' => 1),
  array('db' => 'course', 'dt' => 2),
  array('db' => 'scholar', 'dt' => 3),
  array('db' => 'date_enrolled', 'dt' => 4, 'formatter' => function($d,$row){return date('jS M Y', strtotime($d));})

);

$query = "SELECT * FROM timeframe WHERE status='Active' AND type='enrollment'";
$result = mysqli_query($conn, $query) OR die(mysqli_error($conn));
$result_data = mysqli_fetch_assoc($result);

require('../../../src/ssp1.class.php');
$WHERE = 'scholar = "Full Scholar" AND schoolyr = "'.$result_data['school_year'].'" AND semester = "'.$result_data['semester'].'" ';

echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $WHERE));