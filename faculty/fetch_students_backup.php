<?php
include('../config/config.php');
$check = mysqli_query($conn, "SELECT * FROM grade_report_draft WHERE cr_id = ".$_GET['cr_id']);

if(mysqli_num_rows($check) > 0) {
  $table  = <<<EOT
  (
    SELECT 
      grade_report_draft.cr_id,
      grade_report_draft.student_number,
      grade_report_draft.final_grade,
      grade_report_draft.remarks,
      student_info.lastname,
      student_info.firstname      
    FROM grade_report_draft
    LEFT JOIN student_info ON student_info.student_number = grade_report_draft.student_number
  ) temp
  EOT;

  $primaryKey = 'student_number';

  $columns = array(
      array('db' => 'student_number', 'dt' => 0),
      array('db' => 'student_number', 'dt' => 1),
      array('db' => 'lastname', 'dt' => 2),
      array('db' => 'firstname', 'dt' => 3),
      array('db' => 'final_grade', 'dt' => 4),
      array('db' => 'remarks', 'dt' => 5)
  );

  $where = 'cr_id = '.$_GET["cr_id"];

  require('ssp.customized.class.php');

  echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $where));
}
else {
  $table = <<<EOT
 (
    SELECT 
      schedule.sched_id,
      student_info.student_number,
      student_info.firstname,
      student_info.lastname
    FROM student_enrollment_record
    LEFT JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id
    LEFT JOIN student_info ON student_enrollment_record.student_number = student_info.student_number
 ) temp
EOT;

$primaryKey = 'student_number'; 

$columns = array(
  array('db' => 'student_number', 'dt' => 0),
  array('db' => 'student_number', 'dt' => 1, 'formatter' => function($d,$row){return '<input type="text" name="'.$d.'" class="counts" hidden>'.$d;}),
  array('db' => 'lastname', 'dt' => 2),
  array('db' => 'firstname', 'dt' => 3),
  array('db' => 'student_number', 'dt' => 4, 'formatter' => function($d,$row){return '<select id="'.$d.'" class="grade"><option value="" hidden selected>--Select--</option><option></option><option>INC</option><option>FA</option><option>DRP</option><option>5.0</option><option>3.0</option><option>2.75</option><option>2.5</option><option>2.25</option><option>2.0</option><option>1.75</option><option>1.5</option><option>1.25</option><option>1.0</option></select>';}),
  array('db' => 'student_number', 'dt' => 5, 'formatter' => function($d,$row){return '<input type="text" id="'.$d.'" class="remarks" disabled>';})
);

$where = 'sched_id = '.$_GET['sc_id'];

require('../src/ssp1.class.php');

echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $where));
}



// 2nd :)


//   $table = <<<EOT
//    (
//       SELECT 
//         student_info.student_number,
//         student_info.firstname,
//         student_info.lastname,
//         grade_report_draft.final_grade,
//         grade_report_draft.remarks
//       FROM student_info
//       LEFT JOIN grade_report_draft ON student_info.student_number = grade_report_draft.student_number 
//    ) temp
//   EOT;

//   $primaryKey = 'student_number'; 

//   $columns = array(
//     array('db' => 'student_number', 'dt' => 0),
//     array('db' => 'student_number', 'dt' => 1),
//     array('db' => 'lastname', 'dt' => 2),
//     array('db' => 'firstname', 'dt' => 3),
//     array('db' => 'final_grade', 'dt' => 4, 'formatter' => function($d,$row){return '<select id="c" class="grade" value="'.$d.'"><option hidden value="">--Select--</option><option value=""></option><option value="INC">INC</option><option value="FA">FA</option><option value="DRP">DRP</option><option value="5.0">5.0</option><option value="3.0">3.0</option><option value="2.75">2.75</option><option value="2.5">2.5</option><option value="2.25">2.25</option><option value="2.0">2.0</option><option value="1.75">1.75</option><option value="1.5">1.5</option><option value="1.25">1.25</option><option value="1.0">1.0</option></select>';}),
//     array('db' => 'remarks', 'dt' => 5, 'formatter' => function($d,$row){return '<input type="text" id="c" class="remarks counts" value="'.$d.'">';})
//   );

//   $where = 'grade_report_draft.cr_id = 1';

//   require('../src/ssp1.customized.class.php');

// echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $where));


// 3rd :))



