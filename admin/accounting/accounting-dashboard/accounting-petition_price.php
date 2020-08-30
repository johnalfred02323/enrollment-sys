<?php

include('../../../config/config.php');


$table = 'petition_price';


$primaryKey = 'petid'; 

$columns = array(
  array('db' => 'subject_code', 'dt' => 0),
  array('db' => 'no_student', 'dt' => 1),
  array('db' => 'price', 'dt' => 2),
  array('db' => 'amount', 'dt' => 3),
  array('db' => 'date_submit', 'dt' => 4, 'formatter' => function($d,$row){return date('jS M Y', strtotime($d));})

);


$query = "SELECT * FROM timeframe WHERE status='Active' AND type='enrollment'";
$result = mysqli_query($conn, $query) OR die(mysqli_error($conn));
$result_data = mysqli_fetch_assoc($result);

require('../../../src/ssp1.class.php');

$WHERE = 'school_year = "'.$result_data['school_year'].'" AND semester = "'.$result_data['semester'].'" ';


echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $WHERE));