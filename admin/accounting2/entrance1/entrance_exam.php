<?php

include('../../../config/config.php');

$table = 'entrance_exam';

$primaryKey = 'ee_id';

$columns = array(
	array('db' => 'lastname', 'dt' => 0),
	array('db' => 'firstname', 'dt' => 1),
	array('db' => 'middlename', 'dt' => 2),
	array('db' => 'official_receipt', 'dt' => 3),
	array('db' => 'school_yr', 'dt' => 4),
	array('db' => 'semester', 'dt' => 5)
);

require('../../../src/ssp.class.php');

echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns));