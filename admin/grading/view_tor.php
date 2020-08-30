<?php
include('../../config/config.php');
require('../../src/fpdf/fpdf.php');

// $data = json_decode($_POST['data']);
// print_r($data);

// echo $data[0]->stud_number;

// echo $_POST['id_viewtor'];
// exit();

// $comp_semsy = array(1,1,2,3,4,4,5,6);
// $get_unique = array_unique($comp_semsy, SORT_REGULAR);
// $new = array();
// foreach ($get_unique as $value) {
// 	$new[] = $value;
// }
// echo '<pre>'; print_r($new); echo '</pre>';
// exit();
// $grades = json_decode($_POST['manual_all_grades']);
// echo count($grades->semester_sy);
// // echo '<pre>'; print_r($grades); echo '</pre>';
// exit();

// $data = json_decode($_POST['manual_tranferee_educ']);
// print_r($data);
// exit();

class PDF extends FPDF
{

	function Header()
	{
		if($_POST['id_viewtor'] == 'manual') {
			$data = json_decode($_POST['manual_stud_info']);
		}
		else if($_POST['id_viewtor'] == 'auto') {
			$data = json_decode($_POST['data']);
		}

	    // Logo
	    $this->Image('../../src/img/logo.png',17,0,25,25);
		$this->Image('../../src/img/banner-tor.png',58,1,100,20);
	    // Line break
	    $this->Ln(10);
		$this->SetFont('Arial','B',18);
		$this->Cell(82);
		$this->Cell(28,10,'OFFICIAL TRANSCRIPT OF RECORDS',0,0,'C');
		$this->Ln(12);

		$this->SetFont('Times','',10);
		$this->SetTextColor(70);
		$this->Cell(13,5,'NAME:',0,0,'L');
		$this->SetFont('Times','B',10);
		$this->SetTextColor(0);
		$this->Cell(15,5,strtoupper($data[1]->name),0,1,'L');

		$this->SetFont('Times','',10);
		$this->SetTextColor(70);
		$this->Cell(34,5,'STUDENT NUMBER:',0,0,'L');
		$this->SetFont('Times','B',10);
		$this->SetTextColor(0);
		$this->Cell(26,5,$data[0]->stud_number,0,0,'L');

		$this->Cell(15);

		$this->SetFont('Times','',10);
		$this->SetTextColor(70);
		$this->Cell(16,5,'GENDER:',0,0,'L');
		$this->SetFont('Times','B',10);
		$this->SetTextColor(0);
		$this->Cell(5,5,strtoupper($data[4]->sex),0,0,'L');

		$this->Cell(15);

		$this->SetFont('Times','',10);
		$this->SetTextColor(70);
		$this->Cell(26,5,'NATIONALITY:',0,0,'L');
		$this->SetFont('Times','B',10);
		$this->SetTextColor(0);
		$this->Cell(25,5,strtoupper($data[2]->nationality),0,1,'L');

		$this->SetFont('Times','',10);
		$this->SetTextColor(70);
		$this->Cell(16,5,'COURSE:',0,0,'L');
		$this->SetFont('Times','B',10);
		$this->SetTextColor(0);
		if($data[10]->degree == 'BSIT') {
			$deg = "BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY";
		}
		else if($data[10]->degree == 'BSBA') {
			$deg = "BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION";
		}
		else if($data[10]->degree == 'BSEntrep') {
			$deg = "BACHELOR OF SCIENCE IN ENTREPRENEURSHIP";
		}
		else if($data[10]->degree == 'BSA') {
			$deg = "BACHELOR OF SCIENCE IN ACCOUNTANCY";
		}
		else if($data[10]->degree == 'BSEd') {
			$deg = "BACHELOR OF SECONDARY EDUCATION";
		}
		else if($data[10]->degree == 'BEEd') {
			$deg = "BACHELOR OF ELEMENTARY EDUCATION";
		}

		$this->Cell(25,5,$deg,0,1,'L');

		$this->SetFont('Times','',10);
		$this->SetTextColor(70);
		$this->Cell(18,5,'ADDRESS:',0,0,'L');
		$this->SetFont('Times','B',10);
		$this->SetTextColor(0);
		$this->Cell(25,5,strtoupper($data[3]->address),0,1,'L');

		$this->SetFont('Times','',10);
		$this->SetTextColor(70);
		$this->Cell(20,5,'BIRTHDAY:',0,0,'L');
		$this->SetFont('Times','B',10);
		$this->SetTextColor(0);
		$this->Cell(40,5,strtoupper($data[5]->birthday),0,0,'L');

		$this->Cell(20);

		$this->SetFont('Times','',10);
		$this->SetTextColor(70);
		$this->Cell(23,5,'BIRTHPLACE:',0,0,'L');
		$this->SetFont('Times','B',10);
		$this->SetTextColor(0);
		$this->Cell(25,5,strtoupper($data[6]->birthplace),0,1,'L');

		$this->Cell(0,2,'','B',1,'L');

		
		if(isset($_POST['manual_tranferee_educ'])) {
			$this->Ln(3);
		}
		else {
			$this->Ln(8);
		}

		
		$this->SetFont('Times','',10);
		$this->SetTextColor(70);
		$this->Cell(48,5,'PRELIMINARY EDUCATION:',0,0,'L');
		$this->SetTextColor(0);
		if(strlen($data[7]->prelim_educ) > 30) {
			$this->SetFont('Times','B',7);
		}
		else {
			$this->SetFont('Times','B',10);
		}
		$this->Cell(25,5,strtoupper($data[7]->prelim_educ),0,1,'L');

		$this->SetFont('Times','',10);
		$this->SetTextColor(70);
		$this->Cell(45,5,'SECONDARY EDUCATION:',0,0,'L');
		$this->SetTextColor(0);
		if(strlen($data[8]->second_educ) > 30) {
			$this->SetFont('Times','B',7);
		}
		else {
			$this->SetFont('Times','B',10);
		}
		$this->Cell(25,5,strtoupper($data[8]->second_educ),0,1,'L');

		$this->SetFont('Times','',10);
		$this->SetTextColor(70);
		$this->Cell(39,5,'SEMESTER ADMITTED:',0,0,'L');
		$this->SetFont('Times','B',10);
		$this->SetTextColor(0);
		$this->Cell(25,5,strtoupper($data[9]->dt_admission),0,1,'L');

		$this->SetFont('Times','',10);
		$this->SetTextColor(70);
		$this->Cell(33,5,'DATE CONFERRED:',0,0,'L');
		$this->SetFont('Times','B',10);
		$this->SetTextColor(0);
		$this->Cell(25,5,strtoupper($data[12]->dt_conferred),0,1,'L');

		if(isset($_POST['manual_tranferee_educ'])) {
			$transferee_data = json_decode($_POST['manual_tranferee_educ']);
			$next_ln = 9;

			$this->SetFont('Times','',10);
			$this->SetTextColor(70);
			$this->Cell(35,5,'TRANSFERED FROM:',0,0,'L');
			$this->SetFont('Times','B',10);
			$this->SetTextColor(0);

			for ($i=0; $i < count($transferee_data); $i++) { 
				if($i >= 1) {
					$next_ln = $next_ln - 5;
					$this->Cell(35);
				}
				$this->Cell(25,5,strtoupper($transferee_data[$i]),0,1,'L');
			}
			$this->Ln($next_ln);
		}

		$this->Image('../../src/img/grading-system.jpg',130,60,70,35);

		$this->SetDash(0,0);
		$this->Rect(10,96,190,165);


		// $this->Ln(9);
		$this->SetFont('Times','B',10);
		$this->SetTextColor(0);

		$this->Cell(30,10,'SUBJECT CODE',1,0,'C');
		$this->Cell(115,10,'DESCRIPTIVE TITLE',1,0,'C');
		$this->Cell(34,5,'GRADE',1,0,'C');
		$this->Cell(11,10,'UNIT',1,0,'C');
		$this->Ln(5);
		$this->Cell(145);
		$this->Cell(17,5,'FINAL',1,0,'C');
		$this->Cell(17,5,'COMP.',1,0,'C');
	}

	function Footer()
	{
		if($_POST['id_viewtor'] == 'manual') {
			$data = json_decode($_POST['manual_stud_info']);
		}
		else if($_POST['id_viewtor'] == 'auto') {
			$data = json_decode($_POST['data']);
		}

	    $this->SetY(-37);

	    $this->Cell(20,7,'Remarks:',0,0,'C');
	    $this->Ln(1);

	    $this->SetFont('Times','',10);
	    $this->Cell(0,10,'',1,0,'C');
	    $this->Cell(-190,15,$data[13]->remarks,0,0,'C');


		$this->SetFont('Times','B',10);
		$this->Ln(9);
	    $this->Cell(25,7,'Prepared by:',0,0,'C');
	    $this->Cell(45);
	    $this->Cell(25,7,'Checked by:',0,0,'C');
	    $this->Cell(45);
	    $this->Cell(25,7,'Date Issued:',0,0,'C');
	    $this->Ln(1);

		$this->SetFont('Times','',10);

	    $this->Cell(70,10,'',1,0,'C');
	    $this->Cell(-70,15,$data[14]->prepared_by,0,0,'C');
	    $this->Cell(70);
	    $this->Cell(70,10,'',1,0,'C');
	    $this->Cell(-70,15,$data[15]->checked_by,0,0,'C');
		$this->Cell(70);
	    $this->Cell(50,10,'',1,0,'C');
	    $this->Cell(-50,15,$data[17]->dt_issued,0,0,'C');

	    $this->Ln(15);
	    $this->SetFont('Times','I',10);
		$this->SetTextColor(70);
		$this->Cell(10);
		$this->Cell(17,5,'Not Valid without College Seal',0,0,'L');

		$this->SetFont('Times','',10);
		$this->SetTextColor(0);
		$this->Ln(-2);
		$this->Cell(130);
		$this->Cell(60,5,$data[16]->registrar,'B',1,'C');
		$this->Cell(130);
		$this->Cell(60,5,'University Registrar',0,1,'C');

	}
	function SetDash($black=null, $white=null)
    {
        if($black!==null)
            $s=sprintf('[%.3F %.3F] 0 d',$black*$this->k,$white*$this->k);
        else
            $s='[] 1 d';
        $this->_out($s);
    }

    const DPI = 96;
    const MM_IN_INCH = 25.4;
    const A4_HEIGHT = 232;
    const A4_WIDTH = 290;
    // tweak these values (in pixels)
    const MAX_WIDTH = 900;
    const MAX_HEIGHT = 600;

    function pixelsToMM($val) {
        return $val * self::MM_IN_INCH / self::DPI;
    }

    function resizeToFit($imgFilename) {
        list($width, $height) = getimagesize($imgFilename);

        $widthScale = self::MAX_WIDTH / $width;
        $heightScale = self::MAX_HEIGHT / $height;

        $scale = min($widthScale, $heightScale);

        return array(
            round($this->pixelsToMM($scale * $width)),
            round($this->pixelsToMM($scale * $height))
        );
    }

    function centreImage($img) {
        list($width, $height) = $this->resizeToFit($img);

        // you will probably want to swap the width/height
        // around depending on the page's orientation
        $this->Image(
            $img, (self::A4_HEIGHT - $width) / 2,
            (self::A4_WIDTH - $height) / 2,
            $width,
            $height
        );
    }
}


$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->Ln(5);

if($_POST['id_viewtor'] == 'manual') {
	$grades = json_decode($_POST['manual_all_grades']);
	$comp_semsy = json_decode($_POST['manual_com_sem_sy']);

	$get_comp_semsy = array_unique($comp_semsy, SORT_REGULAR);
	$new_comp_semsy = array();
	foreach ($get_comp_semsy as $value) {
		$new_comp_semsy[] = $value;
	}
// $grades->semester_sy
	for ($i=0; $i < count($new_comp_semsy); $i++) {
		$pdf->SetFont('Times','IB',12);
		$pdf->Cell(0,5,$new_comp_semsy[$i],0,1,'C');
		$pdf->SetFont('Times','',10);

		for ($j=0; $j < count($grades->semester_sy); $j++) {
			if($new_comp_semsy[$i] == $grades->semester_sy[$j]) {
				$pdf->Cell(30,5,$grades->subject_code[$j],0,0,'C');
				$pdf->Cell(115,5,$grades->subject_title[$j],0,0,'C');
				$pdf->Cell(17,5,$grades->final_grade[$j],0,0,'C');
				$pdf->Cell(17,5,'',0,0,'C');
				$pdf->Cell(11,5,$grades->unit[$j],0,1,'C');
			}
		}

	}




}
else if($_POST['id_viewtor'] == 'auto') {
	$data = json_decode($_POST['data']);
	$sn = $data[0]->stud_number;
	$ss = substr($sn, 0, 4);
	$year_today = date('Y');
	$school_year = $ss .'-'.(intval($ss) + 1);



	// $pdf->Cell(0,7,$school_year,0,0,'C');
	$max = 30;
	$min = 1;
	while($ss == $year_today) {

		$sss = $ss .'-'.(intval($ss) + 1);

			$query = "SELECT subject.subject_code,subject.subject_title,grade_report.final_grade,subject.units,schedule.semester
			  FROM grade_report
			  INNER JOIN class_record ON grade_report.cr_id = class_record.id
			  INNER JOIN schedule ON class_record.sched_id = schedule.sched_id
			  INNER JOIN subject ON schedule.subj_id = subject.subj_id
			  WHERE schedule.school_year = '".$sss."'
			  AND grade_report.student_number = '".$sn."'";
			$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
			$sem = 'First Semester';
			$pdf->SetFont('Times','IB',12);
			$pdf->Cell(0,5,$sem.', '.$sss,0,1,'C'); $min++;
			$pdf->SetFont('Times','',10);

			while($row = mysqli_fetch_assoc($result)) {


				if($row['semester'] == 'First Semester') {
					$sem = 'First Semester';

					$pdf->Cell(30,5,$row['subject_code'],0,0,'C');
					$pdf->Cell(115,5,$row['subject_title'],0,0,'C');

					$fgrade = $row['final_grade'];

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

					$pdf->Cell(17,5,$fg_eq,0,0,'C');
					$pdf->Cell(17,5,'',0,0,'C');
					$pdf->Cell(11,5,$row['units'],0,1,'C');

					$min++;

					if($min == $max) { $pdf->AddPage(); $pdf->Ln(5); }
				}
				else if($row['semester'] == 'Second Semester') {
					$sem = 'Second Semester';

					$pdf->Cell(30,5,$row['subject_code'],0,0,'C');
					$pdf->Cell(115,5,$row['subject_title'],0,0,'C');

					$fgrade = $row['final_grade'];

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

					$pdf->Cell(17,5,$fgrade,0,0,'C');
					$pdf->Cell(17,5,'',0,0,'C');
					$pdf->Cell(11,5,$row['units'],0,1,'C');

					$min = $min + 5;

					if($min == $max) { $pdf->AddPage(); $pdf->Ln(5); }
				}
			}
		$ss = $ss + 1;
	}
}











// for ($i=1; $i <= 90; $i++) {

// 	$pdf->Cell(30,5,$i,0,1,'C');

// 	if($i == $max) {
// 		$max = $max + 30;
// 		$pdf->AddPage();
// 		$pdf->Ln(5);
// 	}
// }

// $pdf->SetFont('Times','IB',12);
// $pdf->Cell(0,7,'First Semester, 2020-2021',0,0,'C');
// $pdf->SetFont('Times','',10);
// $pdf->Ln(7);

// $pdf->Cell(30,5,'SOCSCI 1',0,0,'C');
// $pdf->Cell(115,5,'Philippine History and Culture',0,0,'C');
// $pdf->Cell(17,5,'2.50',0,0,'C');
// $pdf->Cell(17,5,'',0,0,'C');
// $pdf->Cell(11,5,'3',0,1,'C');

// $pdf->Cell(30,5,'PE 1',0,0,'C');
// $pdf->Cell(115,5,'Physical Fitness',0,0,'C');
// $pdf->Cell(17,5,'2.00',0,0,'C');
// $pdf->Cell(17,5,'',0,0,'C');
// $pdf->Cell(11,5,'3',0,1,'C');

// $pdf->Cell(30,5,'MATH 1',0,0,'C');
// $pdf->Cell(115,5,'College Algebra',0,0,'C');
// $pdf->Cell(17,5,'2.50',0,0,'C');
// $pdf->Cell(17,5,'',0,0,'C');
// $pdf->Cell(11,5,'3',0,1,'C');

// $pdf->Cell(30,5,'HUMN 1',0,0,'C');
// $pdf->Cell(115,5,'Art Appreciation',0,0,'C');
// $pdf->Cell(17,5,'2.25',0,0,'C');
// $pdf->Cell(17,5,'',0,0,'C');
// $pdf->Cell(11,5,'3',0,1,'C');

// $pdf->Cell(30,5,'ENG 1',0,0,'C');
// $pdf->Cell(115,5,'Communication Skills 1',0,0,'C');
// $pdf->Cell(17,5,'2.00',0,0,'C');
// $pdf->Cell(17,5,'',0,0,'C');
// $pdf->Cell(11,5,'3',0,1,'C');

// $pdf->Cell(30,5,'FIL 1',0,0,'C');
// $pdf->Cell(115,5,'Komunikasyon sa Akademikong Filipino',0,0,'C');
// $pdf->Cell(17,5,'2.50',0,0,'C');
// $pdf->Cell(17,5,'',0,0,'C');
// $pdf->Cell(11,5,'3',0,1,'C');

// $pdf->Cell(30,5,'LEAD 1',0,0,'C');
// $pdf->Cell(115,5,'Leadership 1',0,0,'C');
// $pdf->Cell(17,5,'2.75',0,0,'C');
// $pdf->Cell(17,5,'',0,0,'C');
// $pdf->Cell(11,5,'3',0,1,'C');

// $pdf->Cell(30,5,'NSTP 1',0,0,'C');
// $pdf->Cell(115,5,'National Service Training Program I',0,0,'C');
// $pdf->Cell(17,5,'3.00',0,0,'C');
// $pdf->Cell(17,5,'',0,0,'C');
// $pdf->Cell(11,5,'3',0,1,'C');

// $pdf->Cell(30,5,'PSYCH 1',0,0,'C');
// $pdf->Cell(115,5,'General Psychology',0,0,'C');
// $pdf->Cell(17,5,'1.75',0,0,'C');
// $pdf->Cell(17,5,'',0,0,'C');
// $pdf->Cell(11,5,'3',0,1,'C');

// $pdf->Cell(30,5,'IT 112',0,0,'C');
// $pdf->Cell(115,5,'Programming Concept I',0,0,'C');
// $pdf->Cell(17,5,'2.75',0,0,'C');
// $pdf->Cell(17,5,'',0,0,'C');
// $pdf->Cell(11,5,'3',0,1,'C');

// $pdf->Cell(30,5,'IT 111',0,0,'C');
// $pdf->Cell(115,5,'Fundamentals of IT with Computer Application',0,0,'C');
// $pdf->Cell(17,5,'2.00',0,0,'C');
// $pdf->Cell(17,5,'',0,0,'C');
// $pdf->Cell(11,5,'3',0,1,'C');


$pdf->centreImage('../../src/img/bg-tor.png');
// $pdf->AddPage();

//end
$pdf->Output();
