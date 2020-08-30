<?php
include('../../config/config.php');

$table = <<<EOT
	(
		SELECT
			id,
			CONCAT(lastname,', ',firstname, ' ', SUBSTR(middlename,1,1),'.') as full_name,
			email,
			contact_number,
			created_at,
			updated_at,
			CONCAT(status,id) as stat_w_id
		FROM faculty_user
	) temp
EOT;

$primaryKey = 'id';

$columns = array(
	array('db' => 'full_name', 'dt' => 0),
	array('db' => 'email', 'dt' => 1),
	array('db' => 'contact_number', 'dt' => 2),
	array('db' => 'created_at', 'dt' => 3),
	array('db' => 'updated_at', 'dt' => 4),
	array('db' => 'stat_w_id', 'dt' => 5, 'formatter' => function($d,$row){
		$stat = substr($d, 0,1);
		$id = substr($d, 1,strlen($d));
		if ($stat == 1) {
			return '<button id="'.$id.'" class="btn btn-danger stat_btn" ripple><i class="fas fa-user-slash"></i> Disable User</button>';
			}
		else {
			return '<button id="'.$id.'" class="btn btn-primary stat_btn" ripple><i class="fas fa-user"></i> Enable User</button>';
			}
		})
);

require 'ssp.customized.php';

echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns));
