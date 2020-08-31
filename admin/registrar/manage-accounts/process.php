<?php
include('../../../config/config.php');

if(isset($_POST['adduser'])){
	$user = $_POST['uname'];
	$pass = password_hash($_POST['pass'], PASSWORD_ARGON2I);
	$usertype = $_POST['usertype'];
	$dept = $_POST['dept'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$mname = $_POST['mname'];
  $course = $_POST['course'];
  $major = $_POST['major'];

	$check = mysqli_query($conn, "SELECT * FROM user WHERE username = '$user'");
	if(mysqli_num_rows($check) > 0){
		echo "0";
	}
	else{
		$stmt = $pdo_conn->prepare("INSERT INTO user (firstname, lastname, middlename, username, password, usertype, department,course,major) VALUES (?,?,?,?,?,?,?,?,?)");
		$stmt->bindParam(1, $fname);
		$stmt->bindParam(2, $lname);
		$stmt->bindParam(3, $mname);
		$stmt->bindParam(4, $user);
		$stmt->bindParam(5, $pass);
		$stmt->bindParam(6, $usertype);
		$stmt->bindParam(7, $dept);
    $stmt->bindParam(8, $course);
    $stmt->bindParam(9, $major);

		if($stmt->execute())
		{
			echo "1";
		}
	}
	exit();
}       

if(isset($_POST['updateuser'])){
	$id = $_POST['id'];
	$user = $_POST['uname'];
	$pass = password_hash($_POST['pass'], PASSWORD_ARGON2I);
	$usertype = $_POST['usertype'];
	$dept = $_POST['dept'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$mname = $_POST['mname'];

	$check = mysqli_query($conn, "SELECT * FROM user WHERE username = '$user'");

	if (mysqli_num_rows($check) > 0) {
		$chk = mysqli_fetch_assoc($check);
		if($chk['id'] == $id){
			$stmt = $pdo_conn->prepare("UPDATE user SET firstname = ?, lastname = ?, middlename = ?, username = ?, password = ?,  usertype = ?, department = ? WHERE id = ?");
			$stmt->bindParam(1, $fname);
			$stmt->bindParam(2, $lname);
			$stmt->bindParam(3, $mname);
			$stmt->bindParam(4, $user);
			$stmt->bindParam(5, $pass);
			$stmt->bindParam(6, $usertype);
			$stmt->bindParam(7, $dept);
			$stmt->bindParam(8, $id);

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
		$stmt = $pdo_conn->prepare("UPDATE user SET firstname = ?, lastname = ?, middlename = ?, username = ?, password = ?,  usertype = ?, department = ? WHERE id = ?");
		$stmt->bindParam(1, $fname);
		$stmt->bindParam(2, $lname);
		$stmt->bindParam(3, $mname);
		$stmt->bindParam(4, $user);
		$stmt->bindParam(5, $pass);
		$stmt->bindParam(6, $usertype);
		$stmt->bindParam(7, $dept);
		$stmt->bindParam(8, $id);

		if($stmt->execute())
		{
			echo '1';
		}
	}
}

if(isset($_POST['deleteuser'])){
  $id = $_POST['id'];
  $result = mysqli_query($conn, "DELETE FROM user WHERE id = $id");
  if($result){
    echo "User deleted succesfully";
    exit();
  }
  else{
    echo "0";
    exit();
  }
}

if(isset($_POST['edit'])){
	$id = $_POST['id'];
	$query = "SELECT * FROM user WHERE id = $id";
	$result = mysqli_query($conn, $query);
	$output = '';
	if(mysqli_num_rows($result) == 1){
		$row = mysqli_fetch_assoc($result);
		$output .= '
		<div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update User Account</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="reset()">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
 
        <div class="modal-body">
		<div class="row">
              <div class="col-lg-6">
        <input type="hidden" id="id_val" value="'.$id.'">
  <div id="edit_f" class="form-group">
    <input id="edit_firstname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" value="'.$row['firstname'].'">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="firstname" class="float-label" style="font-family:Arial, FontAwesome">First Name</label>
          <erroru>
            First Name is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </erroru>
  </div>



  <div id="edit_l" class="form-group">
    <input id="edit_lastname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" value="'.$row['lastname'].'">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="lastname" class="float-label" style="font-family:Arial, FontAwesome">Last Name</label>
          <erroru>
            Last Name is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </erroru>
  </div>



  <div id="edit_m" class="form-group">
    <input id="edit_middlename" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" value="'.$row['middlename'].'">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="middlename" class="float-label" style="font-family:Arial, FontAwesome">Middle Name</label>
          <erroru>
            Middle Name is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </erroru>
  </div>



    <div class="box1">
      <label class="select-label">Department</label>
      <select id="edit_department" required  value="'.$row['department'].'">
        <option hidden>Choose Department</option>
        <option value="Accounting">Accounting</option>
        <option value="Admission">Admission</option>
        <option value="Registrar">Registrar</option>
      </select>
    </div>


              </div>

              <div class="col-lg-6">


    <div class="box2">
      <label class="select-label">Usertype</label>
      <select id="edit_usertype" required value="'.$row['usertype'].'">
        <option hidden>Choose Usertype</option>
        <option value="Admin">Admin</option>
        <option value="Cashier">Cashier</option>
        <option value="Staff">Staff</option>
      </select>
    </div>

    

  <div id="edit_u" class="form-group">
    <input id="edit_username" spellcheck=false class="form-control" name="username" type="text" size="18" alt="login" required="" value="'.$row['username'].'">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="username" class="float-label" style="font-family:Arial, FontAwesome">Username</label>
          <errorun>
            Username is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </errorun>
  </div>
    
    
  <div id="edit_p" class="form-group">
    <input type="password" id="edit_password" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
      <span toggle="#edit_password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="password1" class="float-label" style="font-family:Arial, FontAwesome">Password</label>
          <erroru>
            Password is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </erroru>
  </div>
          
    
  <div id="edit_cp" class="form-group">
    <input type="password" id="edit_confirm_pass" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
    <span toggle="#edit_confirm_pass" class="fa fa-fw fa-eye field-icon toggle-password"></span>
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="confirm_pass" class="float-label" style="font-family:Arial, FontAwesome">Confirm Password</label>
          <errorp>
            Confirm Password is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </errorp>
  </div>



  <!-- Show PassWord -->
  <script type="text/javascript">
    $(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });
  </script>


              </div> <!-- col-lg-6 End -->
  </div> <!-- Row End -->





        </div> <!-- Modal Body End -->

      <div class="modal-footer">
        <button type="button" class="cancel" data-dismiss="modal" onclick="reset()" ripple><i class="fas fa-times"></i> Cancel</button>
        <button type="button" class="save" id="update_btn" ripple><i class="fas fa-pen"></i> Update</button>
      </div>

      </div>
    <script>
    $("#edit_department").change(function(){
	    var val = $(this).val();
	    if(val == "Accounting"){
	      $("#edit_usertype option[value=Cashier]").show();
	      $("#edit_usertype option[value=Staff]").hide();
      $("#usertype option[value=Faculty]").hide();
	    }else if(val == "Faculty"){
      $("#usertype option[value=Staff]").hide();
      $("#usertype option[value=Cashier]").hide();
      $("#usertype option[value=Admin]").hide();
      $("#usertype option[value=Faculty]").show();
      }else{
	      $("#edit_usertype option[value=Cashier]").hide();
	      $("#edit_usertype option[value=Staff]").show();
      $("#usertype option[value=Faculty]").hide();
	    }
	  });

    $("#edit_usertype").val("'.$row['usertype'].'").change();
	$("#edit_department").val("'.$row['department'].'").change();
  
  $("#edit_confirm_pass").keyup(function(){
    var pass = $("#edit_password").val();
    var pmsg = $("erroru");
    var cpmsg = $("errorp");
    var pdiv = $("#edit_p");
    var cpdiv = $("#edit_cp");
    if(pass != $(this).val()){
      cpdiv.attr("errr","");
      cpmsg.html("Password did not match.");
    }else{
      cpdiv.removeAttr("errr");
    }
  });
	</script>
    <script src="update.js"></script>';
	}
	echo $output;
	exit();
}

//for major
if(isset($_POST['major'])) {
	$majorcount = 0;
	$course = $_POST['course'];
	 $query = "SELECT DISTINCT course_major FROM course where course_abbreviation = '$course'";
	 $result = mysqli_query($conn, $query); 
	  if($count=mysqli_num_rows($result) > 0)  
	  {
	  $output = '<option id="cm" value="Choose Major" hidden>Choose Major</option>';
	  while($rows=mysqli_fetch_array($result))
	  {
		if($rows['course_major'] == 'No Major')
		{
		  // for no major output
		  $majorcount++; 
		}
		else
		{
		  $output .= '<option >'.$rows['course_major'].'</option>';
		}
	  }
	  }
	  if($majorcount == 0){echo $output;}
		else {echo '<option>No Major</option>';}
		  
  }

if(isset($_POST['stat_fac_user'])) {
  $id = $_POST['id'];
  $get_stat_query = mysqli_query($conn, "SELECT status FROM faculty_user WHERE id = ".$id);
  $get_stat_res = mysqli_fetch_array($get_stat_query);
  $stat = $get_stat_res[0];

  if($stat == 1) $new = 0;
  else if($stat == 0) $new = 1;

  $change = "UPDATE faculty_user SET status = $new WHERE id = $id";
  if (mysqli_query($conn, $change)) {
    echo $new;
    exit();
  }
}