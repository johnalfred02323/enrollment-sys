<?php

include('../../../config/config.php');

$table = 'tuition_fees';

$primaryKey = 'tf_id';

$columns = array(
	array('db' => 'tuition_fees', 'dt' => 0),
	array('db' => 'date_implemented', 'dt' => 1, 'formatter' => function($d,$row){return date('jS M Y', strtotime($d));}),
	array('db' => 'remarks', 'dt' => 2),
	array('db' => 'tf_id', 'dt' => 3, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="edit-user pull-xs-right edit" data-toggle="modal" data-target="#tuitionfees_modal" ripple><i class="fas fa-edit"></i> EDIT</button> <button id="'.$d.'" class="delete-user pull-xs-right delete" data-toggle="modal" data-target="#yesorno" ripple><i class="far fa-trash-alt"></i> DELETE</button>';})
);

require('../../../src/ssp.class.php');

echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns));