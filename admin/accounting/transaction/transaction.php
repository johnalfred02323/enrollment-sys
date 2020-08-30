<?php
include('../../../config/config.php');
error_reporting(0);

 if(isset($_POST['autosearch']))  
 {  
      $output = '';  
      $query = "SELECT * FROM student_info WHERE student_number LIKE '%".$_POST["query"]."%'";  
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
      $query = "SELECT * FROM student_info WHERE student_number LIKE '%".$_POST["query"]."%'";  
      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  

                 $output = '<br><div class="container m-0" id="studdata">
                            <div class="row">
                            <br>
                            <div class="col-sm">
                            Student Number: <span id="sn"><strong>'.$row["student_number"].'</strong></span><br>
                            Name: <strong>'.$row["lastname"].',&nbsp;'.$row["firstname"].'&nbsp;'.$row["middlename"].'</strong>
                            </br>
                            <label id="lname" hidden="">'.$row["lastname"].'</label>
                            <label id="fname" hidden="">'.$row["firstname"].'</label>
                            <label id="mname" hidden="">'.$row["middlename"].'</label>
                            <label id="dscript" hidden="">Other Fees</label>
                            </div>

                            <div class="col-sm-4">
                            <input type="text" class="form-controls" id="or_id" aria-label="Default" placeholder="Official Receipt Number" aria-describedby="inputGroup-sizing-default" maxlength="6" onkeypress="return Validate(event);">
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

      echo $output;  
 }  

if(isset($_POST['add'])){

  $items = json_decode($_POST['allitems']);
  $sn = $_POST['sn'];
  $or = $_POST['or'];
  $rn = $_POST['rn'];
  $ch = $_POST['ch'];
  $tr = $_POST['tr'];
  $uc = $_POST['uc'];
  $ln = $_POST['ln'];
  $fn = $_POST['fn'];
  $mn = $_POST['mn'];
  $sy = $_POST['sy'];
  $sem = $_POST['sem'];
  $numb1 = $_POST['num1'];
  $dscript = $_POST['dscpt'];

  $a = '';
  $query = "SELECT * FROM transaction WHERE official_receipt = $or";
  $result = mysqli_query($conn, $query);
   if(mysqli_num_rows($result) > 0)  
      {  
        echo '1';
          exit();
  
}
else
{

            // all transaction database
            $querytrans = "INSERT INTO transaction_all (`lastname`, `firstname`, `middlename`, `official_receipt`, `cash_rendered`, `amount`, `schoolyr`, `semester`, `cashier`, `description`, `date_paid`) VALUES ('$ln', '$fn', '$mn', '$or', '$numb1', '$tr', '$sy', '$sem', '$uc', '$dscript', CURRENT_DATE())";
            $resulttrans = mysqli_query($conn, $querytrans);

            // transaction otherfees database
            for ($i=0;$i < count($items);$i++){
              $query = mysqli_query($conn ,"INSERT INTO transaction (studentnumber,official_receipt,otherfees_id,cash_rendered,amount_change,total_amount,cashier,schoolyear,semester,`date_paid`) VALUES ('".$sn."','".$or."',".$items[$i].",'".$rn."','".$ch."','".$tr."','".$uc."','".$sy."','".$sem."',CURRENT_DATE())");
              $a .= $items[$i].', ';

            }
          echo'0'; 
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