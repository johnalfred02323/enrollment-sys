<?php

include('../../../config/config.php');


$table = <<<EOT
 (
    SELECT 
      payment.payid,
      payment.student_number, 
      student_info.lastname, 
      student_info.firstname, 
      student_info.middlename,  
      student_info.course,
      payment.enrolled_date
    FROM payment
    LEFT JOIN student_info ON payment.student_number = student_info.student_number
    
 ) temp
EOT;

$primaryKey = 'payid'; 

$columns = array(
  array('db' => 'student_number', 'dt' => 0),
  array('db' => 'lastname', 'dt' => 1),
  array('db' => 'firstname', 'dt' => 2),
  array('db' => 'middlename', 'dt' => 3),
  array('db' => 'course', 'dt' => 4),
  array('db' => 'enrolled_date', 'dt' => 5, 'formatter' => function($d,$row){return date('jS M Y', strtotime($d));})

);

require('../../../src/ssp1.class.php');

echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns));