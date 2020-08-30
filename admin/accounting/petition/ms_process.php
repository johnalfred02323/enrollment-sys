<?php

include('../../../config/config.php');

  if(isset($_POST['addpayment']))  
 {  
    $petid = $_POST['petid'];
    $sy = $_POST['school_year'];
    $sem = $_POST['semester'];

      $output = '';  
      $query = "SELECT count(subj_id), subject_code, subj_id, sched_id, school_year, semester, student_number FROM petition_request WHERE subj_id = '$petid' AND school_year = '$sy' AND semester = '$sem' ";  
      $result = mysqli_query($conn, $query);


if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);
    $output .= '
    <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Petition Subject</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="reset()">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
 
        <div class="modal-body">

        <input type="hidden" id="id_val" value="'.$petid.'">
        <span id="sy" hidden="">'.$row['school_year'].'</span>
        <span id="sem" hidden="">'.$row['semester'].'</span>

  <span id="edit_d">Petition Subject<br> <span id="edit_desc">'.$row['subject_code'].'</span></span><br>
  <span id="edit_p">Number of Student<br> <span id="edit_price">'.$row['count(subj_id)'].'</span></span>

    <div id="p" class="form-group">
    <input id="price" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" name="price" onkeypress="return ValidateNumber(event);" autocomplete="off" maxlength="8">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="price" class="float-label" style="font-family:Arial, FontAwesome">Price</label>
          <erroru>
            Price is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </erroru>
   </div>

  <div id="a" class="form-group">
    <input id="amount" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" name="price" onkeypress="return ValidateNumber(event);" autocomplete="off" maxlength="8">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="a" class="float-label" style="font-family:Arial, FontAwesome">Amount</label>
          <erroru>
            Amount is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </erroru>
  </div>



        </div> <!-- Modal Body End -->

      <div class="modal-footer">
        <button type="button" class="cancel" data-dismiss="modal" onclick="reset()"><i class="far fa-times-circle"></i> Cancel</button>
        <button type="button" class="save" id="save_btn" ripple><i class="far fa-save"></i> Save</button>
      </div>

      </div>

      <script>
      function ValidateNumber(event) {
        var regex = new RegExp("^[0-9]");
        var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }





      </script>

    <script src="tuition.js"></script>';
  }
  echo $output;
  exit();
}

if(isset($_POST['addfees'])){
  $subject = $_POST['subj'];
  $nostud = $_POST['num2'];
  $price = $_POST['num1'];
  $amount = $_POST['tamp'];
  $sy = $_POST['sy'];
  $sem = $_POST['sem'];
  $pet = $_POST['pet'];
  
  $stmt = $pdo_conn->prepare("INSERT INTO petition_price (subj_id, subject_code, no_student, price, amount, school_year, semester, `date_submit`) VALUES (?,?,?,?,?,?,?,CURRENT_DATE())");
  $stmt->bindParam(1, $pet);
  $stmt->bindParam(2, $subject);
  $stmt->bindParam(3, $nostud);
  $stmt->bindParam(4, $price);
  $stmt->bindParam(5, $amount);
  $stmt->bindParam(6, $sy);
  $stmt->bindParam(7, $sem);

  if($stmt->execute())
  {
    echo "0";
  }
  
  exit();
}  


?>