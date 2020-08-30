<?php

include('../../../config/config.php');


if(isset($_POST['editfees'])){
  $id = $_POST['id'];
  $query = "SELECT DISTINCT statement_of_account.student_number, student_info.lastname, student_info.firstname, student_info.middlename, student_info.course, statement_of_account.semester, statement_of_account.schoolyear, statement_of_account.tuition FROM statement_of_account 
    INNER JOIN student_info ON statement_of_account.student_number = student_info.student_number WHERE sao_id = $id";


  $result = mysqli_query($conn, $query);
  $output = '';
  if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);
    $output .= '
    <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Statement Of Account</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="reset()">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
 
        <div class="modal-body">

        <input type="hidden" id="id_val" value="'.$id.'">
        
        <h5>Student Number: <span id="studno"> <b>'.$row["student_number"].'</b> </span></h5>

        <h5>Name: <span id="name"> <b>'.$row["lastname"].',&nbsp;'.$row["firstname"].'&nbsp;'.$row["middlename"].'</b> </span></h5>

        <h5>Course: <span id="kurs"> <b>'.$row["course"].'</b> </span></h5>        
        
        <h5>S.Y. <span id="sy"> <b>'.$row["schoolyear"].' '.$row["semester"].' </b> </span></h5> 
        <label id="unit" hidden="">'.$row["tuition"].'</label>


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