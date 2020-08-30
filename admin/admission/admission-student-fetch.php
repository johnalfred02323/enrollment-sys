<?php
$dbDetails = array(
'host' => 'localhost',
'user' => 'root',
'pass' => '',
'db'   => 'grc_db'
);

$table = <<<EOT
 (
 SELECT * FROM student_info ORDER BY sisnum DESC
 ) temp
EOT;

$primaryKey = 'sisnum';

$columns = array(
	array('db' => 'sisnum', 'dt' => 0),
	array('db' => 'student_number', 'dt' => 1),
	array('db' => 'lastname', 'dt' => 2),
	array('db' => 'firstname', 'dt' => 3),
	array('db' => 'middlename', 'dt' => 4),
	array('db' => 'con_num', 'dt' => 5),
	array('db' => 'sisnum', 'dt' => 6, 'formatter' => function($d,$row){return '
		<a href="student/admission-student-information?sisnum='.$d.'"><button id="'.$d.'" class="edit-user pull-xs-right edit" data-toggle="modal" data-target="" ripple>
			<i class="fas fa-edit"></i> EDIT</button></a>
		<button id="'.$d.'" class="delete-user pull-xs-right delete" data-toggle="modal" data-target="#yesorno" ripple>
			<i class="far fa-trash-alt"></i> DELETE</button>
        <button id="'.$d.'" class="shift-user pull-xs-right viewinfo" data-toggle="modal" data-target="#view-details" ripple>
			<i class="far fa-eye"></i> VIEW</button>			
		<button id="'.$d.'" class="view-user bg-info border-info pull-xs-right shift" ><i class="fas fa-exchange-alt" aria-hidden="true"></i> SHIFT 
			</button>
        <button id="'.$d.'" class="view-user pull-xs-right proceed" data-target="admission-evaluation-of-scores" ripple onclick="reset()"> Proceed
			<i class="fa fa-arrow-right" aria-hidden="true"></i></button>			

        <a class=" collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">

          <button id="'.$d.'" class="edit-user pull-xs-right " ripple onclick="reset()"> Form
			<i class="fa fa-arrow-down" aria-hidden="true"></i></button>

        </a>

        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="sub-nav py-2 collapse-inner">
            <button id="'.$d.'" class="view-user pull-xs-right requestletter" ripple onclick="reset()"> Request TOR
			<i class="fa fa-arrow-right" aria-hidden="true"></i></button>
			<button id="'.$d.'" class="view-user pull-xs-right testpermit" ripple onclick="reset()"> Test Permit
			<i class="fa fa-arrow-right" aria-hidden="true"></i></button>
			<button id="'.$d.'" class="view-user pull-xs-right compform" data-toggle="modal" data-target="#subjects" ripple> Completion Form <i class="fa fa-arrow-right" aria-hidden="true"></i></button></a>
          </div>
        </div>';})
);

require('../../src/ssp1.class.php');

echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns));