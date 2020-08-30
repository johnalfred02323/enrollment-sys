<?php

include('../../../config/config.php');


$table = <<<EOT
 (
    SELECT 
      transaction.id,
      transaction.studentnumber, 
      student_info.lastname, 
      student_info.firstname, 
      student_info.middlename, 
      transaction.official_receipt, 
      other_fees.description,
      transaction.date_added
    FROM transaction
    LEFT JOIN student_info ON transaction.studentnumber = student_info.student_number
    LEFT JOIN other_fees ON transaction.otherfees_id = other_fees.ofs_id
 ) temp
EOT;

$primaryKey = 'id'; 

$columns = array(
  array('db' => 'studentnumber', 'dt' => 0),
  array('db' => 'lastname', 'dt' => 1),
  array('db' => 'firstname', 'dt' => 2),
  array('db' => 'middlename', 'dt' => 3),
  array('db' => 'official_receipt', 'dt' => 4),
  array('db' => 'description', 'dt' => 5),
  array('db' => 'date_added', 'dt' => 6, 'formatter' => function($d,$row){return date('jS M Y', strtotime($d));})

);

require('../../../src/ssp1.class.php');

echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns));