<?php

include('../../../config/config.php');

$table = 'student_info';

$primaryKey = 'student_number';

$columns = array(
	array('db' => 'student_number', 'dt' => 0),
	array('db' => 'lastname', 'dt' => 1)
);

require('../../../src/ssp1.class.php');

echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns));