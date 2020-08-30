<?php

$dbDetails = array(
'host' => 'localhost',
'user' => 'root',
'pass' => '',
'db'   => 'grc_db'
);

$table =<<<EOT
 ( SELECT DISTINCT
  course.course_id,
  course.course_name,
  course.created_at, 
  course.updated_at, 
  course.course_abbreviation AS course, 
  course.course_year AS year 
  FROM course GROUP BY course_abbreviation
  ) temp
EOT;

$primaryKey = 'course';

$columns = array(
	array('db' => 'course', 'dt' => 0),
	array('db' => 'course_name', 'dt' => 1),
	array('db' => 'year', 'dt' => 2),
	array('db' => 'created_at', 'dt' => 3, 'formatter' => function($d,$row){return date('jS M Y', strtotime($d));}),
	array('db' => 'updated_at', 'dt' => 4, 'formatter' => function($d,$row){return date('jS M Y', strtotime($d));}),
	array('db' => 'course', 'dt' => 5, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="view-user pull-xs-right addmajor" ripple ><i class="fas fa-plus"></i> MAJOR</button> <button id="'.$d.'" class="edit-user pull-xs-right edit" ripple><i class="fas fa-edit"></i> EDIT</button>';})
);

require('../../../src/ssp1.class.php');


echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns));