<?php
include('../../../config/config.php');

$table = <<<EOT
	(
		SELECT
			student_info.student_number,
			CONCAT(student_info.lastname,', ',student_info.firstname, ' ', SUBSTR(student_info.middlename,1,1),'.') as full_name,
			student_info.email,
			student_info.con_num,
			student_user.created_at,
			student_user.updated_at
		FROM student_info
		INNER JOIN student_user ON student_info.student_number = student_user.student_number
	) temp
EOT;

$primaryKey = 'student_number';

$columns = array(
	array('db' => 'student_number', 'dt' => 0),
	array('db' => 'full_name', 'dt' => 1),
	array('db' => 'email', 'dt' => 2),
	array('db' => 'con_num', 'dt' => 3),
	array('db' => 'created_at', 'dt' => 4),
	array('db' => 'updated_at', 'dt' => 5)
);

require 'ssp.customized.php';

echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns));
