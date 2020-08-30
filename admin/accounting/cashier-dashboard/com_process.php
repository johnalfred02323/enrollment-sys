<?php

include('../../../config/config.php');


if(isset($_POST['editfees'])){
  $id = $_POST['id'];
  $query = "SELECT DISTINCT payment_com.student_number, student_info.lastname, student_info.firstname, student_info.middlename, student_info.course_id, course.course_abbreviation, payment_com.scholar, payment_com.tuition_fees, payment_com.totalunits, payment_com.perunits, payment_com.total_units, payment_com.amount, payment_com.discount, payment_com.total_discount, payment_com.semester, payment_com.schoolyr, payment_com.date_enrolled, payment_com.year_level, payment_com.status FROM payment_com 
    INNER JOIN student_info ON payment_com.student_number = student_info.student_number INNER JOIN course ON student_info.course_id = course.course_id WHERE paycom = $id";


  $result = mysqli_query($conn, $query);
  $output = '';
  if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);
    $output .= '
    <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Certificate of Matriculation</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="reset()">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
 
        <div class="modal-body">

        <input type="hidden" id="id_val" value="'.$id.'">
        
        <h5>Student Number: <span id="studno"><b>'.$row["student_number"].'</b> </span></h5>

        <h5>Name: <span id="name"> <b>'.$row["lastname"].',&nbsp;'.$row["firstname"].'&nbsp;'.$row["middlename"].'</b> </span></h5>

        <h5>Course: <span id="kurs"> <b>'.$row["course"].'</b> </span></h5>        
        
        <h5>S.Y. <span id="sy"> <b>'.$row["schoolyr"].' </span> <span id="sem"> '.$row["semester"].' </b> </span></h5> 
        <label id="scholar" hidden="">'.$row["scholar"].'</label>
        <label id="fees" hidden="">'.$row["tuition_fees"].'</label>
        <label id="tunits1" hidden="">'.$row["totalunits"].'</label>
        <label id="perunits" hidden="">'.$row["perunits"].'</label>
        <label id="tunits2" hidden="">'.$row["total_units"].'</label>
        <label id="amount" hidden="">'.$row["amount"].'</label>
        <label id="dis" hidden="">'.$row["discount"].'</label>
        <label id="tdis" hidden="">'.$row["total_discount"].'</label>
        <label id="today" hidden="">'.$row["date_enrolled"].'</label>
        <label id="yrlvl" hidden="">'.$row["year_level"].'</label>
        <label id="status1" hidden="">'.$row["status"].'</label>



        </div> <!-- Modal Body End -->

      <div class="modal-footer">
        <button type="button" class="cancel" data-dismiss="modal" onclick="reset()"><i class="far fa-times-circle"></i> Cancel</button>
        <button type="button" class="save" id="print" ripple><i class="fa fa-print"></i> PRINT</button>
      </div>

      </div>


    ';
  }
  echo $output;
  exit();
}



?>