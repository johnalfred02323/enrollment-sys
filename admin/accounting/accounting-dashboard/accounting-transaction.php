<?php

include('../../../config/config.php');


$table = <<<EOT
 (
    SELECT 
      transaction_id, 
      CONCAT(lastname,', ',firstname, ' ', SUBSTR(middlename,1,1),'.') as full_name,
      official_receipt,
      cash_rendered,
      amount,
      schoolyr,
      semester,
      cashier,
      description,
      date_paid
    FROM transaction_all
    
 ) temp
EOT;


$primaryKey = 'transaction_id'; 

$columns = array(
  array('db' => 'full_name', 'dt' => 0),
  array('db' => 'official_receipt', 'dt' => 1),
  array('db' => 'cash_rendered', 'dt' => 2),
  array('db' => 'schoolyr', 'dt' => 3),
  array('db' => 'semester', 'dt' => 4),
  array('db' => 'date_paid', 'dt' => 5, 'formatter' => function($d,$row){return date('jS M Y', strtotime($d));})

);

$query = "SELECT * FROM timeframe WHERE status='Active' AND type='enrollment'";
$result = mysqli_query($conn, $query) OR die(mysqli_error($conn));
$result_data = mysqli_fetch_assoc($result);

require('../../../src/ssp1.class.php');
$WHERE = 'schoolyr = "'.$result_data['school_year'].'" AND semester = "'.$result_data['semester'].'" ';

echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $WHERE));