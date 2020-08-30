<?php
$dbDetails = array(
'host' => 'localhost',
'user' => 'root',
'pass' => '',
'db'   => 'grc_db'
);

$table = <<<EOT
 (
    SELECT 
      subject.subject_code, 
      subject.subject_title, 
      subject.lecture, 
      subject.laboratory, 
      subject.units, 
      subject.pre_requisite, 
      subject.created_at, 
      subject.updated_at,
      course.course_abbreviation,
      course.course_major, 
      subject.curriculum_title,
      year_and_semester.year As Year,
      year_and_semester.sem As Semester 
    FROM subject
    LEFT JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id
    LEFT JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title 
    LEFT JOIN course ON course.course_id = curriculum.course_id 
 ) temp
EOT;

$primaryKey = 'subject_code'; 

$columns = array(
	array('db' => 'subject_code', 'dt' => 0),
	array('db' => 'subject_title', 'dt' => 1),
  array('db' => 'units', 'dt' => 2),
  array('db' => 'course_abbreviation', 'dt' => 3),
  array('db' => 'course_major', 'dt' => 4),
	array('db' => 'lecture', 'dt' => 5),
	array('db' => 'laboratory', 'dt' => 6),
	array('db' => 'pre_requisite', 'dt' => 7),
  array('db' => 'Year', 'dt' => 8),
  array('db' => 'Semester', 'dt' => 9),
	array('db' => 'created_at', 'dt' => 10, 'formatter' => function($d,$row){return date('jS M Y', strtotime($d));}),
	array('db' => 'updated_at', 'dt' => 11, 'formatter' => function($d,$row){return date('jS M Y', strtotime($d));})
		// ,array('db' => 'subject_code', 'dt' => 10, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="edit-user pull-xs-right edit" data-toggle="modal" data-target="#subject_modal" ripple><i class="fas fa-edit"></i> EDIT</button> <button id="'.$d.'" class="delete-user pull-xs-right delete" data-toggle="modal" data-target="#yesorno" ripple><i class="far fa-trash-alt"></i> DELETE</button>';})

);
require('../../../src/ssp1.class.php');
echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns));
?>
