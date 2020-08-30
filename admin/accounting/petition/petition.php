<?php

include('../../../config/config.php');

$table = <<<EOT
 (
    SELECT 
      petition_request.pet_id,
      petition_request.student_number, 
      petition_request.subj_id,
      petition_request.subject_code,
      petition_request.sched_id,
      petition_request.status,
      petition_request.school_year,
      petition_request.semester
    FROM petition_request
    group by subject_code
    
 ) temp
EOT;

$primaryKey = 'pet_id';

$columns = array(
	array('db' => 'subj_id', 'dt' => 0),
	array('db' => 'subject_code', 'dt' => 1),
	array('db' => 'sched_id', 'dt' => 2),

	array('db' => 'subj_id', 'dt' => 3, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="add-user pull-xs-right addpet" data-toggle="modal" data-target="#ms_modal" ripple><i class="fas fa-edit"></i> ADD</button> ';})

);

$query = "SELECT * FROM timeframe WHERE status='Active' AND type='enrollment'";
$result = mysqli_query($conn, $query) OR die(mysqli_error($conn));
$result_data = mysqli_fetch_assoc($result);

require('../../../src/ssp1.class.php');
$WHERE = 'school_year = "'.$result_data['school_year'].'" AND semester = "'.$result_data['semester'].'" ';

echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $WHERE));