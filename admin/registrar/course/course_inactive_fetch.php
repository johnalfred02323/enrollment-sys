<?php

$dbDetails = array(
'host' => 'localhost',
'user' => 'root',
'pass' => '',
'db'   => 'grc_db'
);

$table =<<<EOT
 ( SELECT 
  course.course_id,
  course.course_name,
  course.course_major,
  course.status, 
  course.created_at, 
  course.updated_at, 
  course.course_abbreviation AS course, 
  course.course_year AS year 
  FROM course
  ) temp
EOT;

$primaryKey = 'course_id';

$columns = array(
	array('db' => 'course', 'dt' => 0),
	array('db' => 'course_name', 'dt' => 1),
  array('db' => 'course_major', 'dt' => 2),
	array('db' => 'year', 'dt' => 3),
	array('db' => 'status', 'dt' => 4),
	array('db' => 'created_at', 'dt' => 5, 'formatter' => function($d,$row){return date('jS M Y', strtotime($d));}),
	array('db' => 'updated_at', 'dt' => 6, 'formatter' => function($d,$row){return date('jS M Y', strtotime($d));}),
	array('db' => 'course_id', 'dt' => 7, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="view-user pull-xs-right addmajor" ripple><i class="fas fa-plus"></i> MAJOR</button> <button id="'.$d.'" class="edit-user pull-xs-right edit" ripple><i class="fas fa-edit"></i> EDIT</button> <button id="'.$d.'" class="delete-user pull-xs-right delete" data-toggle="modal" data-target="#yesorno" ripple><i class="far fa-exchange-alt"></i> CHANGE STATUS</button>';})
);

require('../../../src/ssp1.class.php');

$where = "status = 'Inactive'";

echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $where));