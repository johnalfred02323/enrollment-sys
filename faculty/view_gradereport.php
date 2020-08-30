<?php
include('../config/config.php');
require('../src/fpdf/fpdf.php');
$cr_id = $_GET['id'];
$query = mysqli_query($conn, "SELECT sched_id FROM class_record WHERE id = $cr_id");
$get = mysqli_fetch_assoc($query);
$sc_id = $get['sched_id'];

class PDF extends FPDF
{
	// Page header
	function Header()
	{
	    // Logo
	    $this->Image('../src/img/logo-gr.png',28,1,150);
	    // Line break
	    $this->Ln(16);
		$this->SetFont('Arial','B',25);
		$this->Cell(82);
		$this->Cell(28,10,'OFFICE OF THE REGISTRAR',0,0,'C');
		$this->Ln(10);
	}

	// Page footer
	function Footer()
	{
		include('../config/config.php');
		$ver = '';
		$sub = '';
		$v_pos = '';
		$s_pos = '';
	    // Position at 1.5 cm from bottom
	    // $this->SetY(-25);

	    $this->SetFont('Arial','IB',11);
	    $this->Ln(2);
	    $this->Cell(-8);
	    $this->Cell(25,7,'Submitted by:',0,0,'C');
	    $this->Cell(50);
	    $this->Cell(25,7,'Verified by:',0,0,'C');
	    $this->Cell(50);
	    $this->Cell(25,7,'Submitted to:',0,0,'C');
	    $this->Ln(10);

	    $get_footer = mysqli_query($conn, "SELECT * FROM gradereport_config WHERE status = 1");

		while($row = mysqli_fetch_assoc($get_footer)){
			if($row['role'] == 'Verification') {
				$ver = $row['name'];
				$v_pos = $row['position'];
			}
			if($row['role'] == 'Receiver/Submitted to') {
				$sub = $row['name'];
				$s_pos = $row['position'];
			}
		}
		$id = $_GET['id'];
		$get_faculty = mysqli_query($conn, "SELECT faculty_user.lastname, faculty_user.firstname, faculty_user.middlename FROM class_record 
			INNER JOIN schedule ON class_record.sched_id = schedule.sched_id 
			INNER JOIN faculty_user ON schedule.faculty_id = faculty_user.id
			WHERE class_record.id = $id") or die(mysqli_error($conn));
		$faculty_data = mysqli_fetch_assoc($get_faculty);

	    $this->SetFont('Arial','',11);
	    $this->Cell(-7);
	    $this->Cell(70,5,strtoupper($faculty_data['lastname'].', '.$faculty_data['firstname'].' '.$faculty_data['middlename']),'B',0,'C');
	    
	    $this->Cell(5);
	    $this->Cell(70,5,$ver,'B',0,'C');

	    $this->Cell(5);
	    $this->Cell(55,5,$sub,'B',1,'C');


	    $this->Cell(-7);
	    $this->Cell(70,5,'Faculty',0,0,'C');
	    $this->Cell(5);
	    $this->Cell(70,5,$v_pos,0,0,'C');
	    $this->Cell(5);
	    $this->Cell(55,5,$s_pos,0,0,'C');
	}
	
}

// Instanciation of inherited class
$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->Cell(38);
$pdf->SetFont('Arial','',18);
$pdf->Cell(15,8,'REPORT OF GRADE',0,1,'C');
$pdf->Image('../src/img/grading-system.jpg',113,36,90,38);

$get_class = mysqli_query($conn, "SELECT faculty_user.firstname, faculty_user.lastname, faculty_user.middlename, subject.subject_title, subject.subject_code, subject.units, schedule.lecturehr_from, schedule.lecturehr_to, schedule.lecture_day, schedule.laboratoryhr_from, schedule.laboratoryhr_to, schedule.laboratory_day, schedule.school_year, schedule.semester, schedule.section
	FROM schedule
	INNER JOIN subject ON schedule.subj_id = subject.subj_id
	INNER JOIN faculty_user ON schedule.faculty_id = faculty_user.id
	WHERE schedule.sched_id = $sc_id");
$class_data = mysqli_fetch_assoc($get_class);

if($class_data['laboratory_day'] == '') {
	$time = date("g:i A", strtotime($class_data['lecturehr_from'])).' - '.date("g:i A", strtotime($class_data['lecturehr_to']));
	if($class_data['lecture_day'] == 'Thursday') {
		$day = substr($class_data['lecture_day'],0,2);
	}
	else{
		$day = substr($class_data['lecture_day'],0,1);
	}
}
else {
	$time = date("g:i A", strtotime($class_data['lecturehr_from'])).'-'.date("g:i A", strtotime($class_data['lecturehr_to'])).'/'.date("g:i A", strtotime($class_data['laboratoryhr_from'])).'-'.date("g:i A", strtotime($class_data['laboratoryhr_to']));
	if($class_data['lecture_day'] == $class_data['laboratory_day']) {
		if($class_data['lecture_day'] == 'Thursday'){
			$day = substr($class_data['lecture_day'],0,2);
		}
		else {
			$day = substr($class_data['lecture_day'],0,1);
		}
	}
	else {
		if($class_data['laboratory_day'] == 'Thursday'){
			if($class_data['lecture_day'] == 'Thursday') {
				$day = substr($class_data['lecture_day'],0,2).'/';
			}
			else {
				$day = substr($class_data['lecture_day'],0,1).'/';
			}

			$day .= substr($class_data['laboratory_day'],0,2);
		}
		else {
			if($class_data['lecture_day'] == 'Thursday') {
				$day = substr($class_data['lecture_day'],0,2).'/';
			}
			else {
				$day = substr($class_data['lecture_day'],0,1).'/';
			}
			
			$day .= substr($class_data['laboratory_day'],0,1);
		}
	}
}

$pdf->Cell(38);
$pdf->SetFont('Arial','',15);
$pdf->Cell(15,7,$class_data['semester'].' '.$class_data['school_year'],0,1,'C');
$pdf->Ln(2);
$pdf->SetFont('Arial','B',12);

$pdf->Cell(-5);
$pdf->Cell(28,7,'Suject Code:',1,0,'L');
$pdf->Cell(22,7,$class_data['subject_code'],1,0,'L');
$pdf->Cell(5);
$pdf->Cell(28,7,'Section:',1,0,'L');
$pdf->Cell(22,7,$class_data['section'],1,1,'L');

$pdf->Cell(-5);
$pdf->Cell(28,7,'Suject Title:',1,0,'L');

if(strlen($class_data['subject_title']) < 31) {
	$pdf->Cell(77,7,$class_data['subject_title'],1,1,'L');
}
else {
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(77,7,$class_data['subject_title'],1,1,'L');
}
$pdf->SetFont('Arial','B',12);
$pdf->Cell(-5);

if(strlen('Unit: '.$class_data['units'].'  Time: '.$time.'  Day: '.$day) < 45) {
	$pdf->Cell(105,7,'Unit: '.$class_data['units'].'  Time: '.$time.'  Day: '.$day,1,1,'C');
}
else {
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(105,7,'Unit: '.$class_data['units'].'  Time: '.$time.'  Day: '.$day,1,1,'C');
}



$pdf->SetFont('Arial','',10);
$pdf->Ln(2);
// left
// $pdf->Cell(97,8,'Unit:',1,0,'C');
$pdf->Cell(-8);
$pdf->Cell(6,6,'',1,0,'C');
$pdf->Cell(45,12,'Name','T',0,'C');
$pdf->Cell(17,6,'MG(50%)',1,0,'C');
$pdf->Cell(18,6,'TFG(50%)',1,0,'C');
$pdf->Cell(17,6,'Final',1,0,'C');

$pdf->Cell(6,6,'',1,0,'C');
$pdf->Cell(45,12,'Name','T',0,'C');
$pdf->Cell(17,6,'MG(50%)',1,0,'C');
$pdf->Cell(18,6,'TFG(50%)',1,0,'C');
$pdf->Cell(17,6,'Final',1,1,'C');


$pdf->Cell(-8);
$pdf->Cell(6,6,'',1,0,'C');
$pdf->Cell(45,6,'','B',0,'L');
$pdf->Cell(8,6,'%',1,0,'C');
$pdf->Cell(9,6,'EQV',1,0,'C');
$pdf->Cell(18,6,'%',1,0,'C');
$pdf->Cell(8,6,'%',1,0,'C');
$pdf->Cell(9,6,'EQV',1,0,'C');

$pdf->Cell(6,6,'',1,0,'C');
$pdf->Cell(45,6,'','B',0,'L');
$pdf->Cell(8,6,'%',1,0,'C');
$pdf->Cell(9,6,'EQV',1,0,'C');
$pdf->Cell(18,6,'%',1,0,'C');
$pdf->Cell(8,6,'%',1,0,'C');
$pdf->Cell(9,6,'EQV',1,1,'C');

$get_st = mysqli_query($conn, "SELECT student_info.lastname, student_info.firstname, student_info.middlename, grade_report.midterm_grade, grade_report.final_grade, grade_report.tfg FROM grade_report INNER JOIN student_info ON grade_report.student_number = student_info.student_number WHERE cr_id = $cr_id") or die(mysqli_query($conn));

$st_num = mysqli_num_rows($get_st);

for($i=0;$i<30;$i++) {
	$st_data = mysqli_fetch_assoc($get_st);
	$pdf->Cell(-8);

	$name = '';
	$mgrade = '';
	$fgrade = '';
	$tfg = '';

	if($st_num > 30) {
		$name = $st_data['lastname'].', '.$st_data['firstname'].' '.substr($st_data['lastname'], 0,1).'.';
		$mgrade = $st_data['midterm_grade'];
		$fgrade = $st_data['final_grade'];
		$tfg = $st_data['tfg'];
	}
	else {
		if(($i+1) <= $st_num) {
			$name = $st_data['lastname'].', '.$st_data['firstname'].' '.substr($st_data['lastname'], 0,1).'.';
			$mgrade = $st_data['midterm_grade'];
			$fgrade = $st_data['final_grade'];
			$tfg = $st_data['tfg'];
			
		}
		else {
			$name = '';
			$mgrade = '';
			$fgrade = '';
			$tfg = '';
		}
	}

	if($mgrade == '') { $mg_eq = ''; }
	else if($mgrade > 98) { $mg_eq = '1.00';	}
	else if($mgrade > 95 && $mgrade < 98) { $mg_eq = '1.25'; }
	else if($mgrade > 92 && $mgrade < 96) { $mg_eq = '1.50'; }
	else if($mgrade > 89 && $mgrade < 93) {	$mg_eq = '1.75'; }
	else if($mgrade > 86 && $mgrade < 90) {	$mg_eq = '2.00'; }
	else if($mgrade > 83 && $mgrade < 87) {	$mg_eq = '2.25'; }
	else if($mgrade > 80 && $mgrade < 84) {	$mg_eq = '2.50'; }
	else if($mgrade > 77 && $mgrade < 81) {	$mg_eq = '2.75'; }
	else if($mgrade > 74 && $mgrade < 78) {	$mg_eq = '3.00'; }
	else if($mgrade < 75) {	$mg_eq = '5.00'; }
	else { $mg_eq = $mgrade; }

	if($fgrade == '') { $fg_eq = ''; }
	else if($fgrade > 98) { $fg_eq = '1.00';	}
	else if($fgrade > 95 && $fgrade < 98) { $fg_eq = '1.25'; }
	else if($fgrade > 92 && $fgrade < 96) { $fg_eq = '1.50'; }
	else if($fgrade > 89 && $fgrade < 93) {	$fg_eq = '1.75'; }
	else if($fgrade > 86 && $fgrade < 90) {	$fg_eq = '2.00'; }
	else if($fgrade > 83 && $fgrade < 87) {	$fg_eq = '2.25'; }
	else if($fgrade > 80 && $fgrade < 84) {	$fg_eq = '2.50'; }
	else if($fgrade > 77 && $fgrade < 81) {	$fg_eq = '2.75'; }
	else if($fgrade > 74 && $fgrade < 78) {	$fg_eq = '3.00'; }
	else if($fgrade < 75) {	$fg_eq = '5.00'; }
	else { $fg_eq = $fgrade; }

	$pdf->Cell(6,6,$i+1,1,0,'C');
	if(strlen($name) > 25) {
		$pdf->SetFont('Arial','',8);
	}
	else {
		$pdf->SetFont('Arial','',10);
	}
	
	$pdf->Cell(45,6,$name,1,0,'L');
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(8,6,$mgrade,1,0,'C');
	$pdf->Cell(9,6,$mg_eq,1,0,'C');
	$pdf->Cell(18,6,$tfg,1,0,'C');
	$pdf->Cell(8,6,$fgrade,1,0,'C');
	$pdf->Cell(9,6,$fg_eq,1,0,'C');

	
	if($i >= $st_num-30){
		$name = '';
		$mgrade = '';
		$fgrade = '';
		$tfg = '';
	}
	else {
		$name = $st_data['lastname'].', '.$st_data['firstname'].' '.substr($st_data['lastname'], 0,1).'.';
		$mgrade = $st_data['midterm_grade'];
		$fgrade = $st_data['final_grade'];
		$tfg = $st_data['tfg'];
	}

	if($mgrade == '') { $mg_eq = ''; }
	else if($mgrade > 98) { $mg_eq = '1.00';	}
	else if($mgrade > 95 && $mgrade < 98) { $mg_eq = '1.25'; }
	else if($mgrade > 92 && $mgrade < 96) { $mg_eq = '1.50'; }
	else if($mgrade > 89 && $mgrade < 93) {	$mg_eq = '1.75'; }
	else if($mgrade > 86 && $mgrade < 90) {	$mg_eq = '2.00'; }
	else if($mgrade > 83 && $mgrade < 87) {	$mg_eq = '2.25'; }
	else if($mgrade > 80 && $mgrade < 84) {	$mg_eq = '2.50'; }
	else if($mgrade > 77 && $mgrade < 81) {	$mg_eq = '2.75'; }
	else if($mgrade > 74 && $mgrade < 78) {	$mg_eq = '3.00'; }
	else if($mgrade < 75) {	$mg_eq = '5.00'; }
	else { $mg_eq = $mgrade; }

	if($fgrade == '') { $fg_eq = ''; }
	else if($fgrade > 98) { $fg_eq = '1.00';	}
	else if($fgrade > 95 && $fgrade < 98) { $fg_eq = '1.25'; }
	else if($fgrade > 92 && $fgrade < 96) { $fg_eq = '1.50'; }
	else if($fgrade > 89 && $fgrade < 93) {	$fg_eq = '1.75'; }
	else if($fgrade > 86 && $fgrade < 90) {	$fg_eq = '2.00'; }
	else if($fgrade > 83 && $fgrade < 87) {	$fg_eq = '2.25'; }
	else if($fgrade > 80 && $fgrade < 84) {	$fg_eq = '2.50'; }
	else if($fgrade > 77 && $fgrade < 81) {	$fg_eq = '2.75'; }
	else if($fgrade > 74 && $fgrade < 78) {	$fg_eq = '3.00'; }
	else if($fgrade < 75) {	$fg_eq = '5.00'; }
	else { $fg_eq = $fgrade; }
	
	

	$pdf->Cell(6,6,$i+31,1,0,'C');
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(45,6,$name,1,0,'L');
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(8,6,$mgrade,1,0,'C');
	$pdf->Cell(9,6,$mg_eq,1,0,'C');
	$pdf->Cell(18,6,$tfg,1,0,'C');
	$pdf->Cell(8,6,$fgrade,1,0,'C');
	$pdf->Cell(9,6,$fg_eq,1,1,'C');
	
	
	// $pdf->Cell(92);
}


$pdf->Output();