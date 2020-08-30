<?php

include('../../../config/config.php');


$table = <<<EOT
 (
    SELECT 
      transaction_fees.fees_id,
      transaction_fees.student_number, 
      CONCAT(student_info.lastname,', ',student_info.firstname, ' ', SUBSTR(student_info.middlename,1,1),'.') as full_name,  
      student_info.course,
      transaction_fees.cash_rendered,
      transaction_fees.official_receipt,
      transaction_fees.schoolyr,
      transaction_fees.semester,
      transaction_fees.date
    FROM transaction_fees
    LEFT JOIN student_info ON transaction_fees.student_number = student_info.student_number
    
 ) temp
EOT;

$primaryKey = 'fees_id'; 

$columns = array(
  array('db' => 'student_number', 'dt' => 0),
  array('db' => 'full_name', 'dt' => 1),
  array('db' => 'course', 'dt' => 2),
  array('db' => 'cash_rendered', 'dt' => 3),
  array('db' => 'official_receipt', 'dt' => 4),
  array('db' => 'date', 'dt' => 5, 'formatter' => function($d,$row){return date('jS M Y', strtotime($d));})

);

$query = "SELECT * FROM timeframe WHERE status='Active' AND type='enrollment'";
$result = mysqli_query($conn, $query) OR die(mysqli_error($conn));
$result_data = mysqli_fetch_assoc($result);

require('../../../src/ssp1.class.php');
$WHERE = 'schoolyr = "'.$result_data['school_year'].'" AND semester = "'.$result_data['semester'].'" ';

echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $WHERE));