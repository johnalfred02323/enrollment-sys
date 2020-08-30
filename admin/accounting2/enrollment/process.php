<?php
include('../../../config/config.php');

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
	    	$query = "SELECT student_enrollment_record.student_number, student_enrollment_record.sched_id, schedule.sched_id, schedule.semester, schedule.school_year, student_info.student_number, student_info.lastname, student_info.firstname, student_info.middlename, student_info.course, grade_viewing_code.code, grade_viewing_code.status FROM student_enrollment_record INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id INNER JOIN student_info ON student_info.student_number = student_enrollment_record.student_number LEFT JOIN grade_viewing_code ON grade_viewing_code.student_number = student_info.student_number WHERE school_year = '".$school_year."' AND semester = '".$semester."' AND student_enrollment_record.status = 'Enlisted' AND (student_info.student_number LIKE '%".$search."%' OR student_info.lastname LIKE '%".$search."%' OR student_info.firstname LIKE '%".$search."%') AND (";
	    	for($i = 0; $i < count($course); $i++) {
				$query .= " course = '".$course[$i]."' OR";
			}
	    }
	    else {
	    	$query = "SELECT DISTINCT student_enrollment_record.student_number, schedule.semester, schedule.school_year, student_info.lastname, student_info.firstname, student_info.middlename, student_info.course FROM student_enrollment_record INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id INNER JOIN student_info ON student_info.student_number = student_enrollment_record.student_number WHERE school_year = '".$school_year."' AND semester = '".$semester."' AND student_enrollment_record.status = 'Enlisted' AND (";
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
				$output	.=	'<td class="d-flex justify-content-center"><button class="view-user transact" data-toggle="modal" data-target="#transaction_modal" id="'.$row['student_number'].'">Transact</button></td>
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

      $query = "SELECT * FROM student_info WHERE student_number ='".$sn."'";

      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
      $first = '';
      $second = '';
      $third = '';
      $output = '';
      if(mysqli_num_rows($result) > 0) {
      	$stud_info = mysqli_fetch_assoc($result);
      		$output .= '<div class="row">
      					<div class="col-sm-4"> 

			                Student Number: <span id="sn">'.$stud_info["student_number"].'</span><br>

			                <input type="text" class="form-controls" id="studno_hide" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="'.$stud_info["student_number"].'" hidden="">

			                Name: '.$stud_info["lastname"].',&nbsp;'.$stud_info["firstname"].'&nbsp;'.$stud_info["middlename"].'
			                
			                <br>
			                Course: <span id="course">'.$stud_info["course"].'</span>&nbsp;&nbsp;&nbsp; <span id="major">Major: '.$stud_info["major"].'</span>

			                <br>
			                <br>';
		$get_fees = mysqli_query($conn, "SELECT * FROM tuition_fees");
      	$output .= '<div class="box1">
			                <select name="samp2" id="samp1" required>
			                    <option hidden>Tuition Fees Per Unit</option>';
      	while($row2 = mysqli_fetch_assoc($get_fees)) {
      		$output .= '<option>'.$row2['tuition_fees'].' </option>';
      	}
      	$output .= '</select></div>';

      	$get_sc = mysqli_query($conn, "SELECT student_enrollment_record.date, schedule.semester, schedule.school_year FROM student_enrollment_record INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id WHERE school_year = '".$_POST['school_year']."' AND semester = '".$_POST['semester']."'") OR die(mysqli_error($conn));
      	$row = mysqli_fetch_assoc($get_sc);
      	$output .= '</div> 
						<div class="col-sm-4">

			                <div class="box1">
			                    <select name="scholar1" id="scholar" required>
			                        <option hidden>Type of Scholar</option>
			                        <option>Partial Scholar</option>
			                        <option>Fully Paid</option>
			                        <option>40%</option>
			                        <option>20%</option>
			                    </select>
			                </div>
			                <br>
			                Date: '.$row["date"].'

			                <br>
			                Semester: '.$row["semester"].'
			                <br>
			                School Year: '.$row["school_year"].'

			              
			            </div>

			            <div class="col-sm-4"> 

			                <input type="text" class="form-controls" id="or_id" aria-label="Default" placeholder="Official Receipt Number" aria-describedby="inputGroup-sizing-default" maxlength="6" onkeypress="return Validate(event);">
			                <br>

			                <label class="container-check">Promisorry Note
							  <input type="checkbox" id="promissory_note">
							  <span class="checkmark-check"></span>
							</label>

							<label class="container-check">Early Bird
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

  		 $queryunits = mysqli_query($conn, "SELECT student_enrollment_record.student_number, subject.subj_id, subject.subject_code, subject.units, schedule.semester, schedule.school_year FROM student_enrollment_record INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id Inner join subject on subject.subj_id = schedule.subj_id WHERE student_number = '".$sn."' AND school_year = '".$_POST['school_year']."' AND semester = '".$_POST['semester']."'") OR die(mysqli_error($conn));
  		 
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
  $or = $_POST['or'];
  $promi = $_POST['promi'];
  $cash = $_POST['cashrender'];
  $balance = $_POST['bals'];
  $discount = $_POST['disc'];
  $amount = $_POST['amount1'];
  $discounted = $_POST['tdisc'];
  $status = $_POST['stat'];
  $earlybird = $_POST['earlybird'];
  
  $queryor = "SELECT * FROM payment WHERE official_receipt = $or";
  $resultor = mysqli_query($conn, $queryor);
  if(mysqli_num_rows($resultor) > 0)  
    {  
        echo '1';
        exit();
	}
	else
	{

	$querylist = "UPDATE student_enrollment_record SET status = 'Enrolled' where student_number ='".$sn1."'";
    $resultlist = mysqli_query($conn, $querylist) or die(mysqli_error($conn));



  $stmt = $pdo_conn->prepare("INSERT INTO payment (student_number, official_receipt, promissory_note, cash_rendered, balance, discount, amount, discounted, status, fully_paid) VALUES (?,?,?,?,?,?,?,?,?,?)");
  $stmt->bindParam(1, $sn1);
  $stmt->bindParam(2, $or);
  $stmt->bindParam(3, $promi);
  $stmt->bindParam(4, $cash);
  $stmt->bindParam(5, $balance);
  $stmt->bindParam(6, $discount);
  $stmt->bindParam(7, $amount);
  $stmt->bindParam(8, $discounted);
  $stmt->bindParam(9, $status);
  $stmt->bindParam(10, $earlybird);

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
	       	   var md1 = $('#midterm').text(md);

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

	       	   $('#midterm').text('0');
	       	   $('#finals').text('0');
	       	   $('#downpayment').text('0');
	       	   $('#disamount').text('0');
	       	   $('#discount').text('0');

	    	   var earlybird = Number(amount1)*.1;
	       	   var disbird = $('#discount').text(earlybird);
	       	  
	       	   var discounted = Number(amount1) - Number(earlybird);
	       	   var disc = $('#disamount').text(discounted);

  		} 
  		else 
  		{
	     	$('#discount').text('0');
		    var md = Number(amount1)*.7;
		    var md1 = $('#midterm').text(md);	       	   
	     	var ft = Number(amount1);
		    var md1 = $('#finals').text(ft);
		    var rqdown = Number(amount1)*.4;
	       	var rqdown1 = $('#downpayment').text(rqdown);
		    // $('#midtermlbl').show();
		    $('#disamount').text('0');
	    
     	
  		}

}




 function Validate(event) {
        var regex = new RegExp("^[0-9-]");
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
 var numb3 = $('#disamount').text();


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
  		
  // 		if($(this).val() == '')
		// {
		//   $('#bal').val('');
		 
		// }
		// else {
   
  //   		var result2 = parseInt(numb2) - parseInt(numb3);

		// 		  if (result2 >= 0)
		// 		   {
		// 		   		$('#bal').val('0');
		// 		   }

		// 		  if (result2 <= 0)
		// 		   {
		// 		   		$('#bal').val(Math.abs(result2));
		// 		   }	
  // 			 }
			





});   
</script>

