<?php 
include('../../../config/config.php');

if(isset($_POST['search-student'])) {
    $val = $_POST['val'];
    $output = '';
    $query = "SELECT * FROM student_info WHERE student_number LIKE '%$val%'";
    $res = mysqli_query($conn, $query);
    if(mysqli_num_rows($res) > 0) {
        while($row = mysqli_fetch_assoc($res)) {
            $output .= '<span id="'.$row['student_number'].'" class="d-block py-1 px-2 sn">'.$row['student_number'].' | '.$row['lastname'].', '.$row['firstname'].' '.substr($row['middlename'],0,1).'.</span>';
        }
    }
    else {
        $output .= '<span class="d-block py-1 px-2 text-center" style="cursor: pointer;">No Student Number Found</span>';
    }
    $output .= '<div style="height:20px;cursor:pointer;" class="text-center close-result" data-toggle="tooltip" data-placement="bottom" title="Close"><i class="fad fa-chevron-up"></i></div>';
    echo $output;
    exit();

}

if(isset($_POST['get_data'])) {
    $result = [];
    $sn = $_POST['sn'];
    $semester = $_POST['semester'];
    $sy = $_POST['school_yr'];
    $query = "SELECT CONCAT(student_info.lastname,', ',student_info.firstname, ' ', SUBSTR(student_info.middlename,1,1),'.') as full_name, student_info.student_number, course.course_abbreviation as course, course.course_major as major FROM student_info INNER JOIN course ON student_info.course_id = course.course_id WHERE student_info.student_number = '$sn'";
    $res = mysqli_query($conn, $query);
    if(mysqli_num_rows($res) == 1) {
        $row = mysqli_fetch_assoc($res);
        $result['full_name'] = $row['full_name'];
        $result['student_number'] = $row['student_number'];
        $result['course'] = $row['course'];
        $result['major'] = $row['major'];

        $year_lvl = (int)date('Y') - (int)substr($row['student_number'],0,4);
        $result['year_lvl'] = $year_lvl;
    }


    $query2 = 'SELECT sum(price) as mics_fee FROM current_fees';
    $res2 = mysqli_query($conn, $query2);
    $misc_fee = mysqli_fetch_assoc($res2);
    $result['misc_fee'] = $misc_fee['mics_fee'];

    // $query3 = 'SELECT DISTINCT student_enrollment_record.student_number, subject.units, schedule.semester, schedule.school_year FROM student_enrollment_record INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id Inner join subject on subject.subj_id = schedule.subj_id'
    $query3 = "SELECT sum(subject.units) as total_units FROM student_enrollment_record 
                INNER JOIN schedule ON schedule.sched_id = student_enrollment_record.sched_id 
                INNER JOIN subject ON subject.subj_id = schedule.subj_id
                WHERE student_enrollment_record.student_number = '$sn' AND schedule.school_year = '$sy' AND schedule.semester = '$semester'";
    $res3 = mysqli_query($conn, $query3);
    $total_units = mysqli_fetch_assoc($res3);
    $result['total_units'] = $total_units['total_units'];



    echo json_encode($result);
}