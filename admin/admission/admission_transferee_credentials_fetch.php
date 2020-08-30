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
      admission_transfereestudent_credentials.transferee_credentials_id, 
      admission_transfereestudent_credentials.certificate_of_grades, 
      admission_transfereestudent_credentials.tor, 
      admission_transfereestudent_credentials.hd, 
      admission_transfereestudent_credentials.tgmc, 
      admission_student_musthave.txt, 
      admission_student_musthave.oxo, 
      admission_student_musthave.barangay_clearance, 
      admission_student_musthave.PBC,
      admission_student_musthave.admission_test,
      admission_student_musthave.PMC,
      admission_student_musthave.LBE
    FROM student_info
    LEFT JOIN admission_transfereestudent_credentials ON student_info.sisnum = admission_transfereestudent_credentials.sisnum
    LEFT JOIN admission_student_musthave ON student_info.sisnum = admission_student_musthave.sisnum GROUP BY admission_transfereestudent_credentials.sisnum
 ) temp
EOT;


$primaryKey = 'sisnum';

$columns = array(
  array('db' => 'sisnum', 'dt' => 0),
  array('db' => 'student_number', 'dt' => 1),
  array('db' => 'fullname', 'dt' => 2),
  array('db' => 'certificate_of_grades', 'dt' => 3, 'formatter' => function($d,$row){if($d == 1) return '<i class="fas fa-check"></i>';}),
  array('db' => 'tor', 'dt' => 4, 'formatter' => function($d,$row){if($d == 1) return '<i class="fas fa-check"></i>';}),
  array('db' => 'hd', 'dt' => 5, 'formatter' => function($d,$row){if($d == 1) return '<i class="fas fa-check"></i>';}),
  array('db' => 'tgmc', 'dt' => 6, 'formatter' => function($d,$row){if($d == 1) return '<i class="fas fa-check"></i>';}),
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
$where = "stu_orientation = 'Transferee'";
echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $where));