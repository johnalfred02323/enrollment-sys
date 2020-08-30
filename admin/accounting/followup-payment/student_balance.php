<?php
include('../../../config/config.php');
error_reporting(0);

 if(isset($_POST['autosearch']))  
 {  
      $output = '';  
      $query = "SELECT student_info.student_number, student_info.lastname, student_info.firstname, student_info.middlename FROM payment INNER JOIN student_info ON student_info.student_number = payment.student_number WHERE student_info.student_number LIKE '%".$_POST["query"]."%' AND balance > 0 ";  
      $result = mysqli_query($conn, $query);  
      $output = '<ul class="list-unstyled" >';

      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li>'.$row["student_number"].'</li>';

           }  
      }  
      else  
      {  
           $output .= '<li>Student Number Not Found</li>';  
      }  
      $output .= '</ul>'; 
      echo $output;    
 }  

  if(isset($_POST['getstuddata']))  
 {  
     $output = '';  
      $query = "SELECT student_info.student_number, student_info.lastname, student_info.firstname, student_info.middlename, payment.balance, payment.total_cash, payment.schoolyr, payment.semester, payment.status, payment.amount, payment.req_down, payment.midterm FROM payment INNER JOIN student_info ON student_info.student_number = payment.student_number WHERE student_info.student_number LIKE '%".$_POST["query"]."%'";  
      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  

                 $output = '<br><div class="container m-0" id="studdata">
                            <div class="row">
                            <br>
                            <div class="col-sm">
                            Student Number: <span id="sn"><b>'.$row["student_number"].'</b></span><br>
                            Name: <b>'.$row["lastname"].',&nbsp;'.$row["firstname"].'&nbsp;'.$row["middlename"].'</b><br>
                            Balance: <span id="bal"><b>'.$row["balance"].'</b></span> <br>
                            Payment: <span id="tcash"><b>'.$row["total_cash"].'</b></span> <br>
                            Required Downpayment: <span id="rq"><b>'.$row["req_down"].'</b></span> <br>
                            Midterm: <span id="mm"><b>'.$row["midterm"].'</b></span> <br>
                            Final: <span id="am"><b>'.$row["amount"].'</b></span> <br>
                            School Year: <span id="sy"><b>'.$row["schoolyr"].'</b></span> <br>
                            Semester: <span id="sem"><b>'.$row["semester"].'</b></span> <br>



                            <label id="totalcash" hidden="">'.$row["total_cash"].'</label>
                            <span id="stat" hidden="">'.$row["status"].'</span><br>
                            
                            <span id="ln" hidden="">'.$row["lastname"].'</span>
                            <span id="fn" hidden="">'.$row["firstname"].'</span>
                            <span id="mn" hidden="">'.$row["middlename"].'</span>
                            <span id="ds" hidden="">Tuition Fees</span>
                            </div>

                            <div class="col-sm-4">
                            <input type="text" class="form-controls" id="or_id" aria-label="Default" placeholder="Official Receipt Number" aria-describedby="inputGroup-sizing-default" maxlength="6" onkeypress="return Validate(event);"><br>

                            <label class="container-check" id="pn">Promisorry Note
                              <input type="checkbox" id="promissory_note">
                              <span class="checkmark-check"></span>
                            </label>

                            </div>

                            
                            <br>
                            <br>
                            </div>';

           }  
      }  
      else  
      {  
        if($row ="")
                 {
                  $output = '<div class="row"><div class="col-sm">Name: No Record </div>  </div>';
                 }
        else
        {
           $output = '<div class="row"><div class="col-sm">Name: No Record </div>  </div>';
        }
 
      }  

      $queryunit = mysqli_query($conn, "SELECT * FROM payment_com WHERE student_number LIKE '%".$_POST["query"]."%' ") OR die(mysqli_error($conn));
       
       if(mysqli_num_rows($queryunit) > 0)
       {
        
       while($rowunit = mysqli_fetch_array($queryunit))  
           {
            

            $totalunits = $rowunit["scholar"];

            

            }

            $output .= '<span hidden>Tuition Fees: </strong> <strong id="scholar" hidden>'.$totalunits.'</strong> </span>

                        ';

         $output .='';

       }


      echo $output; 
      exit(); 
 }  


 //for checking of student data in transaction_fess database
 if(isset($_POST['checkstudent'])) {
$query = $_POST['query'];
$sem = $_POST['sem'];
$sy = $_POST['sy'];
$count = 0;
$query = mysqli_query($conn, "SELECT * FROM transaction_fees WHERE semester='$sem' AND schoolyr = '$sy' AND student_number = '$query'") or die(mysqli_error($conn));
  if(mysqli_num_rows($query) > 0)
  {
      echo '1';
  }
  else
  {
      echo '';
  }
  exit();
  }



 if(isset($_POST['addpayment'])){
  $sn1 = $_POST['query'];
  $ln = $_POST['lname'];
  $fn = $_POST['fname'];
  $mn = $_POST['mname'];
  $sy = $_POST['sy'];
  $sem = $_POST['sem'];
  $stat = $_POST['status'];
  $cashier = $_POST['cashier'];
  $or = $_POST['or'];
  $bal = $_POST['bal'];
  $cash = $_POST['cash'];
  $ac = $_POST['ac'];
  $am = $_POST['am'];
  $dscipt = $_POST['dscpt'];
  $mterm = $_POST['midterm'];
  $promi = $_POST['promi'];
  $md = $_POST['md'];
  $fd = $_POST['fd'];
  $scholar = $_POST['scholar'];
  $count = 0;




  $queryor = "SELECT * FROM transaction_fees WHERE official_receipt = '$or' AND semester = '".$sem."'' AND schoolyr = '".$sy."' AND student_number = '".$sn1."' ";
  $resultor = mysqli_query($conn, $queryor);
  if(mysqli_num_rows($resultor) > 0)  
    {  
        echo '1';
        exit();
  }
  else
  {

 
  // payment database
  $querylist = "UPDATE payment SET balance = '".$bal."', total_cash = '".$ac."', promissory_note = '".$promi."', md = '".$md."', fd = '".$fd."' WHERE student_number ='".$sn1."'";
  $resultlist = mysqli_query($conn, $querylist) or die(mysqli_error($conn));

  // all transaction database
  $querytrans = "INSERT INTO transaction_all (`lastname`, `firstname`, `middlename`, `official_receipt`, `cash_rendered`, `amount`, `schoolyr`, `semester`, `cashier`, `description`, `date_paid`) VALUES ('$ln', '$fn', '$mn', '$or', '$cash', '$am', '$sy', '$sem', '$cashier', '$dscipt', CURRENT_DATE())";
  $resulttrans = mysqli_query($conn, $querytrans);

  // transaction fees database
  $stmt = $pdo_conn->prepare("INSERT INTO transaction_fees (student_number, scholar, official_receipt, cash_rendered, balance, amount, status, cashier, schoolyr, semester, `date`) VALUES (?,?,?,?,?,?,?,?,?,?,CURRENT_DATE())");
  $stmt->bindParam(1, $sn1);
  $stmt->bindParam(2, $scholar);
  $stmt->bindParam(3, $or);
  $stmt->bindParam(4, $cash);
  $stmt->bindParam(5, $bal);
  $stmt->bindParam(6, $am);
  $stmt->bindParam(7, $stat);
  $stmt->bindParam(8, $cashier);
  $stmt->bindParam(9, $sy);
  $stmt->bindParam(10, $sem);


  if($stmt->execute())
  {
    echo "0";
  }
  
  exit();
}
}



?>



<script type="text/javascript">
  
 function Validate(event) {
        var regex = new RegExp("^[0-9]");
        var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }

    
</script>