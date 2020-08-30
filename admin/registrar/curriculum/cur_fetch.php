<?php

$dbDetails = array(
'host' => 'localhost',
'user' => 'root',
'pass' => '',
'db'   => 'grc_db'
);

$table =<<<EOT
 ( SELECT 
 curriculum.curriculum_title,
  curriculum.created_at, 
  curriculum.updated_at, 
  course.course_abbreviation AS course, 
  course.course_major AS major, 
  course.course_year AS year,
  course.status AS status
  FROM curriculum
	INNER JOIN course ON course.course_id = curriculum.course_id
	) temp
EOT;

$primaryKey = 'curriculum_title';

$columns = array(
	array('db' => 'curriculum_title', 'dt' => 0),
	array('db' => 'course', 'dt' => 1),
	array('db' => 'major', 'dt' => 2),
	array('db' => 'year', 'dt' => 3),
	array('db' => 'created_at', 'dt' => 4, 'formatter' => function($d,$row){return date('jS M Y', strtotime($d));}),
	array('db' => 'updated_at', 'dt' => 5, 'formatter' => function($d,$row){return date('jS M Y', strtotime($d));}),
	array('db' => 'curriculum_title', 'dt' => 6, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="edit-user pull-xs-right edit" ripple><i class="fas fa-edit"></i> EDIT</button> <button id="'.$d.'" class="view-user pull-xs-right view" ripple><i class="fas fa-eye"></i> SUBJECTS </button> <button id="'.$d.'" class="delete-user pull-xs-right delete" data-toggle="modal" data-target="#yesorno" ripple><i class="far fa-trash-alt"></i> DELETE</button>';})
);

require('../../../src/ssp1.class.php');
if(isset($_GET['course'])){
$course = $_GET['course']; 
if($course =='ALL')
{
	$where = "course != '' AND status = 'Active'";
} 
else
{
	$where = "course = '".$course."' AND status = 'Active'";
}
}

echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $where));