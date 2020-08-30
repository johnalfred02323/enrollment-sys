<?php

include('../../../config/config.php');
require('../../../src/fpdf/fpdf.php');


	class PDF extends FPDF
	{
        function Header(){

             // date
            $from_date = $_GET['from_date'];
            $to_date = $_GET['to_date'];
            
            include('../../../config/config.php');
            // school year
            $querytm = "SELECT * FROM timeframe WHERE status = 'Active' AND type = 'Enrollment' ";
            $resulttm = mysqli_query($conn, $querytm);
            $rowtm = mysqli_fetch_assoc($resulttm);

            $this->SetFont('Arial', 'B', 12);
            $this->Cell(12);
            $this->Image('../../../src/img/logo-comp.png',10,10,20,8);
            $this->Cell(8);
            $this->Cell(50,10, 'Tuition Fees', 0,0);
            $this->SetFont('Arial', '', 10);
            $this->Cell(60,10, 'School Year: '.$rowtm['school_year'].' ', 0,0);
            $this->Cell(65,10, 'From: '.$from_date.' - To: '.$to_date.'', 0,1);
            $this->LN(5);
        }

        function Footer(){
            $this->SetY(-15);
            $this->SetFont('Arial', '', 8);
            $this->Cell(0,10, ' '.$this->PageNo()." / {pages}", 0, 0, 'C');
        }
	}


	$pdf = new PDF('P','mm','A4');
	$pdf->AliasNbPages('{pages}');
	$pdf->AddPage();

    //

    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(27,10,'Student Number',1,0,'C');
    $pdf->Cell(43,10,'Name',1,0,'C');
    $pdf->Cell(18,10,'Course',1,0,'C');
    $pdf->Cell(15,10,'O.R.',1,0,'C');
    $pdf->Cell(18,10,'Amount',1,0,'C');
    $pdf->Cell(18,10,'Balance',1,0,'C');
    $pdf->Cell(27,10,'Type of Scholar',1,0,'C');
    $pdf->Cell(25,10,'Date',1,1,'C');

    $from_date = $_GET['from_date'];
    $to_date = $_GET['to_date'];

    date_default_timezone_set('Asia/Manila');
    $date = date('m-d-y h:i:s a');

    $query= "SELECT transaction_fees.student_number, student_info.lastname, student_info.firstname, student_info.middlename, student_info.course, transaction_fees.official_receipt, transaction_fees.cash_rendered, transaction_fees.balance, transaction_fees.scholar, transaction_fees.schoolyr, transaction_fees.semester, transaction_fees.date FROM transaction_fees Inner join student_info on student_info.student_number = transaction_fees.student_number where date between '$from_date' and '$to_date' ORDER BY `transaction_fees`.`official_receipt` ASC " ;
    $result = mysqli_query($conn, $query);
    while($row=mysqli_fetch_assoc($result)){

    $pdf->SetFont('Arial','',8);
    $pdf->Cell(27,10,''.$row['student_number'].'',1,0,'C');
    $pdf->Cell(43,10,''.$row['lastname'].', '.$row['firstname'].' '.SUBSTR($row['middlename'],0,1).'.',1,0,'C');
    $pdf->Cell(18,10,''.$row['course'].'',1,0,'C');
    $pdf->Cell(15,10,''.$row['official_receipt'].'',1,0,'R');
    $pdf->Cell(18,10,''.$row['cash_rendered'].'',1,0,'C');
    $pdf->Cell(18,10,''.$row['balance'].'',1,0,'C');
    $pdf->Cell(27,10,''.$row['scholar'].'',1,0,'C');
    $pdf->Cell(25,10,''.$row['date'].'',1,1,'C');
	
    }
    $pdf->SetFont('Arial','B',10);
    $pdf->SetTextColor(255,0,0);
    $pdf->Cell(307,10,'Printed Date and Time: '.$date.'',0,1,'C');

	//end
	$pdf->Output();

?>