<?php

include('../../../config/config.php');


$table = 'entrance_exam';


$primaryKey = 'e_id'; 

$columns = array(
  array('db' => 'lastname', 'dt' => 0),
  array('db' => 'firstname', 'dt' => 1),
  array('db' => 'middlename', 'dt' => 2),
  array('db' => 'official_receipt', 'dt' => 3),
  array('db' => 'school_yr', 'dt' => 4),
  array('db' => 'semester', 'dt' => 5),
  array('db' => 'price', 'dt' => 6),
  array('db' => 'date_paid', 'dt' => 7, 'formatter' => function($d,$row){return date('jS M Y', strtotime($d));})

);

require('../../../src/ssp1.class.php');

echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns));