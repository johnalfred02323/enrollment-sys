<?php

include('../../../config/config.php');


$table = <<<EOT
 (
    SELECT 
      transaction.trans_id,
      transaction.studentnumber, 
      CONCAT(student_info.lastname,', ',student_info.firstname, ' ', SUBSTR(student_info.middlename,1,1),'.') as full_name, 
      transaction.official_receipt, 
      other_fees.description,
      transaction.schoolyear,
      transaction.semester,
      transaction.date_paid
    FROM transaction
    LEFT JOIN student_info ON transaction.studentnumber = student_info.student_number
    LEFT JOIN other_fees ON transaction.otherfees_id = other_fees.ofs_id
 ) temp
EOT;

$primaryKey = 'trans_id'; 

$columns = array(
  array('db' => 'studentnumber', 'dt' => 0),
  array('db' => 'full_name', 'dt' => 1),
  array('db' => 'official_receipt', 'dt' => 2),
  array('db' => 'description', 'dt' => 3),
  array('db' => 'date_paid', 'dt' => 4, 'formatter' => function($d,$row){return date('jS M Y', strtotime($d));})

);

$query = "SELECT * FROM timeframe WHERE status='Active' AND type='enrollment'";
$result = mysqli_query($conn, $query) OR die(mysqli_error($conn));
$result_data = mysqli_fetch_assoc($result);

require('../../../src/ssp1.class.php');
$WHERE = 'schoolyear = "'.$result_data['school_year'].'" AND semester = "'.$result_data['semester'].'" ';

echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $WHERE));