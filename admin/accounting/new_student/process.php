<?php
include('../../../config/config.php');
error_reporting(0);

if(isset($_POST['get_students'])) {
  $course = json_decode($_POST['all']);
  $semester = $_POST['semester'];
  $school_year = $_POST['school_year'];
  $output = '';
  $output .= '<div class="table-responsive table-scroll"><table class="table table-striped" id="student_table">
        <thead>
          <tr class="table-bordered">
            <th scope="col">Student&nbsp;Number</th>
            <th scope="col">Name</th>
            <th scope="col" class="align-items-center">Action</th>
          </tr>
        </thead>
        <tbody>';

  if(count($course) > 0) {
    if(isset($_POST['val'])) {
      $search = $_POST['val'];
        $query = "SELECT DISTINCT student_enrollment_record.student_number, student_enrollment_record.sched_id, schedule.sched_id, schedule.semester, schedule.school_year, student_info.course, student_info.student_number, student_info.lastname, student_info.firstname, student_info.middlename, student_info.course FROM student_enrollment_record INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id INNER JOIN student_info ON student_info.sisnum = student_enrollment_record.student_number WHERE school_year = '".$school_year."' AND semester = '".$semester."' AND student_enrollment_record.status = 'Enlisted' AND (student_info.student_number LIKE '%".$search."%' OR student_info.lastname LIKE '%".$search."%' OR student_info.firstname LIKE '%".$search."%') AND (";
        for($i = 0; $i < count($course); $i++) {
        $query .= " course = '".$course[$i]."' OR";
      }
      }
      else {
        $query = "SELECT DISTINCT student_enrollment_record.student_number, schedule.semester, schedule.school_year, student_info.course, student_info.lastname, student_info.firstname, student_info.middlename, student_info.course FROM student_enrollment_record INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id INNER JOIN student_info ON student_info.sisnum = student_enrollment_record.student_number WHERE school_year = '".$school_year."' AND semester = '".$semester."' AND student_enrollment_record.status = 'Enlisted' AND (";
        for($i = 0; $i < count($course); $i++) {
        $query .= " course = '".$course[$i]."' OR";
      }
      }

    

    $query = substr($query, 0, -3);
    $query .= ')';
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if(mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        $output .= '<tr>
                <td>'.$row['student_number'].'</td>
                <td>'.$row['lastname'].', '.$row['firstname'].' '.substr($row['middlename'], 0,1).'.</td>';
        $output .=  '<td class="d-flex justify-content-center"><button class="view-user transact" data-toggle="modal" data-target="#transaction_modal" id="'.$row['student_number'].'">Transact</button></td>
        </tr>';
      }
    }
    else {
      $output .= "<tr><td colspan='4'><center>No Students to display here with your selection.</center></td></tr>";
    }
  }
  else {
    $output .= "<tr><td colspan='4'><center>Select Course to display Student List</center></td></tr>";
  }
  $output .= "</tbody></table></div>";
  echo $output;
  exit();
}


if(isset($_POST['fetch_single'])) {
  $sn = $_POST['sn'];
  // student number, name, semester, school year, enlisted date, type of schoolar, promisorry note, tuition fees, OR, total units, miscelanous, total amount, cash rendered, balances,  
  // $query = "SELECT student_info.student_number, student_info.lastname, student_info.firstname, student_info.middlename,
 //      student_info.course, student_info.major, student_enrollment_record.enlisted_date, schedule.semester, schedule.school_year
 //      FROM student_enrollment_record
 //      LEFT join student_info on student_enrollment_record.student_number = student_info.student_number
 //      left join schedule on student_enrollment_record.sched_id = schedule.sched_id 
 //      WHERE student_info.student_number = '".$sn."'"; 


    $today = date("Y-m");

    $query20 = "select * from student order by stud_id desc";
    $result20 = mysqli_query($conn, $query20);
    $id = mysqli_fetch_assoc($result20);
    
    $studnum = $id['stud_id'];
    $str = "1";
  

    if($studnum < 10)
    {
      $stud = "$today-0000".$studnum;
    }
    else if($studnum < 100)
    {
      $stud = "$today-000".$studnum;
    }
    else if($studnum < 1000)
    {
      $stud = "$today-00".$studnum;
    }
    else if($studnum < 10000)
    {
      $stud = "$today-0".$studnum;
    }
    else
    {
      $stud = "$today-".$studnum; 
    }





      $query = "SELECT * FROM student_info WHERE sisnum ='".$sn."'";

      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
      $first = '';
      $second = '';
      $third = '';
      $output = '';
      if(mysqli_num_rows($result) > 0) {
        $stud_info = mysqli_fetch_assoc($result);
          $output .= '<div class="row">
                <div class="col-sm-4"> 

                      Student Number: <span id="sn">'.$stud.'</span><br>

                      <input type="text" class="form-controls" id="studno_hide" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="'.$stud.'" hidden="">

                      Name: <span id="fl">'.$stud_info["lastname"].',&nbsp;'.$stud_info["firstname"].'&nbsp;'.$stud_info["middlename"].'</span>
                      <span id="sisnum1" hidden>'.$stud_info["sisnum"].'</span>
                      <br>
                      Course: <span id="course">'.$stud_info["course"].'</span>&nbsp;&nbsp;&nbsp; <span id="major">Major: '.$stud_info["major"].'</span>
                      
                      <div class="row">
                      <div class="col-sm-6">
                      <div class="box1">
                          <select name="yrlvl1" id="yrlvl2" required class="col-sm-10">
                              <option hidden>Year Level</option>
                              <option>1st yr</option>
                              <option>2nd yr</option>
                              <option>3rd yr</option>
                              <option>4th yr</option>
                              <option>5th yr</option>
                          </select>
                      </div>
                      </div>
                      <div class="col-sm-6">
                      <div class="box1">
                          <select name="reg1" id="reg2" required class="col-sm-10">
                              <option hidden>Status</option>
                              <option>Regular</option>
                              <option>Irregular</option>
                          </select>
                      </div>
                      </div>
                      </div>

                      <label id="ln" hidden="">'.$stud_info["lastname"].'</label>
                      <label id="fn" hidden="">'.$stud_info["firstname"].'</label>
                      <label id="mn" hidden="">'.$stud_info["middlename"].'</label>

                      <br>';

        $get_fees = mysqli_query($conn, "SELECT * FROM tuition_fees");
        $output .= '<div class="box1">
                      <select name="samp2" id="samp1" required class="col-sm-11">
                          <option hidden>Tuition Fees Per Unit</option>';
        while($row2 = mysqli_fetch_assoc($get_fees)) {
          $output .= '<option>'.$row2['tuition_fees'].' </option>';
        }
        $output .= '</select></div>';

        
        $today = date('Y-m-d');
        
        $get_sc = mysqli_query($conn, "SELECT student_enrollment_record.date, schedule.semester, schedule.school_year FROM student_enrollment_record INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id WHERE school_year = '".$_POST['school_year']."' AND semester = '".$_POST['semester']."'") OR die(mysqli_error($conn));
        $row = mysqli_fetch_assoc($get_sc);
        $output .= '</div> 
            <div class="col-sm-4">

                      <div class="box1">
                          <select name="scholar1" id="scholar" required>
                              <option hidden>Type of Scholar</option>
                              <option>Partial Scholar</option>
                              <option>Full Scholar</option>
                          </select>
                      </div>
                      <br>
                      Date: <label id="tdates">'.$today.'</label>

                      <br>
                      Semester: <label id="semester">'.$row["semester"].'</label>
                      <br>
                      School Year: <label id="schoolyr">'.$row["school_year"].'</label>

                    
                  </div>

                  <div class="col-sm-4"> 

                      <input type="text" class="form-controls" id="or_id" aria-label="Default" placeholder="Official Receipt Number" aria-describedby="inputGroup-sizing-default" maxlength="6" onkeypress="return Validate(event);">
                      <br>

              <label class="container-check" id="pn">Promisorry Note
                <input type="checkbox" id="promissory_note">
                <span class="checkmark-check"></span>
              </label>

              <label class="container-check" id="eb">Early Bird
                <input type="checkbox" id="early_bird" onclick="earlybirds()">
                <span class="checkmark-check"></span>
              </label>

                    </div>


          </div>';

        

        $queryfee = mysqli_query($conn, "SELECT sum(price) FROM current_fees");
       while ($row = mysqli_fetch_array($queryfee))
       {
        $output .= '<div class="row"><div class="col-sm-4"><strong><label>Miscellaneous:</label> '.$row['sum(price)'].'</strong> 
        <br>
        <input type="text" class="form-controls" id="ss" aria-label="Default" aria-describedby="inputGroup-sizing-default" hidden="" value="'.$row['sum(price)'].'">
        ';

       }

       $queryunits = mysqli_query($conn, "SELECT DISTINCT student_enrollment_record.student_number, subject.subj_id, subject.subject_code, subject.units, schedule.semester, schedule.school_year FROM student_enrollment_record INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id Inner join subject on subject.subj_id = schedule.subj_id WHERE student_number = '".$sn."' AND school_year = '".$_POST['school_year']."' AND semester = '".$_POST['semester']."'") OR die(mysqli_error($conn));
       
       if(mysqli_num_rows($queryunits) > 0)
       {
        
        $totalunits = 0;
        $totalctr = 0;
       
       while($rows1 = mysqli_fetch_array($queryunits))  
           {
            $unit = $rows1["units"];

            $totalunits = $totalunits + $unit;
            

            }

            $output .= '<tr><td><strong>Total Units: </strong> <strong id="total1">'.$totalunits.'</strong> <strong>* <label id="fees"></label></strong>  <strong id="totalunits1" hidden></strong></td></tr>';

            $output .= '<br><tr><td><strong>Amount: <label id="totalamount"></label></strong></td></tr><br>

            <tr><td><strong>Required Downpayment: <label id="downpayment">0</label></strong></td></tr>
            <br>
            <tr><td><strong>Discount: <label id="discount">0</label></strong></td></tr>
            <br>
            <tr><td><strong>Discounted Amount: <label id="disamount">0</label></strong></td></tr>
            <br>
            <tr><td><strong id="midtermlbl">Midterm: <label id="midterm">0</label></strong></td></tr>
            <br>
            <tr><td><strong>Finals: <label id="finals">0</label></strong></td></tr>
            <tr><td><strong><label id="en_status" hidden="">Enrolled</label></strong></td></tr>
            <tr><td><strong><label id="descript" hidden="">Tuition Fees</label></strong></td></tr>
            </div>


            <div class="col-sm-4">

            <input type="text" class="form-controls" id="cashrender" aria-label="Default" placeholder="Cash Rendered" aria-describedby="inputGroup-sizing-default" maxlength="5" onkeypress="return Validate(event);">
            Balance
            <input type="text" class="form-controls" id="bal" aria-label="Default" aria-describedby="inputGroup-sizing-default" disabled="">



            </div></div>';
       }
        
        echo $output;
      }
      else {
        echo "0";
        exit();
      }
}

if(isset($_POST['addpayment'])){
  $sn1 = $_POST['query'];
  $fl = $_POST['fullname'];
  $or = $_POST['or'];
  $promi = $_POST['promi'];
  $cash = $_POST['cashrender'];
  $balance = $_POST['bals'];
  $discount = $_POST['disc'];
  $amount = $_POST['amount1'];
  $discounted = $_POST['tdisc'];
  $status = $_POST['stat'];
  $sem1 = $_POST['sem'];
  $sy1 = $_POST['sy'];
  $unit1 = $_POST['perunits1'];
  $cash1 = $_POST['cashrender'];
  $uc = $_POST['uc'];
  $ln = $_POST['ln1'];
  $fn = $_POST['fn1'];
  $mn = $_POST['mn1'];
  $scholar = $_POST['scholar1'];
  $misc = $_POST['misc1'];
  $units = $_POST['units1'];
  $tunits = $_POST['tunits1'];
  $dscript = $_POST['dscpt'];
  $mdterm = $_POST['mdterm'];
  $yrlvl = $_POST['yrlvl'];
  $downpay = $_POST['downpay'];
  $reg = $_POST['reg'];
  $snum = $_POST['snum1'];


  $queryor = "SELECT * FROM payment WHERE official_receipt = $or";
  $resultor = mysqli_query($conn, $queryor);
  if(mysqli_num_rows($resultor) > 0)  
    {  
        echo '1';
        exit();
  }
  else
  {

  $querylist = "UPDATE student_enrollment_record SET status = 'Enrolled', student_number = '".$sn1."' where student_number ='".$snum."'";
  $resultlist = mysqli_query($conn, $querylist) or die(mysqli_error($conn));

  $queryadmission = "UPDATE student_info SET student_number = '".$sn1."' where sisnum ='".$snum."'";
  $resultadmission = mysqli_query($conn, $queryadmission) or die(mysqli_error($conn));

  $queryst = "INSERT INTO student (`student_number`, `name`) VALUES ('".$sn1."', '$fl')";
  $resultst = mysqli_query($conn, $queryst) or die(mysqli_error($conn));

  // statement of account database
  $querysao = "INSERT INTO statement_of_account (`student_number`, `tuition`, semester, `schoolyear`, `date_created`) VALUES ('".$sn1."', $unit1, '$sem1', '$sy1', CURRENT_DATE())";
  $resultsao = mysqli_query($conn, $querysao) or die(mysqli_error($conn));

  // transaction Fees database
  $queryfees = "INSERT INTO transaction_fees (`student_number`, `scholar`, `promissory_note`, `official_receipt`, `cash_rendered`, `balance`, `discount`, `amount`, `discounted`, `status`, `cashier`, `schoolyr`, `semester`, `date`) VALUES ('".$sn1."', '$scholar', '$promi', '$or', '$cash', '$balance', '$discount', '$amount', '$discounted', '$status', '$uc', '$sy1', '$sem1', CURRENT_DATE())";
  $resultfees = mysqli_query($conn, $queryfees) or die(mysqli_error($conn));

  // all transaction database
  $querytrans = "INSERT INTO transaction_all (`lastname`, `firstname`, `middlename`, `official_receipt`, `cash_rendered`, `amount`, `schoolyr`, `semester`, `cashier`, `description`, `date_paid`) VALUES ('$ln', '$fn', '$mn', '$or', '$cash', '$amount', '$sy1', '$sem1', '$uc', '$dscript', CURRENT_DATE())";
  $resulttrans = mysqli_query($conn, $querytrans);

  // certificate of matriculation
  $querycom = "INSERT INTO payment_com (`student_number`, `scholar`, `year_level`, `status`, `tuition_fees`, `totalunits`, `perunits`, `total_units`, `amount`, `discount`, `total_discount`, `schoolyr`, `semester`, `date_enrolled`) VALUES ('".$sn1."', '$scholar', '$yrlvl', '$reg', '$misc', '$units', '$unit1', '$tunits', '$amount', '$discount', '$discounted', '$sy1', '$sem1', CURRENT_DATE())";
  $resultcom = mysqli_query($conn, $querycom);

  // payment database
  $stmt = $pdo_conn->prepare("INSERT INTO payment (student_number, official_receipt, promissory_note, cash_rendered, balance, discount, amount, discounted, status, total_cash, cashier, schoolyr, semester, req_down, midterm, year_level, `enrolled_date`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,CURRENT_DATE())");
  $stmt->bindParam(1, $sn1);
  $stmt->bindParam(2, $or);
  $stmt->bindParam(3, $promi);
  $stmt->bindParam(4, $cash);
  $stmt->bindParam(5, $balance);
  $stmt->bindParam(6, $discount);
  $stmt->bindParam(7, $amount);
  $stmt->bindParam(8, $discounted);
  $stmt->bindParam(9, $status);
  $stmt->bindParam(10, $cash1);
  $stmt->bindParam(11, $uc);
  $stmt->bindParam(12, $sy1);
  $stmt->bindParam(13, $sem1);
  $stmt->bindParam(14, $downpay);
  $stmt->bindParam(15, $mdterm);
  $stmt->bindParam(16, $yrlvl);

  if($stmt->execute())
  {
    echo "0";
  }
  
  exit();
}
}


?>

<script>
$(document).on('change', '#samp1', function()
  {   

           var query = $('#ss').val();
           
           var tfees = $('#samp1').val();
           var tfees1 = $('#fees').text(tfees);

           var total = $('#total1').text();
           var amount = Number(query)+(Number(tfees)*Number(total)) ;
           var amount1 = $('#totalamount').text(amount);

           var qtotal = (Number(tfees)*Number(total));
           var qtotal1 = $('#totalunits1').text(qtotal);

           var rqdown = Number(amount)*.4;
           var rqdown1 = $('#downpayment').text(rqdown);

           var ds1 = $('#discount').text();
           var ds2 = $('#disamount').text();

           var checkBox = document.getElementById("early_bird");
           var text = document.getElementById("text");

       if (checkBox.checked == true)
       {
           var earlybird = Number(amount)*.1;
           var disbird = $('#discount').text(earlybird);

           var discounted = Number(amount) - Number(earlybird);
           var disc = $('#disamount').text(discounted);

           $('#downpayment').text('0');

           }
           else
           {
             $('#midtermlbl').show();
             var md = Number(amount)*.7;
             var md1 = $('#midterm').text(md.toFixed(0));

             var ft = Number(amount);
             var md1 = $('#finals').text(ft);

             $('#discount').text('0');
             
           }
           
  });


function earlybirds()
{
    var amount1 = $('#totalamount').text();
    var md1 = $('#midterm').text();
    var md1 = $('#finals').text();
    var rqdown1 = $('#downpayment').text();

    var checkBox = document.getElementById("early_bird");
    var text = document.getElementById("text");

    if (checkBox.checked == true)
      {

             document.getElementById('cashrender').value = '';
             document.getElementById('bal').value = '';
             $('#midterm').text('0');
             $('#finals').text('0');
             $('#downpayment').text('0');
             $('#disamount').text('0');
             $('#discount').text('0');

             var earlybird = Number(amount1)*.1;
             var disbird = $('#discount').text(earlybird);
            
             var discounted = Number(amount1) - Number(earlybird);
             var disc = $('#disamount').text(discounted);

                  // CASH RENDERED FOR DISCOUNT
                  $('#cashrender').keyup(function()
                    {
                       var numb1 = $('#disamount').text();
                       var numb2 = document.getElementById('cashrender').value;

                          if($(this).val() == '')
                          {
                            $('#bal').val('');   
                          }
                          else 
                            {
                                var result1 = parseInt(numb2) - parseInt(numb1);

                                  if (result1 >= 0)
                                   {
                                      $('#bal').val('0');
                                   }

                                  if (result1 <= 0)
                                   {
                                      $('#bal').val(Math.abs(result1));
                                   }

                            }
                    });

      } 
      else 
      {
        document.getElementById('cashrender').value = '';
        document.getElementById('bal').value = '';
        
        $('#discount').text('0');
        var md = Number(amount1)*.7;
        var md1 = $('#midterm').text(md.toFixed(0));             
        var ft = Number(amount1);
        var md1 = $('#finals').text(ft);
        var rqdown = Number(amount1)*.4;
        var rqdown1 = $('#downpayment').text(rqdown);
        $('#disamount').text('0');
      
                  // CASH RENDERED FOR NO DISCOUNT
                  $('#cashrender').keyup(function()
                    {
                       var numb1 = $('#totalamount').text();
                       var numb2 = document.getElementById('cashrender').value;

                          if($(this).val() == '')
                          {
                            $('#bal').val('');   
                          }
                          else 
                            {
                                var result1 = parseInt(numb2) - parseInt(numb1);

                                  if (result1 >= 0)
                                   {
                                      $('#bal').val('0');
                                   }

                                  if (result1 <= 0)
                                   {
                                      $('#bal').val(Math.abs(result1));
                                   }

                            }
                    });

      }

}


 function Validate(event) {
        var regex = new RegExp("^[0-9]");
        var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }


$('#cashrender').keyup(function()
{

 var numb1 = $('#totalamount').text();
 var numb2 = document.getElementById('cashrender').value;
 document.getElementById('promissory_note').checked = false;

    if($(this).val() == '')
    {
      $('#bal').val('');   
    }
    else 
      {
        var result1 = parseInt(numb2) - parseInt(numb1);

          if (result1 >= 0)
           {
              $('#bal').val('0');
           }

          if (result1 <= 0)
           {
              $('#bal').val(Math.abs(result1));
           }

        }
});


// Tuition Fees
  $('#samp1').change(function(){
    var tefees = document.getElementById("samp1");
    if(tefees.value == "150"){
    document.getElementById('cashrender').value = '';
    document.getElementById('bal').value = '';

  }else{
    (tefees.value == "200")
    document.getElementById('cashrender').value = '';
    document.getElementById('bal').value = '';
    }
  });
  
  // Type of Scholar
    $('#scholar').change(function(){
      var studscholar = document.getElementById("scholar");
      if(studscholar.value == "Partial Scholar"){
      $("#pn").show();
      $("#eb").show();
      document.getElementById('cashrender').value = '';
      document.getElementById('bal').value = '';

    }else{
    (studscholar.value == "Full Scholar")
    $("#pn").hide();
    $("#eb").hide();
    document.getElementById('cashrender').value = '';
    document.getElementById('bal').value = '';
    document.getElementById('promissory_note').checked = false;
    document.getElementById('early_bird').checked = false;

    var amount1 = $('#totalamount').text();
    var md1 = $('#midterm').text();
    var md1 = $('#finals').text();
    var rqdown1 = $('#downpayment').text();

        $('#discount').text('0');
        var md = Number(amount1)*.7;
        var md1 = $('#midterm').text(md.toFixed(0));             
        var ft = Number(amount1);
        var md1 = $('#finals').text(ft);
        var rqdown = Number(amount1)*.4;
        var rqdown1 = $('#downpayment').text(rqdown);
        $('#disamount').text('0');
      
                  // CASH RENDERED FOR NO DISCOUNT
                  $('#cashrender').keyup(function()
                    {
                       var numb1 = $('#totalamount').text();
                       var numb2 = document.getElementById('cashrender').value;

                          if($(this).val() == '')
                          {
                            $('#bal').val('');   
                          }
                          else 
                            {
                                var result1 = parseInt(numb2) - parseInt(numb1);

                                  if (result1 >= 0)
                                   {
                                      $('#bal').val('0');
                                   }

                                  if (result1 <= 0)
                                   {
                                      $('#bal').val(Math.abs(result1));
                                   }
                            }
                    });
      }
  });


</script>