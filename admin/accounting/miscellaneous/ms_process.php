<?php

include('../../../config/config.php');

if(isset($_POST['addfees'])){
  $miscellaneous = $_POST['miscellaneous'];
  $price = $_POST['price'];
  
  $stmt = $pdo_conn->prepare("INSERT INTO current_fees (miscellaneous, price) VALUES (?,?)");
  $stmt->bindParam(1, $miscellaneous);
  $stmt->bindParam(2, $price);

  if($stmt->execute())
  {
    echo "1";
  }
  
  exit();
}  
   

if(isset($_POST['updatefees'])){
  $id = $_POST['id'];
  $miscellaneous = $_POST['miscellaneous'];
  $price = $_POST['price'];

  $check = mysqli_query($conn, "SELECT * FROM current_fees WHERE cf_id = '$id'");

  if (mysqli_num_rows($check) > 0) {
    $chk = mysqli_fetch_assoc($check);
    if($chk['cf_id'] == $id){
      $stmt = $pdo_conn->prepare("UPDATE current_fees SET price = ?, miscellaneous = ? WHERE cf_id = ?");
      $stmt->bindParam(1, $miscellaneous);
      $stmt->bindParam(2, $price);
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
    $stmt = $pdo_conn->prepare("UPDATE current_fees SET price = ?, miscellaneous = ? WHERE cf_id = ?");
    $stmt->bindParam(1, $miscellaneous);
    $stmt->bindParam(2, $price);
    $stmt->bindParam(3, $id);

    if($stmt->execute())
    {
      echo '1';
    }
  }
}

if(isset($_POST['deletefees'])){
  $id = $_POST['id'];
  $result = mysqli_query($conn, "DELETE FROM current_fees WHERE cf_id = $id");
  echo "Delete Succesfully";
  exit();
}



if(isset($_POST['editfees'])){
  $id = $_POST['id'];
  $query = "SELECT * FROM current_fees WHERE cf_id = $id";
  $result = mysqli_query($conn, $query);
  $output = '';
  if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);
    $output .= '
    <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Miscellaneous</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="reset()">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
 
        <div class="modal-body">

        <input type="hidden" id="id_val" value="'.$id.'">
  <div id="edit_d" class="form-group">
    <input id="edit_desc" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" value="'.$row['miscellaneous'].'">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="desc" class="float-label" style="font-family:Arial, FontAwesome">Miscellaneous</label>
          <erroru>
            Miscellaneous is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </erroru>
  </div>



  <div id="edit_p" class="form-group">
    <input id="edit_price" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" value="'.$row['price'].'" onkeypress="return ValidateNumber(event);" maxlength="8">
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

<script type="text/javascript">
  function ValidateNumber(event) {
        var regex = new RegExp("^[0-9]");
        var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }
</script>

    <script src="ms.js"></script>';
  }
  echo $output;
  exit();
}



?>