<?php

include('../../../config/config.php');


$table = <<<EOT
 (
    SELECT 
      e_id, 
      CONCAT(lastname,', ',firstname, ' ', SUBSTR(middlename,1,1),'.') as full_name,
      official_receipt,
      school_yr,
      semester,
      price,
      date_paid
    FROM entrance_exam
    
 ) temp
EOT;

$primaryKey = 'e_id'; 

$columns = array(
  array('db' => 'full_name', 'dt' => 0),
  array('db' => 'official_receipt', 'dt' => 1),
  array('db' => 'school_yr', 'dt' => 2),
  array('db' => 'semester', 'dt' => 3),
  array('db' => 'date_paid', 'dt' => 4, 'formatter' => function($d,$row){return date('jS M Y', strtotime($d));})

);

$query = "SELECT * FROM timeframe WHERE status='Active' AND type='enrollment'";
$result = mysqli_query($conn, $query) OR die(mysqli_error($conn));
$result_data = mysqli_fetch_assoc($result);

require('../../../src/ssp1.class.php');
$WHERE = 'school_yr = "'.$result_data['school_year'].'" AND semester = "'.$result_data['semester'].'" ';

echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $WHERE));