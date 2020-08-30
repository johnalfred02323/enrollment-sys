<?php

include('../../../config/config.php');

$table = 'other_fees';

$primaryKey = 'ofs_id';

$columns = array(
	array('db' => 'description', 'dt' => 0),
	array('db' => 'price', 'dt' => 1),
	array('db' => 'date_implemented', 'dt' => 2, 'formatter' => function($d,$row){return date('jS M Y', strtotime($d));}),
	array('db' => 'ofs_id', 'dt' => 3, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="edit-user pull-xs-right edit" data-toggle="modal" data-target="#otherfees_modal" ripple><i class="fas fa-edit"></i> EDIT</button> <button id="'.$d.'" class="delete-user pull-xs-right delete" data-toggle="modal" data-target="#yesorno" ripple><i class="far fa-trash-alt"></i> DELETE</button>';})
);

require('../../../src/ssp1.class.php');

echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns));