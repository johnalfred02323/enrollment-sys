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
      subject.subj_id,  
      subject.subject_code, 
      subject.subject_title, 
      subject.lecture, 
      subject.laboratory, 
      subject.units, 
      subject.pre_requisite, 
      subject.created_at, 
      subject.updated_at, 
      subject.curriculum_title,
      year_and_semester.year As Year,
      year_and_semester.sem As Semester 
    FROM subject
    LEFT JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id
 ) temp
EOT;

$primaryKey = 'subject_code'; 

$columns = array(
	array('db' => 'subject_code', 'dt' => 0),
	array('db' => 'subject_title', 'dt' => 1),
	array('db' => 'lecture', 'dt' => 2),
	array('db' => 'laboratory', 'dt' => 3),
	array('db' => 'units', 'dt' => 4),
	array('db' => 'pre_requisite', 'dt' => 5),
  array('db' => 'Year', 'dt' => 6),
  array('db' => 'Semester', 'dt' => 7),
	array('db' => 'created_at', 'dt' => 8, 'formatter' => function($d,$row){return date('jS M Y', strtotime($d));}),
	array('db' => 'updated_at', 'dt' => 9, 'formatter' => function($d,$row){return date('jS M Y', strtotime($d));}),
		array('db' => 'subj_id', 'dt' => 10, 'formatter' => function($d,$row){return '<button id="'.$d.'" class="edit-user pull-xs-right edit" ripple><i class="fas fa-edit"></i> EDIT</button> <button id="'.$d.'" class="delete-user pull-xs-right delete" data-toggle="modal" data-target="#yesorno" ripple><i class="far fa-trash-alt"></i> DELETE</button>';})

);
require('../../../src/ssp1.class.php');
$title = "";
if(isset($_GET['title'])){
    $title = $_GET['title'];  
}
if(isset($_GET['year'])){
    $year = $_GET['year'];  
}
$where = "(curriculum_title = '".$title."' OR curriculum_title = 'All') AND Semester = 'First Semester' AND Year = '".$year."'";
echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $where));
?>
