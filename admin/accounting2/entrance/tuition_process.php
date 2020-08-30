<?php

include('../../../config/config.php');

if(isset($_POST['addfees'])){
  $tfees = $_POST['tfees'];
  $remarks = $_POST['remarks'];
  
  $stmt = $pdo_conn->prepare("INSERT INTO entrance_exam_permit (description, price) VALUES (?,?)");
  $stmt->bindParam(1, $tfees);
  $stmt->bindParam(2, $remarks);

  if($stmt->execute())
  {
    echo "1";
  }
  
  exit();
} 
   

if(isset($_POST['updatefees'])){
  $id = $_POST['id'];
  $tuition_fees = $_POST['tuition_fees'];
  $remarks = $_POST['remarks'];

  $check = mysqli_query($conn, "SELECT * FROM entrance_exam_permit WHERE ee_id = '$id'");

  if (mysqli_num_rows($check) > 0) {
    $chk = mysqli_fetch_assoc($check);
    if($chk['ee_id'] == $id){
      $stmt = $pdo_conn->prepare("UPDATE entrance_exam_permit SET price = ?, description = ? WHERE ee_id = ?");
      $stmt->bindParam(1, $tuition_fees);
      $stmt->bindParam(2, $remarks);
      $stmt->bindParam(3, $id);

      if($stmt->execute())
      {
        echo '1';
      }
    }
    else{
      echo '0';
    }
  }
  else{
    $stmt = $pdo_conn->prepare("UPDATE entrance_exam_permit SET price = ?, description = ? WHERE ee_id = ?");
    $stmt->bindParam(1, $tuition_fees);
    $stmt->bindParam(2, $remarks);
    $stmt->bindParam(3, $id);

    if($stmt->execute())
    {
      echo '1';
    }
  }
}

if(isset($_POST['deletefees'])){
  $id = $_POST['id'];
  $result = mysqli_query($conn, "DELETE FROM entrance_exam_permit WHERE ee_id = $id");
  echo "Delete Succesfully";
  exit();
}

if(isset($_POST['editfees'])){
  $id = $_POST['id'];
  $query = "SELECT * FROM entrance_exam_permit WHERE ee_id = $id";
  $result = mysqli_query($conn, $query);
  $output = '';
  if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);
    $output .= '
    <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Other Fees</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="reset()">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
 
        <div class="modal-body">

        <input type="hidden" id="id_val" value="'.$id.'">
  <div id="edit_d" class="form-group">
    <input id="edit_desc" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" value="'.$row['description'].'">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="desc" class="float-label" style="font-family:Arial, FontAwesome">Description</label>
          <erroru>
            Description is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </erroru>
  </div>



  <div id="edit_p" class="form-group">
    <input id="edit_price" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" value="'.$row['price'].'">
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

        </div> <!-- Modal Body End -->

      <div class="modal-footer">
        <button type="button" class="cancel" data-dismiss="modal" onclick="reset()"><i class="far fa-times-circle"></i> Cancel</button>
        <button type="button" class="save" id="update_btn" ripple><i class="fas fa-pen"></i> Update</button>
      </div>

      </div>

    <script src="tuition.js"></script>';
  }
  echo $output;
  exit();
}



?>