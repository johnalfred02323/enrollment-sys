<?php
include('../../config/config.php');

$table = <<<EOT
	(
    SELECT
      class_record.id,
      grade_report.student_number,
      grade_report.midterm_grade,
      grade_report.final_grade,
      grade_report.tfg,
      grade_report.remarks,
      CONCAT(class_record.id,'.',grade_report.student_number) as id_sn,
      CONCAT(student_info.lastname,', ',student_info.firstname, ' ', SUBSTR(student_info.middlename,1,1),'.') as full_name
    FROM grade_report
    LEFT JOIN class_record ON grade_report.cr_id = class_record.id
    LEFT JOIN student_info ON grade_report.student_number = student_info.student_number
	) temp
EOT;

$primaryKey = 'student_number';

$columns = array(
	array('db' => 'student_number', 'dt' => 0),
	array('db' => 'full_name', 'dt' => 1),
	array('db' => 'midterm_grade', 'dt' => 2, 'formatter' => function($d,$row){
    $mgrade = $d;
    $mg_eq = 0;
    if($mgrade == '') { $mg_eq = ''; }
    else if($mgrade > 98) { $mg_eq = '1.00';  }
    else if($mgrade > 95 && $mgrade < 98) { $mg_eq = '1.25'; }
    else if($mgrade > 92 && $mgrade < 96) { $mg_eq = '1.50'; }
    else if($mgrade > 89 && $mgrade < 93) { $mg_eq = '1.75'; }
    else if($mgrade > 86 && $mgrade < 90) { $mg_eq = '2.00'; }
    else if($mgrade > 83 && $mgrade < 87) { $mg_eq = '2.25'; }
    else if($mgrade > 80 && $mgrade < 84) { $mg_eq = '2.50'; }
    else if($mgrade > 77 && $mgrade < 81) { $mg_eq = '2.75'; }
    else if($mgrade > 74 && $mgrade < 78) { $mg_eq = '3.00'; }
    else if($mgrade < 75) { $mg_eq = '5.00'; }
    else { $mg_eq = $mgrade; }
	 	return $mg_eq;
	}),
  array('db' => 'final_grade', 'dt' => 3, 'formatter' => function($d,$row){
    $fgrade = $d;
    $fg_eq = 0;
    if($fgrade == '') { $fg_eq = ''; }
    else if($fgrade > 98) { $fg_eq = '1.00';  }
    else if($fgrade > 95 && $fgrade < 98) { $fg_eq = '1.25'; }
    else if($fgrade > 92 && $fgrade < 96) { $fg_eq = '1.50'; }
    else if($fgrade > 89 && $fgrade < 93) { $fg_eq = '1.75'; }
    else if($fgrade > 86 && $fgrade < 90) { $fg_eq = '2.00'; }
    else if($fgrade > 83 && $fgrade < 87) { $fg_eq = '2.25'; }
    else if($fgrade > 80 && $fgrade < 84) { $fg_eq = '2.50'; }
    else if($fgrade > 77 && $fgrade < 81) { $fg_eq = '2.75'; }
    else if($fgrade > 74 && $fgrade < 78) { $fg_eq = '3.00'; }
    else if($fgrade < 75) { $fg_eq = '5.00'; }
    else { $fg_eq = $fgrade; }
	 	return $fg_eq;
	}),
	array('db' => 'tfg', 'dt' => 4),
	array('db' => 'remarks', 'dt' => 5),
  array('db' => 'id_sn', 'dt' => 6, 'formatter' => function($d,$row){
    $xx = explode(".", $d);
    $cr_id = $xx[0];
    $sn = $xx[1];
    return "<button id='".$cr_id."' name='".$sn."' data-toggle='modal' data-target='#change_grades_modal' class='view-user pull-xs-right change-st-gr' ripple><i class='far fa-exchange-alt'></i> Change Student's Grade</button>";
    })
);

require 'ssp.customized.php';


if(isset($_GET['id'])) {
	$where = "id = ".$_GET['id'];
}

echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $where));
