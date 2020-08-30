<?php
include('../../../config/config.php');

// $table = 'user';
$table = <<<EOT
	(
		SELECT
			id,
			CONCAT(lastname,', ',firstname, ' ', SUBSTR(middlename,1,1),'.') as full_name,
			department,
			usertype,
			course,
			major,
			created_at,
			updated_at
		FROM user
	) temp
EOT;

$primaryKey = 'id';

$columns = array(
	array('db' => 'full_name', 'dt' => 0),
	// array('db' => 'lastname', 'dt' => 1),
	// array('db' => 'middlename', 'dt' => 2),
	// array('db' => 'username', 'dt' => 3),
	array('db' => 'usertype', 'dt' => 1),
	array('db' => 'department', 'dt' => 2),
	array('db' => 'created_at', 'dt' => 3, 'formatter' => function($d,$row){return date('jS M Y', strtotime($d));}),
	array('db' => 'updated_at', 'dt' => 4, 'formatter' => function($d,$row){return date('jS M Y', strtotime($d));}),
	array('db' => 'id', 'dt' => 5, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="btn btn-secondary edit" data-toggle="modal" data-target="#user_modal" ripple><i class="fas fa-edit"></i> EDIT</button> <button id="'.$d.'" class="btn btn-danger delete" data-toggle="modal" data-target="#yesorno" ripple><i class="far fa-trash-alt"></i> DELETE</button>';})
);

require 'ssp.customized.php';

echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns));