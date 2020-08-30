<?php
include('../../../config/config.php');
require('../../../src/fpdf/fpdf.php');

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
	//$pdf->Ln(-7);
    // Logo
    $pdf->Image('../../../src/img/logo-comp.png',90,3,20,8);
    
    // $pdf->Image('../../../src/img/grading-system.png',14,88,75,38);

    // grc header
    $pdf->SetFont('Arial', '', 6);
    $pdf->Cell(38);
    $pdf->Cell(0, 6, '454 GRC Bldg. Rizal Ave. Cor 9th Ave. Grace Park Caloocan City, Telefax No. 3616330, Website: www.grc.edu.ph', 0, 1);

    // grc COM
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(60);
    $pdf->Cell(0, 2, 'C E R T I F I C A T E O F M A T R I C U L A T I O N', 0, 1);

    error_reporting(0);

    $studno = $_GET['studentnumber']; 
    $partial = $_GET['partial'];  
    $fees = $_GET['fees'];
    $totalunits = $_GET['totalunits'];
    $perunits = $_GET['perunits'];
    $amount = $_GET['amount'];
    $tunits1 = $_GET['tunits'];
    $disc = $_GET['discount'];
    $tdisc = $_GET['totaldiscount'];
    $ymd = $_GET['today'];
    $reg = $_GET['regular'];
    $yr = $_GET['yearlevel'];


    $query = "SELECT student_info.student_number, student_info.lastname, student_info.firstname, student_info.middlename, student_info.suffix,
      student_info.course, student_info.major, student_enrollment_record.date, schedule.semester, schedule.school_year
      FROM student_enrollment_record 
      Inner join student_info on student_info.student_number = student_enrollment_record.student_number
      Inner join schedule on schedule.sched_id = student_enrollment_record.sched_id WHERE student_info.student_number = '$studno'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    {
    // First Row
    $pdf->LN();
    $pdf->Cell(2);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(21, 6, 'Student No:', 1, 0,'C');
    $pdf->SetFont('Arial', '', 0);
    $pdf->Cell(1);
    $pdf->Cell(50, 6, ''.$_GET['studentnumber'].'', 1, 0);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(1);
    $pdf->Cell(21, 6, 'Year Level:', 1, 0,'C');
    $pdf->SetFont('Arial', '', 0);
    $pdf->Cell(1);
    $pdf->Cell(21, 6, ''.$_GET['yearlevel'].'', 1, 0,'C');
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(1);
    $pdf->Cell(25, 6, 'Type of Scholar', 1, 0,'C');
    $pdf->Cell(1);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(43, 6, ''.$_GET['partial'].'', 1, 1,'C');
    
    $pdf->LN(1);
    $pdf->Cell(2);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(21, 6, 'Last Name:', 1, 0,'C');
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(1);
    $pdf->Cell(50, 6, ''.$row['lastname'].'', 1, 0);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(1);
    $pdf->Cell(27, 6, 'Date', 1, 0,'C');
    $pdf->Cell(1);
    $pdf->Cell(27, 6, 'School Year', 1, 0,'C');
    $pdf->Cell(1);
    $pdf->Cell(57, 6, 'Semester', 1, 1,'C');

    $pdf->LN(1);
    $pdf->Cell(2);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(21, 6, 'First Name:', 1, 0,'C');
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(1);
    $pdf->Cell(50, 6, ''.$row['firstname'].'', 1, 0);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(1);
    $pdf->Cell(27, 6, ''.$_GET['today'].'', 1, 0,'C');
    $pdf->Cell(1);
    $pdf->Cell(27, 6, ''.$row['school_year'].'', 1, 0,'C');
    $pdf->Cell(1);
    $pdf->Cell(57, 6, ''.$row['semester'].'', 1, 1,'C');
    
    $pdf->LN(1);
    $pdf->Cell(2);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(21, 6, 'Middle Name:', 1, 0,'C');
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(1);
    $pdf->Cell(50, 6, ''.$row['middlename'].'', 1, 0);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(1);
    $pdf->Cell(27, 6, 'Course', 1, 0,'C');
    $pdf->Cell(1);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(27, 6, ''.$row['course'].'', 1, 0,'C');
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(1);
    $pdf->Cell(27, 6, 'Status', 1, 0,'C');
    $pdf->Cell(1);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(29, 6, ''.$_GET['regular'].'', 1, 1,'C');


    $pdf->LN(1);
    $pdf->Cell(2);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(21, 6, 'Suffix:', 1, 0,'C');
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(1);
    $pdf->Cell(50, 6, ''.$row['suffix'].'', 1, 0);
    $pdf->Cell(1);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(27, 6, 'Major', 1, 0,'C');
    $pdf->Cell(1);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(85, 6, ''.$row['major'].'', 1, 1,'C');

    }

    // Body
    $pdf->LN(1);
    $pdf->Cell(2,0,'','R',0,'L');
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(145, 6, 'Academic', 1, 0, 'C');
    $pdf->Cell(41, 6, 'Payment', 1, 0, 'C');
    $pdf->LN(26);
    $pdf->Cell(141);
    $pdf->Cell(20, 6, ''.$_GET['totalunits'].'', 0, 0, 'C');
    $pdf->Cell(-15);
    $pdf->Cell(20, 6, 'x', 0, 0, 'C');
    $pdf->Cell(-15);
    $pdf->Cell(20, 6, ''.$_GET['perunits'].'', 0, 0, 'C');
    $pdf->Cell(-1);
    $pdf->Cell(20, 6, ''.$_GET['tunits'].'', 0, 1, 'C');
    $pdf->LN(5);
    $pdf->Cell(143);
    $pdf->Cell(20, 6, ''.$_GET['fees'].'', 0, 0 , 'C');
    $pdf->Cell(7);
    $pdf->Cell(20, 6, ''.$_GET['fees'].'', 0, 1, 'C');

    $pdf->Cell(170);
    $pdf->Cell(20, 6, '', 0, 1, 'C');


    $pdf->LN(10);
    $pdf->Cell(142);
    $pdf->Cell(20, 6, '10%', 0, 0, 'C');
    $pdf->Cell(8);

    if(''.$_GET['discount'].'' == '0')
    {
        $pdf->Cell(20, 6, '', 0, 1, 'C');
    }
    else
    {
        $pdf->Cell(20, 6, ''.$_GET['discount'].'', 0, 1, 'C');
    }
    
    $ds = ''.$_GET['discount'].'';
    $am = ''.$_GET['amount'].'';
    
    $total = $am-$ds;
    

    $pdf->Cell(170);
        $pdf->Cell(20, 6, ''.$total.'', 0, 1, 'C');
    
   

    // // body
    $pdf->LN(-65);
    $pdf->Cell(2,0,'','R',0,'L');
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(20, 10, 'Subject Code', 1, 0, 'C');
    $pdf->Cell(11, 10, 'Unit/s', 1, 0, 'C');
    $pdf->Cell(13, 10, 'Section', 1, 0, 'C');
    $pdf->Cell(48, 5, 'Time', 1, 0, 'C');
    $pdf->Cell(16, 10, 'Day/s', 1, 0, 'C');
    $pdf->Cell(17, 10, 'Room', 1, 0, 'C');
    $pdf->Cell(20, 10, 'Faculty', 1, 0, 'C');
    $pdf->Cell(26, 10, 'Charge', 1, 0, 'C');
    $pdf->Cell(15, 10, 'Amount', 1, 0, 'C');
    
    $pdf->LN(5);
    $pdf->Cell(46);
    $pdf->Cell(24,5,'Lec',1,0,'C');
    $pdf->Cell(24,5,'Lab',1,1,'C');


      $query1 = "SELECT subject.subj_id, subject.subject_code,  subject.units, schedule.sched_id, schedule.section, schedule.lecturehr_from, schedule.lecturehr_to, schedule.laboratoryhr_from, schedule.laboratoryhr_to, schedule.lecture_day, schedule.laboratory_day, schedule.lec_room, subject.subject_title, user.firstname, user.lastname, user.middlename
        FROM student_enrollment_record 
        Inner Join schedule on schedule.sched_id = student_enrollment_record.sched_id
        Inner join subject on subject.subj_id = schedule.subj_id
        Inner join user on user.id = schedule.faculty_id 
        WHERE student_enrollment_record.student_number = '$studno'";
      $result1 = mysqli_query($conn, $query1);


    while($row1 = mysqli_fetch_assoc($result1))
    {

            $lechrfrom = new DateTime($row1['lecturehr_from']);
            $lechrto = new DateTime($row1['lecturehr_to']);
            $labhrfrom = new DateTime($row1['laboratoryhr_from']);
            $labhrto = new DateTime($row1['laboratoryhr_to']);

            if($labhrto->format('h:ia') == '12:00am' && $labhrfrom->format('h:ia') == '12:00am')
            {
                $labhr = '';
            }
            else
            {
                $labhr = $labhrfrom->format('h:ia')." - ".$labhrto->format('h:ia');
            }

            if($lechrto->format('h:ia') == '12:00am' && $lechrfrom->format('h:ia') == '12:00am')
            {
                $lechr = '';
            }
            else
            {
                $lechr = $lechrfrom->format('h:ia')." - ".$lechrto->format('h:ia');
            }

    $pdf->Cell(2);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(20, 5, ''.$row1['subject_code'].'', 0, 0, 'C');
    $pdf->Cell(11, 5, ''.$row1['units'].'', 0, 0, 'C');
    $pdf->Cell(13, 5, ''.$row1['section'].'', 0, 0, 'C');
    $pdf->Cell(24, 5, ''.$lechr.'', 0, 0, 'C');
    $pdf->Cell(24, 5, ''.$labhr.'', 0, 0, 'C');
    $pdf->Cell(15, 5, ''.$row1['lecture_day'].'', 0, 0, 'C');
    $pdf->Cell(18, 5, ''.$row1['lec_room'].'', 0, 0, 'C');
    $pdf->Cell(20, 5, ''.$row1['lastname'].'', 0, 1, 'C');
    }

    $pdf->LN(1);
    $pdf->Cell(2);
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->Cell(20, 10, 'Total Units', 0, 0, 'C');
    $pdf->Cell(11, 10, ''.$_GET['totalunits'].'', 0, 0, 'C');
    
    
    // 1st layer
    $pdf->SetDash(0,0);
	$pdf->Rect(12,55,186,82);
    $pdf->Rect(12,61,20,76);
    $pdf->Rect(12,61,31,76);
    $pdf->Rect(56,66,24,71); // for time
    $pdf->Rect(12,61,92,76);
    $pdf->Rect(12,61,92,76);
    $pdf->Rect(12,61,108,76);
    $pdf->Rect(12,61,125,76);
    $pdf->Rect(12,61,145,76);
    $pdf->Rect(12,61,171,76); 

    $pdf->LN(50);
    $pdf->Image('../../../src/img/cashier.jpg',15,142,50,10);
    $pdf->Image('../../../src/img/cashier2.jpg',33,147,15,8); // cashier
    $pdf->Image('../../../src/img/cashier.jpg',145,142,50,10);
    $pdf->Image('../../../src/img/registrar.jpg',164,147,15,8); // registrar
    $pdf->Image('../../../src/img/tuitionfee.jpg',159,77,15,4); // tuition fee
    $pdf->Image('../../../src/img/ms.jpg',159,88,22,4); // miscellaneous
    
    $pdf->Image('../../../src/img/discount.jpg',159,110,15,4); // other fee
    $pdf->Image('../../../src/img/tm.jpg',159,121,22,4); // total amount

    $pdf->Image('../../../src/img/mt.jpg',20,165,70,50); // midterm
    $pdf->Image('../../../src/img/ft.jpg',121,165,70,50); // final

    $pdf->Image('../../../src/img/1st.jpg',15,220,170,14); // 1st
    $pdf->Image('../../../src/img/2nd.jpg',16,235,150,8); // 2nd
    $pdf->Image('../../../src/img/3rd.jpg',16,245,145,4); // 3nd

    $pdf->Image('../../../src/img/cashier.jpg',15,260,50,10);
    $pdf->Image('../../../src/img/treasurer.jpg',33,265,15,5);
    $pdf->Image('../../../src/img/cashier.jpg',145,260,50,10);
    $pdf->Image('../../../src/img/student-signature.jpg',160,265,25,5);

	//end
	$pdf->Output();


?>