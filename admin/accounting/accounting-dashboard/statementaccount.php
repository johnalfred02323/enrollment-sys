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

        function header(){
            $this->Image('../../../src/img/logo-comp.png',20,5,20,8);

            $this->SetFont('Arial', 'B', 7);
            $this->LN(2);
            $this->Cell(9);
            $this->Cell(0, 6, 'Global Reciprocal College', 0, 1);

            $this->SetFont('Arial', 'B', 7);
            $this->LN(-1);
            $this->Cell(9);
            $this->Cell(0, 6, '#458 GRC Bldg. Rizal Ave. Ext. Cor. 9th Ave. Grace Park, Caloocan City', 0, 1);

            $this->SetFont('Arial', 'B', 7);
            $this->LN(-2);
            $this->Cell(9);
            $this->Cell(0, 6, 'Tel. No. (02)-361-6330', 0, 1);
            $this->LN(4);
        }
    }


    $pdf = new PDF('P','mm','A4');
    $pdf->AliasNbPages();
    $pdf->AddPage();


    // HEADER
    //$pdf->Ln(-7);
    // Logo


    $pdf->SetFont('Arial', 'B', 9);
    
    $pdf->Cell(9);
    $pdf->Cell(0, 6, 'Statement of Account', 0, 1);

    error_reporting(0);

    $studno = $_GET['studentnumber']; 
    $sy = $_GET['schoolyear'];  
    $names = $_GET['fullname']; 
    $fees = $_GET['unit'];
    $course = $_GET['course'];


    $query = "SELECT DISTINCT payment.student_number, student_info.lastname, student_info.firstname, student_info.middlename, student_info.course, payment.semester, payment.schoolyear, payment.tuition FROM payment 
    INNER JOIN student_info ON payment.student_number = student_info.student_number WHERE student_number = $studno";
      
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $pdf->SetFont('Arial', '', 9);
    $pdf->LN(-3);
    $pdf->Cell(9);
    $pdf->Cell(0, 6, 'S.Y. '.$_GET['schoolyear'].'', 0, 1);
    $pdf->LN(-3);
    $pdf->Cell(9);
    $pdf->Cell(0, 6, 'Student Name: '.$_GET['fullname'].'', 0, 1);
    $pdf->LN(-3);
    $pdf->Cell(9);
    $pdf->Cell(0, 6, 'Student Number: '.$_GET['studentnumber'].'', 0, 1);
    $pdf->LN(-3);
    $pdf->Cell(9);
    $pdf->Cell(0, 6, 'Course: '.$_GET['course'].'', 0, 1);

    $pdf->SetFont('Arial', 'B', 15);
    $pdf->Cell(95);
    $pdf->Cell(0, 6, 'Schedule of Fees', 0, 1);

    $pdf->SetFont('Arial', 'B', 15);
    $pdf->LN(-5);
    $pdf->Cell(69);
    $pdf->Cell(0, 6, '________________________________', 0, 1);

    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(78);
    $pdf->Cell(0, 6, '# Of Units', 0, 1);
    $pdf->LN(-2);
    $pdf->Cell(75);
    $pdf->Cell(35, 6, 'Enrolled for the', 0, 0);
    $pdf->Cell(20, 6, 'Actual Fees', 0, 0);
    $pdf->Cell(10);
    $pdf->Cell(20, 6, 'Total', 0, 1);
    $pdf->LN(-2);
    $pdf->Cell(78);
    $pdf->Cell(0, 6, 'Semester', 0, 1);


    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(9);
    $pdf->Cell(17, 6, 'A. Tuition @', 0, 0);
    $pdf->SetFont('Arial', '', 0);
    $pdf->Cell(6, 6, ''.$_GET['unit'].'', 0, 0);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(83, 6, '(Per Unit)', 0, 0);
    $pdf->Cell(15, 6, ''.$_GET['unit'].'', 0, 1);

    $pdf->SetFont('Arial', 'B', 8);
    $pdf->LN(-2);
    $pdf->Cell(9);
    $pdf->Cell(17, 6, 'B. Miscellaneous Fees', 0, 1);


    error_reporting(0);

    $query2 = "SELECT * FROM current_fees";
    $result2 = $conn-> query($query2); 
    $total = 0;
    while($rows2=mysqli_fetch_assoc($result2)) 
    {
    $pdf->SetFont('Arial', '', 8);
    $pdf->LN(-2);
    $pdf->Cell(9);
    $pdf->Cell(132, 6, ''.$rows2['miscellaneous'].'', 0, 0);
    $pdf->Cell(10, 6, ''.$rows2['price'].'', 0, 1);

    $total = $total + $rows2['price'];
    }

    $pdf->SetFont('Arial', 'B', 15);
    $pdf->Cell(69);
    $pdf->Cell(0, 6, '________________________________', 0, 1);

    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(9);
    $pdf->Cell(132, 6, 'Total Fees Due', 0, 0);
    $pdf->Cell(10, 6, ''.$total.'', 0, 1);

    $pdf->SetFont('Arial', 'B', 8);
    $pdf->LN(-2);
    $pdf->Cell(9);
    $pdf->Cell(132, 6, 'Less: Payment', 0, 1);

    $pdf->SetFont('Arial', 'B', 8);
    $pdf->LN(4);
    $pdf->Cell(9);
    $pdf->Cell(132, 6, 'Add: Previous Tuition Fee Dues', 0, 1);

    $pdf->SetFont('Arial', 'B', 8);
    $pdf->LN(10);
    $pdf->Cell(9);
    $pdf->Cell(132, 6, 'Add: Other Fees', 0, 1);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->LN(-2);
    $pdf->Cell(9);
    $pdf->Cell(125, 6, 'Total Amount Due', 0, 0);
    $pdf->Cell(7, 6, 'PHP', 0, 0);
    $pdf->Cell(10, 6, ''.$total.'', 0, 1);

    $pdf->SetFont('Arial', 'B', 8);
    $pdf->LN(10);
    $pdf->Cell(9);
    $pdf->Cell(132, 6, 'Notes:', 0, 1);

    $pdf->SetFont('Arial', '', 8);
    $pdf->LN(1);
    $pdf->Cell(9);
    $pdf->Cell(132, 6, '1. The regulations governing the payment of tuition and other fees are issued from time to time by the Office of the', 0, 1);
    $pdf->SetFont('Arial', '', 8);
    $pdf->LN(-2);
    $pdf->Cell(9);
    $pdf->Cell(132, 6, 'Treasurer.', 0, 1);

    $pdf->SetFont('Arial', '', 8);
    $pdf->LN(-2);
    $pdf->Cell(9);
    $pdf->Cell(37, 6, '2. The GRC complics with all ', 0, 0);
    $pdf->SetTextColor(255,0,0);
    $pdf->Cell(7, 6, 'GRC', 0, 0);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(132, 6, 'requirements regarding increases in tuition and fees.', 0, 1);

    $pdf->SetFont('Arial', '', 8);
    $pdf->LN(-2);
    $pdf->Cell(9);
    $pdf->Cell(37, 6, '3. While check payments are encouraged, it is the responsibility of the drawer of the check to see that it is properly made', 0, 1);
    $pdf->SetFont('Arial', '', 8);
    $pdf->LN(-2);
    $pdf->Cell(9);
    $pdf->Cell(37, 6, 'out. In the event that a check is returned for any reason, there is a service charge of P250.00. Should a check be dated after', 0, 1);
    $pdf->SetFont('Arial', '', 8);
    $pdf->LN(-2);
    $pdf->Cell(9);
    $pdf->Cell(37, 6, 'the regular registration period, a late registration fee will be charged. Checks should be made payable to the ', 0, 1);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->SetTextColor(255,0,0);
    $pdf->LN(-2);
    $pdf->Cell(9);
    $pdf->Cell(37, 6, 'Global RECIPROCAL COLLEGES, INC.', 0, 1);

    $pdf->SetFont('Arial', '', 8);
    $pdf->SetTextColor(0,0,0);
    $pdf->LN(-2);
    $pdf->Cell(9);
    $pdf->Cell(37, 6, '4. No student shall be allowed to receive any degree, diploma, or certificate, nor be given a transcript of academic records,', 0, 1);

    $pdf->SetFont('Arial', '', 8);
    $pdf->LN(-2);
    $pdf->Cell(9);
    $pdf->Cell(37, 6, 'unless all financial obligations to the GRC have been settled.', 0, 1);


    $pdf->SetFont('Arial', 'B', 8);
    $pdf->LN(5);
    $pdf->Cell(9);
    $pdf->Cell(37, 6, 'Estimated Cost of Graduate Studies', 0, 1);

    $pdf->SetFont('Arial', 'B', 8);
    $pdf->SetTextColor(255,0,0);
    $pdf->LN(-2);
    $pdf->Cell(9);
    $pdf->Cell(37, 6, 'Based on Tuition & Fees for SY 2012-2013', 0, 1);
    $pdf->LN(-2);
    $pdf->Cell(9);
    $pdf->Cell(37, 6, 'Actual costs may be more or less than the figures given below;', 0, 1);

    $pdf->SetTextColor(0,0,0);
    $pdf->LN(2);
    $pdf->Cell(9);
    $pdf->Cell(37, 6, '__________________________', 0, 1);

    $pdf->SetFont('Arial', '', 8);
    $pdf->LN(-2);
    $pdf->Cell(13);
    $pdf->Cell(37, 6, 'School Accounting Officer', 0, 1);



    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(9);
    $pdf->Cell(36, 6, 'Date', 1, 0,'C');
    $pdf->Cell(36, 6, 'Official Receipt', 1, 0,'C');
    $pdf->Cell(32, 6, 'Amount', 1, 0,'C');
    $pdf->Cell(40, 6, 'Early Bird Promo Less 10%', 1, 0,'C');
    $pdf->Cell(37, 6, 'Payment', 1, 1,'C');

    $queryfees = "SELECT * from transaction_fees where student_number = '$studno';";
    $resultfees = $conn-> query($queryfees);
       
    while($rows1=mysqli_fetch_array($resultfees)) 
    {
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(9);
    $pdf->Cell(36, 6, ''.$rows1['date'].'', 0, 0,'C');
    $pdf->Cell(36, 6, ''.$rows1['official_receipt'].'', 0, 0,'C');
    $pdf->Cell(32, 6, ''.$rows1['balance'].'', 0, 0,'C');

    if(''.$rows1['discounted'].'' == '0')
    {
        $pdf->Cell(40, 6, '', 0, 0,'C');
    }
    else
    {
        $pdf->Cell(40, 6, ''.$rows1['discount'].'', 0, 0,'C');
    }

    $pdf->Cell(37, 6, ''.$rows1['cash_rendered'].'', 0, 1,'C');

    $ds = ''.$rows1['amount'].'';
    $am = ''.$rows1['discount'].'';
    }

    $total = $ds-$am;

    $pdf->LN(1);
    $pdf->Cell(156);
    $pdf->SetFont('Arial', 'B', 9);
    
    $pdf->Cell(20, 10, 'Total Amount', 0, 0, 'C');
    $pdf->Cell(11, 10, ''.$total.'', 0, 0, 'C');
    


    $pdf->SetDash(0,0);
    $pdf->Rect(19,31,181,80);
    $pdf->Rect(19,31,36,80);
    $pdf->Rect(19,31,72,80);
    $pdf->Rect(19,31,104,80);
    $pdf->Rect(19,31,144,80);


    //end
    $pdf->Output();


?>