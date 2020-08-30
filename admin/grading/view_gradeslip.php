<?php
include('../../config/config.php');
require('../../src/fpdf/fpdf.php');

$id = $_GET['id'];
$type = $_GET['type'];

if($type == 'stdnt') {
	class PDF extends FPDF
	{
		function SetDash($black=null, $white=null)
	    {
	        if($black!==null)
	            $s=sprintf('[%.3F %.3F] 0 d',$black*$this->k,$white*$this->k);
	        else
	            $s='[] 1 d';
	        $this->_out($s);
	    }
	}

	$pdf = new PDF('P','mm','A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();

	// HEADER
	$pdf->Ln(-7);
    // Logo
    $pdf->Image('../../src/img/logo-gr.png',58,3,90,15);
    $pdf->Image('../../src/img/grading-system.png',14,88,75,38);
    $pdf->Image('../../src/img/student-copy.png',6,45,10,56);

    $pdf->SetFont('Times','B',12);
    // Move to the right
    $pdf->Cell(20);
    // Title
    $pdf->Cell(10,8,'2nd Semester',0,1,'C');
    $pdf->Cell(20);
    $pdf->Cell(10,8,'2020-2021',0,0,'C');
    $pdf->Cell(130);
    $pdf->Cell(10,8,'GRC Form No. 18',0,0,'C');
    // Line break
    $pdf->Ln(7);

    // BODY
    $get_student = mysqli_query($conn, "SELECT * FROM student_info WHERE student_number = '".$id."'") or die(mysqli_error($conn));
	$get_student_data = mysqli_fetch_assoc($get_student);

	$pdf->Cell(-2);
	$pdf->SetFont('Arial','B',11);
    $pdf->Cell(90,5,$get_student_data['lastname'].', '.$get_student_data['firstname'].' '.substr($get_student_data['middlename'], 0,1).'.',1,0,'L');
    $pdf->SetFont('Arial','',11);
	$pdf->Cell(22,5,'Student No.',1,0,'L');
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(35,5,$id,1,0,'C');
    $pdf->SetFont('Arial','',11);
	$pdf->Cell(22,5,'Year/Level',1,0,'L');
	$pdf->SetFont('Arial','B',11);
	$year = date('Y');
	$year_l = ($year - substr($id, 0,4)) + 1;
	if($year_l == 1){
		$year_lvl = 'I';
	}
	else if($year_l == 2){
		$year_lvl = 'II';
	}
	else if($year_l == 3){
		$year_lvl = 'III';
	}
	else if($year_l == 4){
		$year_lvl = 'IV';
	}
	else if($year_l == 5){
		$year_lvl = 'V';
	}
	else if($year_l == 6){
		$year_lvl = 'VI';
	}
	else if($year_l == 7){
		$year_lvl = 'VII';
	}
	else if($year_l == 8){
		$year_lvl = 'VIII';
	}
	$pdf->Cell(26,5,'',1,1,'C');

	$pdf->Cell(-2);
	$pdf->SetFont('Arial','I',7);
    $pdf->Cell(112,5,'  Surname                  First Name                   MI',1,0,'L');
    $pdf->SetFont('Arial','B',11);
	$pdf->Cell(83,5,'',1,1,'C');

	$pdf->Cell(4);
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(20,5,'Subject','L',0,'C');
	$pdf->Cell(64,5,'Subject','L',0,'C');
	$pdf->Cell(12,10,'Units','L',0,'C');
	$pdf->Cell(25,5,'GRADE',1,0,'C');
	$pdf->Cell(18,10,'Section','L',0,'C');
	$pdf->Cell(30,10,'Professor','L',0,'C');
	$pdf->Cell(20,10,'Signature','L',0,'C');

	$pdf->Ln(5);
	$pdf->Cell(4);
	$pdf->Cell(20,5,'Code','L',0,'C');
	$pdf->Cell(64,5,'Description','L',0,'C');
	$pdf->Cell(12);
	$pdf->Cell(12,5,'Final','L',0,'C');
	$pdf->Cell(13,5,'Comp.','L',0,'C');
	$pdf->Ln(5);

	//GRADES


	$get_grades = mysqli_query($conn, "SELECT grade_report.midterm_grade, grade_report.final_grade, subject.subject_code, subject.subject_title, subject.units, schedule.section, CONCAT(faculty_user.lastname,', ',faculty_user.firstname, ' ', SUBSTR(faculty_user.middlename,1,1),'.') as fac_name FROM grade_report
        INNER JOIN class_record ON grade_report.cr_id = class_record.id
        INNER JOIN schedule ON class_record.sched_id = schedule.sched_id
        INNER JOIN subject ON schedule.subj_id = subject.subj_id
        INNER JOIN faculty_user ON schedule.faculty_id = faculty_user.id
        WHERE student_number = '".$id."'") or die(mysqli_error($conn));

	$subj = mysqli_num_rows($get_grades);
	$max_subj = 12;
	$blank = $max_subj - $subj;
	$units = 0;
	while($row = mysqli_fetch_assoc($get_grades)) {

		$fgrade = $row['final_grade'];
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

        $pdf->SetFont('Arial','',10);

        $pdf->Cell(4,4,'',0,0,'L');
		$pdf->Cell(20,4,$row['subject_code'],1,0,'L');
		$pdf->SetFont('Arial','',7);
		$pdf->Cell(64,4,$row['subject_title'],1,0,'L');
		$pdf->SetFont('Arial','',10);
		$units = $units + $row['units'];
		$pdf->Cell(12,4,$row['units'],1,0,'C');
		$pdf->Cell(12,4,$fg_eq,1,0,'C');
		$pdf->Cell(13,4,'',1,0,'C');
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(18,4,$row['section'],1,0,'C');
		$pdf->SetFont('Arial','',5);
		$pdf->Cell(30,4,$row['fac_name'],1,0,'L');
		$pdf->Cell(20,4,'',1,1,'C');

	}

	for ($i=1; $i <= $blank; $i++) {
		$pdf->SetFont('Arial','',10);

		$pdf->Cell(4,4,'',0,0,'L');
		$pdf->Cell(20,4,'',1,0,'L');
		$pdf->Cell(64,4,'',1,0,'L');
		$pdf->Cell(12,4,'',1,0,'C');
		$pdf->Cell(12,4,'',1,0,'C');
		$pdf->Cell(13,4,'',1,0,'C');
		$pdf->Cell(18,4,'',1,0,'C');
		$pdf->Cell(30,4,'',1,0,'L');
		$pdf->Cell(20,4,'',1,1,'C');
	}

	// for ($i=1; $i < $max_subj; $i++) {
	// 	$pdf->SetFont('Arial','',10);

	// 	if($i <= $subj) {
	// 		$fgrade = $row['final_grade'];
	//         if($fgrade == '') { $fg_eq = ''; }
	//         else if($fgrade > 98) { $fg_eq = '1.00';  }
	//         else if($fgrade > 95 && $fgrade < 98) { $fg_eq = '1.25'; }
	//         else if($fgrade > 92 && $fgrade < 96) { $fg_eq = '1.50'; }
	//         else if($fgrade > 89 && $fgrade < 93) { $fg_eq = '1.75'; }
	//         else if($fgrade > 86 && $fgrade < 90) { $fg_eq = '2.00'; }
	//         else if($fgrade > 83 && $fgrade < 87) { $fg_eq = '2.25'; }
	//         else if($fgrade > 80 && $fgrade < 84) { $fg_eq = '2.50'; }
	//         else if($fgrade > 77 && $fgrade < 81) { $fg_eq = '2.75'; }
	//         else if($fgrade > 74 && $fgrade < 78) { $fg_eq = '3.00'; }
	//         else if($fgrade < 75) { $fg_eq = '5.00'; }
	//         else { $fg_eq = $fgrade; }


	// 	}
	// 	else {
	// 		$pdf->Cell(4,4,'',0,0,'L');
	// 		$pdf->Cell(20,4,'',1,0,'L');
	// 		$pdf->Cell(64,4,'',1,0,'L');
	// 		$pdf->Cell(12,4,'',1,0,'C');
	// 		$pdf->Cell(12,4,'',1,0,'C');
	// 		$pdf->Cell(13,4,'',1,0,'C');
	// 		$pdf->Cell(18,4,'',1,0,'C');
	// 		$pdf->Cell(30,4,'',1,0,'L');
	// 		$pdf->Cell(20,4,'',1,1,'C');
	// 	}
	// }





	// for($i=1;$i<=$max_subj;$i++) {
	// 	$pdf->SetFont('Arial','',10);

	// 	if($i <= $subj) {
	// 		$pdf->Cell(4,4,'',0,0,'L');
	// 		$pdf->Cell(20,4,'ENG 2',1,0,'L');
	// 		$pdf->SetFont('Arial','',7);
	// 		$pdf->Cell(64,4,'Communication Skills 2',1,0,'L');
	// 		$pdf->SetFont('Arial','',10);
	// 		$pdf->Cell(12,4,'3',1,0,'C');
	// 		$pdf->Cell(12,4,'2.25',1,0,'C');
	// 		$pdf->Cell(13,4,'',1,0,'C');
	// 		$pdf->SetFont('Arial','',9);
	// 		$pdf->Cell(18,4,'ITS 101',1,0,'C');
	// 		$pdf->SetFont('Arial','',5);
	// 		$pdf->Cell(30,4,'BALAYAN, SHEILLA MAE M.',1,0,'L');
	// 		$pdf->Cell(20,4,'',1,1,'C');
	// 	}
	// 	else {
	// 		$pdf->Cell(4,4,'',0,0,'L');
	// 		$pdf->Cell(20,4,'',1,0,'L');
	// 		$pdf->Cell(64,4,'',1,0,'L');
	// 		$pdf->Cell(12,4,'',1,0,'C');
	// 		$pdf->Cell(12,4,'',1,0,'C');
	// 		$pdf->Cell(13,4,'',1,0,'C');
	// 		$pdf->Cell(18,4,'',1,0,'C');
	// 		$pdf->Cell(30,4,'',1,0,'L');
	// 		$pdf->Cell(20,4,'',1,1,'C');
	// 	}
	// }




	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(4,5,'','R',0,'L');
	$pdf->Cell(84,5,'Total Academic Units:',0,0,'R');
	$pdf->Cell(12,5,$units,0,0,'C');
	$pdf->Cell(12,5,'GWA',0,1,'C');

	$pdf->Cell(4,5,'','R',0,'L');
	$pdf->Cell(139,5,'',0,0,'C');
	$get_signee = mysqli_query($conn, "SELECT * FROM gradereport_config WHERE role = 'grade slip signee'");
	$get_signee_data = mysqli_fetch_assoc($get_signee);
	$pdf->Cell(50,5,$get_signee_data['name'],'B',1,'C');

	$pdf->Cell(4,5,'','R',0,'L');
	$pdf->Cell(139,5,'',0,0,'C');
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(50,5,'School Registrar',0,1,'C');



	$pdf->SetFont('Arial','B',7);
	$pdf->Cell(4,3,'','R',0,'L');
	$pdf->Cell(80,3,'',0,0,'R');
	$pdf->Cell(10,3,'Not Valid if:',0,1,':');
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(4,3,'','R',0,'L');
	$pdf->Cell(84,3,'',0,0,'R');
	$pdf->Cell(10,3,'- pre-requisite/s is not yet taken.',0,1,'L');
	$pdf->Cell(4,3,'','R',0,'L');
	$pdf->Cell(84,3,'',0,0,'R');
	$pdf->Cell(10,3,'- grades do not tally with grades given on the',0,1,'L');
	$pdf->Cell(4,3,'','R',0,'L');
	$pdf->Cell(87,3,'',0,0,'R');
	$pdf->Cell(10,3,'official grading sheet submitted to the Registrar.',0,1,'L');
	$pdf->Cell(4,3,'','R',0,'L');
	$pdf->Cell(84,3,'',0,0,'R');
	$pdf->Cell(10,3,'- if there are erasures or alteration.',0,1,'L');

    $pdf->SetFont('Arial','B',7);
	$pdf->Cell(4,3,'','R',0,'L');
	$pdf->Cell(80,3,'',0,0,'R');
	$pdf->Cell(10,3,'Note:',0,1,':');
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(4,3,'','R',0,'L');
	$pdf->Cell(84,3,'',0,0,'R');
	$pdf->Cell(10,3,'- This Grade Report Slip is important for your',0,1,'L');
	$pdf->Cell(4,3,'','R',0,'L');
	$pdf->Cell(87,3,'',0,0,'R');
	$pdf->Cell(10,3,'enrollment, so never lose this.',0,1,'L');
	$pdf->Cell(4,3,'','R',0,'L');
	$pdf->Cell(84,3,'',0,0,'R');
	$pdf->Cell(10,3,'- This valid for enrollment at GRC only.',0,1,'L');
	$pdf->Cell(4,1,'','R',1,'L');

	//FOOTER
    $pdf->SetFont('Arial','IB',7);
	$pdf->Cell(-2);
	$pdf->Cell(195,4,'All Information pertaining to grades are managed by the Registrar. Clarifications should be coursed',0,1,'C');
	$pdf->Cell(-2);
	$pdf->Cell(195,3,'through the Office of the Registrar.',0,0,'C');

	// end



	$tt = $max_subj - $subj;
	$y = $tt * 5;


    //set dash border line
	$pdf->SetDash(0,0);
	$pdf->Rect(8,18,195,111);

	$pdf->SetDash(2,6);
	$pdf->Rect(0,140,210,0);

	//end
	$pdf->Output();

}
else if($type == 'course') {
	class PDF extends FPDF
	{
		function SetDash($black=null, $white=null)
	    {
	        if($black!==null)
	            $s=sprintf('[%.3F %.3F] 0 d',$black*$this->k,$white*$this->k);
	        else
	            $s='[] 1 d';
	        $this->_out($s);
	    }
	}

	$pdf = new PDF('P','mm','A4');
	$pdf->AliasNbPages();

	$get_all_student_query = "SELECT DISTINCT student_enrollment_record.student_number, CONCAT(student_info.lastname,', ',student_info.firstname, ' ', SUBSTR(student_info.middlename,1,1),'.') as student_name, student_info.course_id, course.course_abbreviation as course
		FROM student_enrollment_record
		INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id
		INNER JOIN student_info ON student_info.student_number = student_enrollment_record.student_number
		INNER JOIN course ON student_info.course_id = course.course_id
		WHERE course.course_abbreviation = '".$id."' ORDER BY student_info.lastname";
	$get_all_student = mysqli_query($conn, $get_all_student_query);

	$numrows = mysqli_num_rows($get_all_student);
	$info_sn = array();
	$info_name = array();
	$info_course = array();


	while($row = mysqli_fetch_assoc($get_all_student)) {
		$info_sn[] = $row['student_number'];
		$info_name[] = $row['student_name'];
		$info_course[] = $row['course'];
	}



for ($o=0; $o < $numrows; $o++) {

	$pdf->AddPage();

	// HEADER
	$pdf->Ln(-7);
    // Logo
    $pdf->Image('../../src/img/logo-gr.png',58,3,90,15);
    $pdf->Image('../../src/img/grading-system.png',14,88,75,38);
    $pdf->Image('../../src/img/student-copy.png',6,45,10,56);

    $pdf->SetFont('Times','B',12);
    // Move to the right
    $pdf->Cell(20);
    // Title
    $pdf->Cell(10,8,'2nd Semester',0,1,'C');
    $pdf->Cell(20);
    $pdf->Cell(10,8,'2020-2021',0,0,'C');
    $pdf->Cell(130);
    $pdf->Cell(10,8,'GRC Form No. 18',0,0,'C');
    // Line break
    $pdf->Ln(7);

    // BODY
	$pdf->Cell(-2);
	$pdf->SetFont('Arial','B',11);
    $pdf->Cell(90,5,$info_name[$o],1,0,'L');
    $pdf->SetFont('Arial','',11);
	$pdf->Cell(22,5,'Student No.',1,0,'L');
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(35,5,$info_sn[$o],1,0,'C');
    $pdf->SetFont('Arial','',11);
	$pdf->Cell(22,5,'Year/Level',1,0,'L');
	$pdf->SetFont('Arial','B',11);
	$year1 = date('Y');
	$year_l1 = ($year1 - substr($info_sn[$o], 0,4)) + 1;
	if($year_l1 == 1){
		$year_lvl1 = 'I';
	}
	else if($year_l1 == 2){
		$year_lvl1 = 'II';
	}
	else if($year_l1 == 3){
		$year_lvl1 = 'III';
	}
	else if($year_l1 == 4){
		$year_lvl1 = 'IV';
	}
	else if($year_l1 == 5){
		$year_lvl1 = 'V';
	}
	else if($year_l1 == 6){
		$year_lvl1 = 'VI';
	}
	else if($year_l1 == 7){
		$year_lvl1 = 'VII';
	}
	else if($year_l1 == 8){
		$year_lvl1 = 'VIII';
	}
	$pdf->Cell(26,5,$year_lvl1,1,1,'C');

	$pdf->Cell(-2);
	$pdf->SetFont('Arial','I',7);
    $pdf->Cell(112,5,'  Surname                  First Name                   MI',1,0,'L');
    $pdf->SetFont('Arial','B',11);
	$pdf->Cell(83,5,$info_course[$o],1,1,'C');

	$pdf->Cell(4);
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(20,5,'Subject','L',0,'C');
	$pdf->Cell(64,5,'Subject','L',0,'C');
	$pdf->Cell(12,5,'Units','L',0,'C');
	$pdf->Cell(25,5,'GRADE',1,0,'C');
	$pdf->Cell(18,5,'Section','R',0,'C');
	$pdf->Cell(30,5,'Professor','R',0,'C');
	$pdf->Cell(20,5,'Signature','R',1,'C');

	$pdf->Cell(4);
	$pdf->Cell(20,5,'Code','L',0,'C');
	$pdf->Cell(64,5,'Description','L',0,'C');
	$pdf->Cell(12,5,'','L',0,'C');
	$pdf->Cell(12,5,'Final','L',0,'C');
	$pdf->Cell(13,5,'Comp.','L',0,'C');
	$pdf->Cell(18,5,'','L',0,'C');
	$pdf->Cell(30,5,'','L',0,'C');
	$pdf->Cell(20,5,'','L',1,'C');

	//GRADES
	$get_grades = mysqli_query($conn, "SELECT grade_report.midterm_grade, grade_report.final_grade, subject.subject_code, subject.subject_title, subject.units, schedule.section, CONCAT(faculty_user.lastname,', ',faculty_user.firstname, ' ', SUBSTR(faculty_user.middlename,1,1),'.') as fac_name FROM grade_report
        INNER JOIN class_record ON grade_report.cr_id = class_record.id
        INNER JOIN schedule ON class_record.sched_id = schedule.sched_id
        INNER JOIN subject ON schedule.subj_id = subject.subj_id
        INNER JOIN faculty_user ON schedule.faculty_id = faculty_user.id
        WHERE student_number = '".$info_sn[$o]."'") or die(mysqli_error($conn));

	$subj = mysqli_num_rows($get_grades);
	$max_subj = 12;
	$blank = $max_subj - $subj;
	$units1 = 0;
	while($row = mysqli_fetch_assoc($get_grades)) {

		$fgrade = $row['final_grade'];
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

        $pdf->SetFont('Arial','',10);

        $pdf->Cell(4,4,'',0,0,'L');
		$pdf->Cell(20,4,$row['subject_code'],1,0,'L');
		$pdf->SetFont('Arial','',7);
		$pdf->Cell(64,4,$row['subject_title'],1,0,'L');
		$pdf->SetFont('Arial','',10);
		$units1 = $units1 + $row['units'];
		$pdf->Cell(12,4,$row['units'],1,0,'C');
		$pdf->Cell(12,4,$fg_eq,1,0,'C');
		$pdf->Cell(13,4,'',1,0,'C');
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(18,4,$row['section'],1,0,'C');
		$pdf->SetFont('Arial','',5);
		$pdf->Cell(30,4,$row['fac_name'],1,0,'L');
		$pdf->Cell(20,4,'',1,1,'C');

	}

	for ($i=1; $i <= $blank; $i++) {
		$pdf->SetFont('Arial','',10);

		$pdf->Cell(4,4,'',0,0,'L');
		$pdf->Cell(20,4,'',1,0,'L');
		$pdf->Cell(64,4,'',1,0,'L');
		$pdf->Cell(12,4,'',1,0,'C');
		$pdf->Cell(12,4,'',1,0,'C');
		$pdf->Cell(13,4,'',1,0,'C');
		$pdf->Cell(18,4,'',1,0,'C');
		$pdf->Cell(30,4,'',1,0,'L');
		$pdf->Cell(20,4,'',1,1,'C');
	}




	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(4,5,'','R',0,'L');
	$pdf->Cell(84,5,'Total Academic Units:',0,0,'R');
	$pdf->Cell(12,5,$units1,0,0,'C');
	$pdf->Cell(12,5,'GWA',0,1,'C');

	$pdf->Cell(4,5,'','R',0,'L');
	$pdf->Cell(139,5,'',0,0,'C');
	$get_signee = mysqli_query($conn, "SELECT * FROM gradereport_config WHERE role = 'grade slip signee'");
	$get_signee_data = mysqli_fetch_assoc($get_signee);
	$pdf->Cell(50,5,$get_signee_data['name'],'B',1,'C');

	$pdf->Cell(4,5,'','R',0,'L');
	$pdf->Cell(139,5,'',0,0,'C');
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(50,5,'School Registrar',0,1,'C');



	$pdf->SetFont('Arial','B',7);
	$pdf->Cell(4,3,'','R',0,'L');
	$pdf->Cell(80,3,'',0,0,'R');
	$pdf->Cell(10,3,'Not Valid if:',0,1,':');
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(4,3,'','R',0,'L');
	$pdf->Cell(84,3,'',0,0,'R');
	$pdf->Cell(10,3,'- pre-requisite/s is not yet taken.',0,1,'L');
	$pdf->Cell(4,3,'','R',0,'L');
	$pdf->Cell(84,3,'',0,0,'R');
	$pdf->Cell(10,3,'- grades do not tally with grades given on the',0,1,'L');
	$pdf->Cell(4,3,'','R',0,'L');
	$pdf->Cell(87,3,'',0,0,'R');
	$pdf->Cell(10,3,'official grading sheet submitted to the Registrar.',0,1,'L');
	$pdf->Cell(4,3,'','R',0,'L');
	$pdf->Cell(84,3,'',0,0,'R');
	$pdf->Cell(10,3,'- if there are erasures or alteration.',0,1,'L');

    $pdf->SetFont('Arial','B',7);
	$pdf->Cell(4,3,'','R',0,'L');
	$pdf->Cell(80,3,'',0,0,'R');
	$pdf->Cell(10,3,'Note:',0,1,':');
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(4,3,'','R',0,'L');
	$pdf->Cell(84,3,'',0,0,'R');
	$pdf->Cell(10,3,'- This Grade Report Slip is important for your',0,1,'L');
	$pdf->Cell(4,3,'','R',0,'L');
	$pdf->Cell(87,3,'',0,0,'R');
	$pdf->Cell(10,3,'enrollment, so never lose this.',0,1,'L');
	$pdf->Cell(4,3,'','R',0,'L');
	$pdf->Cell(84,3,'',0,0,'R');
	$pdf->Cell(10,3,'- This valid for enrollment at GRC only.',0,1,'L');
	$pdf->Cell(4,1,'','R',1,'L');

	//FOOTER
    $pdf->SetFont('Arial','IB',7);
	$pdf->Cell(-2);
	$pdf->Cell(195,4,'All Information pertaining to grades are managed by the Registrar. Clarifications should be coursed',0,1,'C');
	$pdf->Cell(-2);
	$pdf->Cell(195,3,'through the Office of the Registrar.',0,0,'C');

	// end



	//17 rows



	$pdf->Ln(10);


	// Logo
    $pdf->Image('../../src/img/logo-gr.png',58,143,90,15);
    $pdf->Image('../../src/img/grading-system.png',14,228,75,38);
    $pdf->Image('../../src/img/student-copy.png',6,186,10,56);

    $pdf->SetFont('Times','B',12);
    // Move to the right
    $pdf->Cell(20);
    // Title
    $pdf->Cell(10,8,'2nd Semester',0,1,'C');
    $pdf->Cell(20);
    $pdf->Cell(10,8,'2020-2021',0,0,'C');
    $pdf->Cell(130);
    $pdf->Cell(10,8,'GRC Form No. 18',0,0,'C');
    // Line break
    $pdf->Ln(7);

    // BODY
	$pdf->Cell(-2);
	$pdf->SetFont('Arial','B',11);
    $pdf->Cell(90,5,$info_name[$o+1],1,0,'L');
    $pdf->SetFont('Arial','',11);
	$pdf->Cell(22,5,'Student No.',1,0,'L');
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(35,5,$info_sn[$o+1],1,0,'C');
    $pdf->SetFont('Arial','',11);
	$pdf->Cell(22,5,'Year/Level',1,0,'L');
	$pdf->SetFont('Arial','B',11);
	$year2 = date('Y');
	$year_l2 = ($year2 - substr($info_sn[$o+1], 0,4)) + 1;
	if($year_l2 == 1){
		$year_lvl2 = 'I';
	}
	else if($year_l2 == 2){
		$year_lvl12 = 'II';
	}
	else if($year_l2 == 3){
		$year_lvl2 = 'III';
	}
	else if($year_l2 == 4){
		$year_lvl2 = 'IV';
	}
	else if($year_l2 == 5){
		$year_lvl2 = 'V';
	}
	else if($year_l2 == 6){
		$year_lvl2 = 'VI';
	}
	else if($year_l2 == 7){
		$year_lvl2 = 'VII';
	}
	else if($year_l2 == 8){
		$year_lvl2 = 'VIII';
	}
	$pdf->Cell(26,5,$year_lvl2,1,1,'C');

	$pdf->Cell(-2);
	$pdf->SetFont('Arial','I',7);
    $pdf->Cell(112,5,'  Surname                  First Name                   MI',1,0,'L');
    $pdf->SetFont('Arial','B',11);
	$pdf->Cell(83,5,$info_course[$o+1],1,1,'C');

	$pdf->Cell(4);
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(20,5,'Subject','L',0,'C');
	$pdf->Cell(64,5,'Subject','L',0,'C');
	$pdf->Cell(12,5,'Units','L',0,'C');
	$pdf->Cell(25,5,'GRADE',1,0,'C');
	$pdf->Cell(18,5,'Section','R',0,'C');
	$pdf->Cell(30,5,'Professor','R',0,'C');
	$pdf->Cell(20,5,'Signature','R',1,'C');

	$pdf->Cell(4);
	$pdf->Cell(20,5,'Code','L',0,'C');
	$pdf->Cell(64,5,'Description','L',0,'C');
	$pdf->Cell(12,5,'','L',0,'C');
	$pdf->Cell(12,5,'Final','L',0,'C');
	$pdf->Cell(13,5,'Comp.','L',0,'C');
	$pdf->Cell(18,5,'','L',0,'C');
	$pdf->Cell(30,5,'','L',0,'C');
	$pdf->Cell(20,5,'','L',1,'C');

	//GRADES
	$get_grades2 = mysqli_query($conn, "SELECT grade_report.midterm_grade, grade_report.final_grade, subject.subject_code, subject.subject_title, subject.units, schedule.section, CONCAT(faculty_user.lastname,', ',faculty_user.firstname, ' ', SUBSTR(faculty_user.middlename,1,1),'.') as fac_name FROM grade_report
        INNER JOIN class_record ON grade_report.cr_id = class_record.id
        INNER JOIN schedule ON class_record.sched_id = schedule.sched_id
        INNER JOIN subject ON schedule.subj_id = subject.subj_id
        INNER JOIN faculty_user ON schedule.faculty_id = faculty_user.id
        WHERE student_number = '".$info_sn[$o+1]."'") or die(mysqli_error($conn));

	$subj2 = mysqli_num_rows($get_grades2);
	$max_subj2 = 12;
	$blank2 = $max_subj2 - $subj2;
	$units2 = 0;
	while($row = mysqli_fetch_assoc($get_grades2)) {

		$fgrade = $row['final_grade'];
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

        $pdf->SetFont('Arial','',10);

        $pdf->Cell(4,4,'',0,0,'L');
		$pdf->Cell(20,4,$row['subject_code'],1,0,'L');
		$pdf->SetFont('Arial','',7);
		$pdf->Cell(64,4,$row['subject_title'],1,0,'L');
		$pdf->SetFont('Arial','',10);
		$units2 = $units2 + $row['units'];
		$pdf->Cell(12,4,$row['units'],1,0,'C');
		$pdf->Cell(12,4,$fg_eq,1,0,'C');
		$pdf->Cell(13,4,'',1,0,'C');
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(18,4,$row['section'],1,0,'C');
		$pdf->SetFont('Arial','',5);
		$pdf->Cell(30,4,$row['fac_name'],1,0,'L');
		$pdf->Cell(20,4,'',1,1,'C');

	}

	for ($p=1; $p <= $blank2; $p++) {
		$pdf->SetFont('Arial','',10);

		$pdf->Cell(4,4,'',0,0,'L');
		$pdf->Cell(20,4,'',1,0,'L');
		$pdf->Cell(64,4,'',1,0,'L');
		$pdf->Cell(12,4,'',1,0,'C');
		$pdf->Cell(12,4,'',1,0,'C');
		$pdf->Cell(13,4,'',1,0,'C');
		$pdf->Cell(18,4,'',1,0,'C');
		$pdf->Cell(30,4,'',1,0,'L');
		$pdf->Cell(20,4,'',1,1,'C');
	}




	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(4,5,'','R',0,'L');
	$pdf->Cell(84,5,'Total Academic Units:',0,0,'R');
	$pdf->Cell(12,5,$units2,0,0,'C');
	$pdf->Cell(12,5,'GWA',0,1,'C');

	$pdf->Cell(4,5,'','R',0,'L');
	$pdf->Cell(139,5,'',0,0,'C');
	$get_signee = mysqli_query($conn, "SELECT * FROM gradereport_config WHERE role = 'grade slip signee'");
	$get_signee_data = mysqli_fetch_assoc($get_signee);
	$pdf->Cell(50,5,$get_signee_data['name'],'B',1,'C');

	$pdf->Cell(4,5,'','R',0,'L');
	$pdf->Cell(139,5,'',0,0,'C');
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(50,5,'School Registrar',0,1,'C');



	$pdf->SetFont('Arial','B',7);
	$pdf->Cell(4,3,'','R',0,'L');
	$pdf->Cell(80,3,'',0,0,'R');
	$pdf->Cell(10,3,'Not Valid if:',0,1,':');
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(4,3,'','R',0,'L');
	$pdf->Cell(84,3,'',0,0,'R');
	$pdf->Cell(10,3,'- pre-requisite/s is not yet taken.',0,1,'L');
	$pdf->Cell(4,3,'','R',0,'L');
	$pdf->Cell(84,3,'',0,0,'R');
	$pdf->Cell(10,3,'- grades do not tally with grades given on the',0,1,'L');
	$pdf->Cell(4,3,'','R',0,'L');
	$pdf->Cell(87,3,'',0,0,'R');
	$pdf->Cell(10,3,'official grading sheet submitted to the Registrar.',0,1,'L');
	$pdf->Cell(4,3,'','R',0,'L');
	$pdf->Cell(84,3,'',0,0,'R');
	$pdf->Cell(10,3,'- if there are erasures or alteration.',0,1,'L');

    $pdf->SetFont('Arial','B',7);
	$pdf->Cell(4,3,'','R',0,'L');
	$pdf->Cell(80,3,'',0,0,'R');
	$pdf->Cell(10,3,'Note:',0,1,':');
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(4,3,'','R',0,'L');
	$pdf->Cell(84,3,'',0,0,'R');
	$pdf->Cell(10,3,'- This Grade Report Slip is important for your',0,1,'L');
	$pdf->Cell(4,3,'','R',0,'L');
	$pdf->Cell(87,3,'',0,0,'R');
	$pdf->Cell(10,3,'enrollment, so never lose this.',0,1,'L');
	$pdf->Cell(4,3,'','R',0,'L');
	$pdf->Cell(84,3,'',0,0,'R');
	$pdf->Cell(10,3,'- This valid for enrollment at GRC only.',0,1,'L');
	$pdf->Cell(4,1,'','R',1,'L');


	//FOOTER
    $pdf->SetFont('Arial','IB',7);
	$pdf->Cell(-2);
	$pdf->Cell(195,4,'All Information pertaining to grades are managed by the Registrar. Clarifications should be coursed',0,1,'C');
	$pdf->Cell(-2);
	$pdf->Cell(195,3,'through the Office of the Registrar.',0,1,'C');

	$tt = $max_subj - $subj;
	$y = $tt * 5;


    //set dash border line
	$pdf->SetDash(0,0);
	$pdf->Rect(8,18,195,111);

	$pdf->Rect(8,158,195,111);

	$pdf->SetDash(2,6);

	$pdf->Rect(0,140,210,0);

	$o++;
}



	//end
	$pdf->Output();

}
