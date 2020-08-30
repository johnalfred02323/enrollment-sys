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
            $this->Cell(50,10, 'Other Fees', 0,0);
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
    $pdf->Cell(17,10,'No',1,0,'C');
    $pdf->Cell(50,10,'Name',1,0,'C');
    $pdf->Cell(18,10,'Course',1,0,'C');
    $pdf->Cell(17,10,'O.R.',1,0,'C');
    $pdf->Cell(49,10,'Item Name',1,0,'C');
    $pdf->Cell(14,10,'Amount',1,0,'C');
    $pdf->Cell(25,10,'Date',1,1,'C');

    $from_date = $_GET['from_date'];
    $to_date = $_GET['to_date'];

    date_default_timezone_set('Asia/Manila');
    $date = date('m-d-y h:i:s a');

    $query= "SELECT transaction.trans_id, transaction.studentnumber, student_info.lastname, student_info.firstname, student_info.middlename, student_info.course, transaction.official_receipt, transaction.otherfees_id, other_fees.description, other_fees.price, transaction.cash_rendered, transaction.amount_change, transaction.total_amount, transaction.schoolyear, transaction.semester, transaction.date_paid FROM transaction 
        Inner join student_info on student_info.student_number = transaction.studentnumber
        Inner join other_fees on other_fees.ofs_id = transaction.otherfees_id where date_paid between '$from_date' and '$to_date' ORDER BY `transaction`.`official_receipt` ASC " ;
    $result = mysqli_query($conn, $query);
    while($row=mysqli_fetch_assoc($result)){

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(17,10,''.$row['trans_id'].'',1,0,'C');
    $pdf->Cell(50,10,''.$row['lastname'].', '.$row['firstname'].' '.SUBSTR($row['middlename'],0,1).'.',1,0,'C');
    $pdf->Cell(18,10,''.$row['course'].'',1,0,'C');
    $pdf->Cell(17,10,''.$row['official_receipt'].'',1,0,'R');
    $pdf->Cell(49,10,''.$row['description'].'',1,0,'C');
    $pdf->Cell(14,10,''.$row['total_amount'].'',1,0,'C');
    $pdf->Cell(25,10,''.$row['date_paid'].'',1,1,'C');
	
    }
    $pdf->SetFont('Arial','B',10);
    $pdf->SetTextColor(255,0,0);
    $pdf->Cell(305,10,'Printed Date and Time: '.$date.'',0,1,'C');

	//end
	$pdf->Output();

?>