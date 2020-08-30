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
      student_info.sisnum,
      student_info.stu_orientation,
      student_info.student_number,
      CONCAT(student_info.lastname,", ",student_info.firstname," ", LEFT(student_info.middlename, 1),". ", student_info.suffix) AS fullname,
      admission_freshmenstudent_credentials.freshmen_credentials_id, 
      admission_freshmenstudent_credentials.form_137A, 
      admission_freshmenstudent_credentials.form_138A, 
      admission_freshmenstudent_credentials.GMC, 
      admission_freshmenstudent_credentials.TRF, 
      admission_student_musthave.txt, 
      admission_student_musthave.oxo, 
      admission_student_musthave.barangay_clearance, 
      admission_student_musthave.PBC,
      admission_student_musthave.admission_test,
      admission_student_musthave.PMC,
      admission_student_musthave.LBE
    FROM student_info
    LEFT JOIN admission_freshmenstudent_credentials ON student_info.sisnum = admission_freshmenstudent_credentials.sisnum
    LEFT JOIN admission_student_musthave ON student_info.sisnum = admission_student_musthave.sisnum GROUP BY admission_freshmenstudent_credentials.sisnum
 ) temp
EOT;


$primaryKey = 'sisnum';

$columns = array(
  array('db' => 'sisnum', 'dt' => 0),
  array('db' => 'student_number', 'dt' => 1),
  array('db' => 'fullname', 'dt' => 2),
  array('db' => 'form_137A', 'dt' => 3, 'formatter' => function($d,$row){if($d == 1) return '<i class="fas fa-check"></i>';}),
  array('db' => 'form_138A', 'dt' => 4, 'formatter' => function($d,$row){if($d == 1) return '<i class="fas fa-check"></i>';}),
  array('db' => 'GMC', 'dt' => 5, 'formatter' => function($d,$row){if($d == 1) return '<i class="fas fa-check"></i>';}),
  array('db' => 'TRF', 'dt' => 6, 'formatter' => function($d,$row){if($d == 1) return '<i class="fas fa-check"></i>';}),
  array('db' => 'txt', 'dt' => 7, 'formatter' => function($d,$row){if($d == 1) return '<i class="fas fa-check"></i>';}),
  array('db' => 'oxo', 'dt' => 8, 'formatter' => function($d,$row){if($d == 1) return '<i class="fas fa-check"></i>';}),
  array('db' => 'barangay_clearance', 'dt' => 9, 'formatter' => function($d,$row){if($d == 1) return '<i class="fas fa-check"></i>';}),
  array('db' => 'PBC', 'dt' => 10, 'formatter' => function($d,$row){if($d == 1) return '<i class="fas fa-check"></i>';}),
  array('db' => 'admission_test', 'dt' => 11, 'formatter' => function($d,$row){if($d == 1) return '<i class="fas fa-check"></i>';}),
  array('db' => 'PMC', 'dt' => 12, 'formatter' => function($d,$row){if($d == 1) return '<i class="fas fa-check"></i>';}),
  array('db' => 'LBE', 'dt' => 13, 'formatter' => function($d,$row){if($d == 1) return '<i class="fas fa-check"></i>';}),
  array('db' => 'sisnum', 'dt' => 14, 'formatter' => function($d,$row){return '
    <a href="admission-credentials?sisnum='.$d.'"><button id="'.$d.'" class="edit-user pull-xs-right edit" data-toggle="modal" data-target="" ripple>
      <i class="fas fa-edit"></i> EDIT</button></a>';})
  
);

require('../../src/ssp1.class.php');
$where = "stu_orientation = 'Freshman'";
echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $where));