<?php

include('../../../config/config.php');


$table = <<<EOT
 (
    SELECT 
      petition_request.pet_id,
      petition_request.student_number, 
      CONCAT(student_info.lastname,', ',student_info.firstname, ' ', SUBSTR(student_info.middlename,1,1),'.') as full_name,
      student_info.course_id,
      course.course_abbreviation as course,
      petition_request.subject_code,
      petition_request.status,
      petition_request.school_year,
      petition_request.semester
    FROM petition_request
    LEFT JOIN student_info ON petition_request.student_number = student_info.student_number
    LEFT JOIN course ON student_info.course_id = course.course_id
    
 ) temp
EOT;

$primaryKey = 'pet_id'; 

$columns = array(
  array('db' => 'student_number', 'dt' => 0),
  array('db' => 'full_name', 'dt' => 1),
  array('db' => 'course', 'dt' => 2),
  array('db' => 'subject_code', 'dt' => 3)

);

$query = "SELECT * FROM timeframe WHERE status='Active' AND type='enrollment'";
$result = mysqli_query($conn, $query) OR die(mysqli_error($conn));
$result_data = mysqli_fetch_assoc($result);

require('../../../src/ssp1.class.php');
$WHERE = 'status = "Accepted" AND school_year = "'.$result_data['school_year'].'" AND semester = "'.$result_data['semester'].'" ';


echo json_encode(SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $WHERE));